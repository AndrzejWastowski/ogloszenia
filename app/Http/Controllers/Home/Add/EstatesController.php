<?php

namespace App\Http\Controllers\Home\Add;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Repositories\Eloquent\EstatesRepository;
use App\Repositories\Eloquent\EstatesCategoriesRepository;
use App\Repositories\Eloquent\EstatesPhotosRepository;
use App\Repositories\Eloquent\PriceRepository;
use App\Repositories\Eloquent\PaymentRepository;


use Stevebauman\Location\Facades\Location;

use App\Http\Requests\EstatesCreateUpdateRequest;
use App\Http\Requests\EstatesCreatePhotoRequest;
use App\Http\Requests\EstatesPromotionRequest;
use App\Http\Requests\EstatesPaymentRequest;

use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
//use App\Repositories\AdPhotosRepository;


final class EstatesController extends Controller
{   

    private $EstatesRepository;
    private $EstatesCategoriesRepository;
    private $EstatesGroupsRepository;
    private $EstatesPhotosRepository;
    private $priceRepository;
    private $storage;

    public function __construct(
    
        EstatesRepository $EstatesRepository,
        EstatesCategoriesRepository $EstatesCategoriesRepository,       
        EstatesPhotosRepository $EstatesPhotosRepository,
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
            
            $this->EstatesRepository = $EstatesRepository;
            $this->EstatesCategoriesRepository = $EstatesCategoriesRepository;         
            $this->EstatesPhotosRepository = $EstatesPhotosRepository;
            $this->priceRepository = $priceRepository;
            $this->storage = $storage::disk('local');
        }



    public function index(Request $request)
    {
     //   $request->session()->forget('estates');
     //   $products = \App\Register::all();
      //  return view('home.add.estates.step1');
    }

    public function content(Request $request)
    {
 
        //$request->session()->forget('estates_contents');

        $content = $this->EstatesRepository->getNonUnfinishedEstates(Auth::id());  
        //$content = $this->EstatesRepository->getNonUnfinishedEstates(55);  
        if ($content==null) {
            $content = new \App\Models\EstatesContent();
            $content->setTable('estates_contents');
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
        $categories = $this->EstatesCategoriesRepository->getAllCategories();  
       
        
        // dd($subcategories);

        $user = Auth::user();
        // dd($user);


        return view('home.add.estates.content',[            
            'content' => $content,
            'categories' => $categories,
            'user' => $user
        
        ]);

    }


    public function content_post(EstatesCreateUpdateRequest $request)
    {
   
     //   dd($request);
      
        $data = $request->validated();  
       
         //sprawdzamy czy to nowe ogłoszenie, czy może aktualizacja rozpoczętego dodawania
        if ($data['id']>0) {
            
            //aktualizacja wczesniej dodawanego ogłoszenia

            $estates_contents = $this->EstatesRepository->get($data['id']);
            
            // pobieramy istniejacy rekord 
            // sprawdzamy czy aktualny uzytkownik jest faktycznym właścicielem ogłoszenia
            // czy p[rzypadkiem nie nastąpiła podmiana id]

            if (Auth::id()!=$estates_contents->get_users_id()) 
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
            $estates_contents = new \App\Models\EstatesContent();
        }

        
        //$estates_contents->fill($data);  // wyłączyłem automatyczne wypełnianie obiektu
        
        $estates_contents->users_id = Auth::id();
        $estates_contents->set_name($data['name']);
        $estates_contents->set_lead($data['lead']);
        $estates_contents->set_description($data['description']);
        $estates_contents->set_estates_type($data['estates_type']);
        $estates_contents->set_estates_categories_id($data['estates_categories_id']);        
        $estates_contents->set_price($data['price']);
        $estates_contents->set_area($data['area']);
        $estates_contents->set_unit($data['unit']);
        $estates_contents->set_market($data['market']);
        $estates_contents->set_date_start($data['date_start']);
        $data['date_end'] = (date('Y-m-d', strtotime($data['date_start']. ' + '.$data['date_end'].' days')));

      //  dd($data['date_end']);
        $estates_contents->set_date_end($data['date_end']);                    
        $estates_contents->set_contact_email($data['contact_email']);
        $estates_contents->set_contact_phone($data['contact_phone']);
        $estates_contents->set_users_id(Auth::id());

        $estates_contents->set_portal_id((int)(env('PORTAL_ID')));

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


        $estates_contents->set_adress_ip($user['ip']);
        $estates_contents->set_host($user['host']);
        $estates_contents->set_port($user['port']);
        $estates_contents->set_browser($user['browser']);

        $estates_contents->save();
        $request->session()->put('estates_contents', $estates_contents);        

        return redirect('home/add/estates/photo');
    }

    public function photo(Request $request)
    {
        $estates_contents = $request->session()->get('estates_contents'); 
        $photos = $this->EstatesPhotosRepository->getAllPhotosByEstate($estates_contents->get_id());   

        $contents = Storage::url('public/estates/601aaab35cbdb_kw.jpg');

       // dd($contents);

        return view('home.add.estates.photo', [
            'request'=>$request,
            'photos' => $photos,        
            'storage' => $this->storage
        ]);
    }


    public function photo_post(EstatesCreatePhotoRequest $request)
    {
        //$validatedData = $request->validate(['photos[]' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048']);
        // create an image manager instance with favored driver
       // dd($request);
       // $data = $request->validate();

        $estates_contents = $request->session()->get('estates_contents');

      //  dd($estates_contents);

        if ($request->hasFile('photos')) 
        {

            $sort = 0;


            foreach ($request->file('photos') as $image) {

                $name = uniqid();                

                $estates_photo = new \App\Models\EstatesPhoto();

                $estates_photo->set_name($name);
                $estates_photo->set_estates_contents_id($estates_contents->get_id());
                $estates_photo->set_sort($sort);
                
                $estates_photo->save();

                // generujemy miniaturke
                $width = 300;
                $height = 250;
                $output =  'public/estates/'.$name.'_m.jpg';

                create_image($width, $height, $image, $output);

                // generujemy srednie foto
                $width = 1920;
                $height = 1080;
                $output =  'public/estates/'.$name.'_d.jpg';

                create_image($width, $height, $image, $output);

                // generujemy kw foto
                $width = 350;                
                $output =  'public/estates/'.$name.'_kw.jpg';

                create_square_image($width, $image, $output);

                $sort++;
                }       
    }
    else 
    {
        dd('brak zdjec');
    }       
        return redirect('/home/add/estates/photo');
        //return view('home.add.estates.photo',[compact('estates_contents')]);

    }

    public function promotion(Request $request)
    {
        return view('home.add.estates.promotion', [
            'request'=>$request
        ]);
    }


    public function promotion_post(EstatesPromotionRequest $request)
    {
        // tutaj dodajemy informacje o promocjach do edytowanego ogłoszenia 



        
        //$estates_contents->fill($data);  // wyłączyłem automatyczne wypełnianie obiektu
        
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

        

        $estates_contents = $this->EstatesRepository->getNonUnfinishedEstates(Auth::id());  
        $estates_contents->set_highlighted($data['highlighted']);        
        $estates_contents->set_promoted($data['promoted']);
        $estates_contents->set_recomended($data['recomended']);
        $estates_contents->set_master_portal($master_portal);
        $estates_contents->set_top($top);
        $estates_contents->save();

        return redirect('/home/add/estates/summary');

    }

    public function summary(Request $request)
    {
        
        $content = $this->EstatesRepository->getNonUnfinishedEstates(Auth::id());  
        $data = strtotime($content['date_start']);
        $teraz = strtotime(now());

       // dd($content);
        $price = $this->priceRepository->getAll();  

        if (($data - $teraz)<0)
        { 
            $content['date_start'] = date('Y-m-d'); 
        }
        else
        {
            $content['date_start'] = date('Y-m-d',$data);
        }
      // dd($content);
        $categories = $this->EstatesCategoriesRepository->getCategoriesById($content['estates_categories_id']);  

       // dd($categories);
        $groups = $this->EstatesGroupsRepository->getGroupsById($content['estates_type'] );  
       // dd($subcategories);

       //zliczanie płatności po stronie serwera

        $promoted_price = 0;
        $top_price = 0;
        $highlighted_price = 0;
        $recomended_price = 0;

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
            if ($content['recomended']!='none') {
                $recomended_price = $price['recomended_'.$content['date_end_promotion']];
            }
        }

        $payments = $promoted_price + $highlighted_price + $top_price + $recomended_price;

//        dd($payments);

        $photos = $this->EstatesPhotosRepository->getAllPhotosByEstate($content->get_id());   

        $user = Auth::user();
        return view('home.add.estates.summary',[

            'content' => $content,            
            'categories' => $categories,
            'groups' => $groups,
            'photos' => $photos,
            'storage' => $this->storage,
            'payments' => $payments,
            'section' => 'estates',
            'user' => $user
        
        ]);
    }



    public function summary_post(Request $request)
    {
            //dodajemy na potrzeby testowe potwirdzenie ze ogłoszenie zostało ukonczone
        $content = $this->EstatesRepository->getNonUnfinishedEstates(Auth::id());  
        $content->set_status('active');
        $content->save();


        return view('/home/add/estates/payments');
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
if(empty($request->session()->get('estates_contents'))){
    $estates_contents = new \App\Models\EstatesContent();
    $estates_contents->fill($validatedData);
    $request->session()->put('estates_contents', $estates_contents);
}else{
    $estates_contents = $request->session()->get('estates_contents');            
    $estates_contents->fill($validatedData);
    $request->session()->put('estates_contents', $estates_contents);
}
*/

