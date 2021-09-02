<?php

namespace App\Http\Controllers\Home\Add;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Repositories\Eloquent\ServicesRepository;
use App\Repositories\Eloquent\ServicesCategoriesRepository;
use App\Repositories\Eloquent\ServicesPhotosRepository;
use App\Repositories\Eloquent\PriceRepository;
use App\Repositories\Eloquent\PaymentRepository;


use Stevebauman\Location\Facades\Location;

use App\Http\Requests\ServicesContentRequest;
use App\Http\Requests\ServicesPhotoRequest;
use App\Http\Requests\ServicesPromotionRequest;
use App\Http\Requests\ServicesPaymentRequest;

use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;


final class ServicesController extends Controller
{   

    private $ServicesRepository;
    private $ServicesCategoriesRepository;    
    private $ServicesPhotosRepository;
    private $priceRepository;
    private $storage;

    public function __construct(
    
        ServicesRepository $ServicesRepository,
        ServicesCategoriesRepository $ServicesCategoriesRepository,       
        ServicesPhotosRepository $ServicesPhotosRepository,
        PriceRepository $priceRepository,
        Storage $storage

        /*AdPhotosRepository $photoRepository,         
        PaymentsRepository $paymentsRepository,
        Session $session, 
        Carbon $carbon, 
        Storage $storage
        */
        )
        {

            $this->middleware('auth');
            
            $this->ServicesRepository = $ServicesRepository;
            $this->ServicesCategoriesRepository = $ServicesCategoriesRepository;         
            $this->ServicesPhotosRepository = $ServicesPhotosRepository;
            $this->priceRepository = $priceRepository;
            $this->storage = $storage::disk('local');
        }



    public function index(Request $request)
    {
     //   $request->session()->forget('services');
     //   $products = \App\Register::all();
      //  return view('home.add.services.step1');
    }

    public function content(Request $request)
    {
 
        //$request->session()->forget('services_contents');

        $content = $this->ServicesRepository->getNonUnfinishedServices(Auth::id());  
        //$content = $this->ServicesRepository->getNonUnfinishedServices(55);  
        if ($content==null) {
            $content = new \App\Models\ServicesContent();
            $content->setTable('services_contents');
            $content->setConnection('mysql');
        }

        $data = strtotime($content['date_start']);
        $teraz = strtotime(now());

        if (($data - $teraz)<0)
        { $content['date_start'] = date('Y-m-d'); }
        else
        {
            $content['date_start'] = date('Y-m-d',$data);
        }

        // dd($content);
        $categories = $this->ServicesCategoriesRepository->getAllCategories();  
       
        
        // dd($subcategories);

        $user = Auth::user();
        // dd($user);


        return view('home.add.services.content',[            
            'content' => $content,
            'categories' => $categories,
            'user' => $user
        
        ]);

    }


    public function content_post(ServicesContentRequest $request)
    {
         
        $data = $request->validated();  
       // dd($data);       
         //sprawdzamy czy to nowe ogłoszenie, czy może aktualizacja rozpoczętego dodawania
        if ($data['id']>0) {
            
            //aktualizacja wczesniej dodawanego ogłoszenia

            $services_contents = $this->ServicesRepository->get($data['id']);
            
            // pobieramy istniejacy rekord 
            // sprawdzamy czy aktualny uzytkownik jest faktycznym właścicielem ogłoszenia
            // czy p[rzypadkiem nie nastąpiła podmiana id]

            if (Auth::id()!=$services_contents->get_users_id()) 
            {
                //proba podmiany ogłoszenia innego uzytkownika
                //natychmiastowe wylogowanie
                // trzeba jeszcze zapisać dane do logów... 
                Auth::logout();
            }
        }
        else
        {
            //dodanie całkiem nowego ogłoszenia
            $services_contents = new \App\Models\ServicesContent();
        }

        
        //$services_contents->fill($data);  // wyłączyłem automatyczne wypełnianie obiektu
        
        $services_contents->users_id = Auth::id();
        $services_contents->set_name($data['name']);
        $services_contents->set_lead($data['lead']);
        $services_contents->set_description($data['description']);        
        $services_contents->set_services_categories_id($data['services_categories_id']);        
        $services_contents->set_date_start($data['date_start']);
        $data['date_end'] = (date('Y-m-d', strtotime($data['date_start']. ' + '.$data['date_end'].' days')));

      //  dd($data['date_end']);
        $services_contents->set_date_end($data['date_end']);                    
        $services_contents->set_contact_email($data['contact_email']);
        $services_contents->set_contact_phone($data['contact_phone']);
        $services_contents->set_users_id(Auth::id());

        $services_contents->set_portal_id((int)(env('PORTAL_ID')));

        //logi przy ogloszeniu

        $user['browser'] = Arr::get($_SERVER,'SERVER_SOFTWARE');
        $user['ip'] = Arr::get($_SERVER,'REMOTE_ADDR');
        $user['port'] = Arr::get($_SERVER,'REMOTE_PORT');
        $user['host'] = Arr::get($_SERVER,'REMOTE_HOST');

        //$ip = '91.228.136.201';
        $location = Location::get($user['ip']);

        if ($location!=null)
        {
            $user['countryCode'] = $location->countryName;        
            $user['regionCode'] = $location->regionCode;
            $user['regionName'] = $location->regionName;
            $user['zipCode'] = $location->zipCode;
            $user['cityName'] = $location->cityName;
            $user['latitude'] = $location->latitude;
            $user['longitude'] = $location->longitude;        
        }


        $services_contents->set_adress_ip($user['ip']);
        $services_contents->set_host($user['host']);
        $services_contents->set_port($user['port']);
        $services_contents->set_browser($user['browser']);

        $services_contents->save();
        $request->session()->put('services_contents', $services_contents);        

        return redirect('home/add/services/photo');
    }

    public function photo(Request $request)
    {
        $services_contents = $request->session()->get('services_contents'); 
        $photos = $this->ServicesPhotosRepository->getAllPhotosByEstate($services_contents->get_id());   

       // $contents = Storage::url('public/services/601aaab35cbdb_kw.jpg');

       // dd($contents);

        return view('home.add.services.photo', [
            'request'=>$request,
            'photos' => $photos,        
            'storage' => $this->storage
        ]);
    }


    public function photo_post(ServicesPhotoRequest $request)
    {
        //$validatedData = $request->validate(['photos[]' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048']);
        // create an image manager instance with favored driver
       // dd($request);
       // $data = $request->validate();

        $services_contents = $request->session()->get('services_contents');

      //  dd($services_contents);

        if ($request->hasFile('photos')) 
        {

            $sort = 0;


            foreach ($request->file('photos') as $image) {

                $name = uniqid();                

                $services_photo = new \App\Models\ServicesPhoto();

                $services_photo->set_name($name);
                $services_photo->set_services_contents_id($services_contents->get_id());
                $services_photo->set_sort($sort);
                
                $services_photo->save();

                // generujemy miniaturke
                $width = 300;
                $height = 250;
                $output =  'public/services/'.$name.'_m.jpg';

                create_image($width, $height, $image, $output);

                // generujemy srednie foto
                $width = 1920;
                $height = 1080;
                $output =  'public/services/'.$name.'_d.jpg';

                create_image($width, $height, $image, $output);

                // generujemy kw foto
                $width = 350;                
                $output =  'public/services/'.$name.'_kw.jpg';

                create_square_image($width, $image, $output);

                $sort++;
                }       
    }
    else 
    {
        dd('brak zdjec');
    }       
        return redirect('/home/add/services/photo');
        //return view('home.add.services.photo',[compact('services_contents')]);

    }

    public function promotion(Request $request)
    {

        $price['master_portal_7']=$this->priceRepository->getAllFromSectionAndName('services','master_portal_7'); 
        $price['master_portal_14']=$this->priceRepository->getAllFromSectionAndName('services','master_portal_14'); 
        $price['master_portal_30']=$this->priceRepository->getAllFromSectionAndName('services','master_portal_30');
                
        $price['promotion_7']=$this->priceRepository->getAllFromSectionAndName('services','promotion_7'); 
        $price['promotion_14']=$this->priceRepository->getAllFromSectionAndName('services','promotion_14'); 
        $price['promotion_30']=$this->priceRepository->getAllFromSectionAndName('services','promotion_30');

        $price['highlighted_7']=$this->priceRepository->getAllFromSectionAndName('services','highlighted_7'); 
        $price['highlighted_14']=$this->priceRepository->getAllFromSectionAndName('services','highlighted_14');         
        $price['highlighted_30']=$this->priceRepository->getAllFromSectionAndName('services','highlighted_30'); 

        $price['inscription_7']=$this->priceRepository->getAllFromSectionAndName('services','inscription_7'); 
        $price['inscription_14']=$this->priceRepository->getAllFromSectionAndName('services','inscription_14'); 
        $price['inscription_30']=$this->priceRepository->getAllFromSectionAndName('services','inscription_30'); 
        
        $price['newspaper_advertisement']=$this->priceRepository->getAllFromSectionAndName('services','newspaper_advertisement'); 
        $price['newspaper_frame']=$this->priceRepository->getAllFromSectionAndName('services','newspaper_frame'); 
        $price['newspaper_background']=$this->priceRepository->getAllFromSectionAndName('services','newspaper_background'); 

        return view('home.add.services.promotion', [
            'request'=>$request,
            'price'=>$price
        ]);
    }


    public function promotion_post(ServicesPromotionRequest $request)
    {
        // tutaj dodajemy informacje o promocjach do edytowanego ogłoszenia 
        
        //$services_contents->fill($data);  // wyłączyłem automatyczne wypełnianie obiektu
        
        $data = $request->validated(); 

        if (isset($data['promoted']))
        {
            $data['promoted'] = true;
        }
        else 
        {
            $data['promoted'] = false;
        }

        if (isset($data['topp']))
        {
            $top = true;
        }
        else 
        {
            $top = false;
        }

        
        if (isset($data['master_portal']))
        {
            $master_portal = true;
        }
        else 
        {
            $master_portal = false;
        }

        

        $services_contents = $this->ServicesRepository->getNonUnfinishedServices(Auth::id());  
        $services_contents->set_highlighted($data['highlighted']);        
        $services_contents->set_promoted($data['promoted']);
        $services_contents->set_inscription($data['inscription']);
        $services_contents->set_master_portal($master_portal);
        $services_contents->set_top($top);
        $services_contents->save();

        return redirect('/home/add/services/summary');

    }

    public function summary(Request $request)
    {
        
        $content = $this->ServicesRepository->getNonUnfinishedServices(Auth::id());  
        $data = strtotime($content['date_start']);
        $teraz = strtotime(now());

       // dd($content);
        $price = $this->priceRepository->getAllFromSection('services');  

        if (($data - $teraz)<0)
        { 
            $content['date_start'] = date('Y-m-d'); 
        }
        else
        {
            $content['date_start'] = date('Y-m-d',$data);
        }
      // dd($content);
        $categories = $this->ServicesCategoriesRepository->getCategoriesById($content['services_categories_id']);  

       // dd($categories);
        

       //zliczanie płatności po stronie serwera

        $promoted_price = 0;
        $top_price = 0;
        $highlighted_price = 0;
        $inscription_price = 0;

        if ($content['date_end_promotion']>0) {

            
            if ($content['promoted']!=0) {
                $promoted_price = $price['promoted_'.$content['date_end_promotion']];
            }
            if ($content['master_portal']!=0) {
                $top_price = $price['master_portal_'.$content['date_end_promotion']];
            }
            if ($content['highlighted']!='#ffffff') {
                $highlighted_price = $price['highlighted_'.$content['date_end_promotion']];
            }
            if ($content['inscription']!='none') {
                $inscription_price = $price['inscription_'.$content['date_end_promotion']];
            }
        }

        $payments = $promoted_price + $highlighted_price + $top_price + $inscription_price;

//        dd($payments);

        $photos = $this->ServicesPhotosRepository->getAllPhotosByEstate($content->get_id());   

        $user = Auth::user();
        return view('home.add.services.summary',[

            'content' => $content,            
            'categories' => $categories,            
            'photos' => $photos,
            'storage' => $this->storage,
            'payments' => $payments,
            'section' => 'services',
            'user' => $user
        
        ]);
    }



    public function summary_post(Request $request)
    {
            //dodajemy na potrzeby testowe potwirdzenie ze ogłoszenie zostało ukonczone
        $content = $this->ServicesRepository->getNonUnfinishedServices(Auth::id());  
        $content->set_status('active');
        $content->save();


        return view('/home/add/services/payments');
    }

    public function createStep1(Request $request)
    {
        $register = $request->session()->get('register');

        return view('register.step1',compact('register'));
    }

    public function PostcreateStep1(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:registers',
        ]);
        if(empty($request->session()->get('register'))){
            $register = new \App\Register();
            $register->fill($validatedData);
            $request->session()->put('register', $register);
        }else{
            $register = $request->session()->get('register');
            $register->fill($validatedData);
            $request->session()->put('register', $register);
        }
        return redirect('/register2');
    }

    public function createStep2(Request $request)
    {
        $register = $request->session()->get('register');

        return view('register.step2',compact('register'));
    }

    public function PostcreateStep2(Request $request)
    {
        $validatedData = $request->validate([
            'description' => 'required|unique:registers',
        ]);
        if(empty($request->session()->get('register'))){
            $register = new \App\Register();
            $register->fill($validatedData);
            $request->session()->put('register', $register);
        }else{
            $register = $request->session()->get('register');
            $register->fill($validatedData);
            $request->session()->put('register', $register);
        }
        return redirect('/register3');
    }
    
    public function createStep3(Request $request)
    {  
        $register = $request->session()->get('register');
        return view('register.step3',compact('register'));
    }

    public function PostcreateStep3(Request $request)
    {
        $register = $request->session()->get('register');

        if(!isset($register->productImg)) {
            $request->validate([
                'productimg' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $fileName = "productImage-" . time() . '.' . request()->productimg->getClientOriginalExtension();
            $request->productimg->storeAs('productimg', $fileName);
            $register = $request->session()->get('register');
            $register->productImg = $fileName;
            $request->session()->put('register', $register);
        }
        return view('register.step4',compact('register'));
    }

    public function removeImage(Request $request)
    {
        $register = $request->session()->get('register');

        $register->productImg = null;

        return view('register.step3',compact('register'));
    }

    public function store(Request $request)
    {
        $register = $request->session()->get('register');

        $register->save();

        return redirect('/data');
    }
}



//



/*

obsługa sesji... 
if(empty($request->session()->get('services_contents'))){
    $services_contents = new \App\Models\ServicesContent();
    $services_contents->fill($validatedData);
    $request->session()->put('services_contents', $services_contents);
}else{
    $services_contents = $request->session()->get('services_contents');            
    $services_contents->fill($validatedData);
    $request->session()->put('services_contents', $services_contents);
}
*/

