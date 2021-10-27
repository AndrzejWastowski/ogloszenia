<?php

declare(strict_types=1);

namespace App\Http\Controllers\Home\Add;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Repositories\Eloquent\CarsRepository;
use App\Repositories\Eloquent\CarsBrandsRepository;
use App\Repositories\Eloquent\CarsModelsRepository;
use App\Repositories\Eloquent\CarsPhotosRepository;
use App\Repositories\Eloquent\CarsBodiesRepository;

use App\Repositories\Eloquent\PriceRepository;
use App\Repositories\Eloquent\PaymentRepository;


use Stevebauman\Location\Facades\Location;

use App\Http\Requests\CarsContentRequest;
use App\Http\Requests\CarsCreatePhotoRequest;
use App\Http\Requests\CarsPromotionRequest;
use App\Http\Requests\CarsPhotoRequest;
use App\Http\Requests\CarsPaymentRequest;

use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
//use App\Repositories\AdPhotosRepository;


final class CarsController extends Controller
{   

    private $carsRepository;
    private $carsBrandsRepository;
    private $carsModelsRepository;
    private $carsPhotosRepository;
    private $carsBodiesRepository;
    private $priceRepository;
    private $storage;

    public function __construct(
    
        CarsRepository $carsRepository,
        CarsBrandsRepository $carsBrandsRepository,
        CarsModelsRepository $carsModelsRepository,
        CarsPhotosRepository $carsPhotosRepository,
        CarsBodiesRepository $carsBodiesRepository,
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
            
            $this->carsRepository = $carsRepository;
            $this->carsBrandsRepository = $carsBrandsRepository;
            $this->carsModelsRepository = $carsModelsRepository;
            $this->carsPhotosRepository = $carsPhotosRepository;
            $this->carsBodiesRepository = $carsBodiesRepository;
            $this->priceRepository = $priceRepository;
            $this->storage = $storage::disk('local');
        }



    public function index(Request $request)
    {
     //   $request->session()->forget('cars');
     //   $products = \App\Register::all();
      //  return view('home.add.automotive.cars.step1');
    }

    public function content(Request $request)
    {
 
        //$request->session()->forget('cars_contents');

        $content = $this->carsRepository->getNonUnfinishedCars(Auth::id());  
        //$content = $this->carsRepository->getNonUnfinishedCars(55);  
        if ($content==null) {
            $content = new \App\Models\CarsContent();
            $content->setTable('cars_contents');
            $content->setConnection('mysql');
            $content->set_date_start(now()->format('Y-m-d'));

        }
      

        $data = strtotime($content['date_start']);
       
    
        $teraz = strtotime(now()->format('Y-m-d'));

        if (($data - $teraz)<0)
        { $content['date_start'] = date('Y-m-d'); }
        else
        {
            $content['date_start'] = date('Y-m-d',$data);
        }

        // dd($content);
        $brands = $this->carsBrandsRepository->getAllBrands();  
        $models = $this->carsModelsRepository->getModelsByBrandsId($content['cars_brands_id'] );  
        $bodies = $this->carsBodiesRepository->getAllBodies();

        // dd($models);

        $user = Auth::user();
        // dd($user);


        return view('home.add.automotive.cars.content',[
            'content' => $content,
            'brands' => $brands,
            'models' => $models,
            'bodies'=> $bodies,
            'user' => $user
        
        ]);

    }


    public function content_post(CarsContentRequest $request)
    {

        $data = $request->validated();          
     //   dd($data);
         //sprawdzamy czy to nowe ogłoszenie, czy może aktualizacja rozpoczętego dodawania
        if ($data['id']>0) {
            
            //aktualizacja wczesniej dodawanego ogłoszenia

            $cars_contents = $this->carsRepository->get($data['id']);
            
            // pobieramy istniejacy rekord 
            // sprawdzamy czy aktualny uzytkownik jest faktycznym właścicielem ogłoszenia
            // czy p[rzypadkiem nie nastąpiła podmiana id]

            if (Auth::id()!=$cars_contents->get_users_id()) 
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
            $cars_contents = new \App\Models\CarsContent();
        }


        if (!isset($data['poland_registration'])) $data['poland_registration']=0;
        if (!isset($data['accident'])) $data['accident']=0;
        
        //$cars_contents->fill($data);  // wyłączyłem automatyczne wypełnianie obiektu
       // dd($data);
        $cars_contents->users_id = Auth::id();        
        $cars_contents->set_lead($data['lead']);
        $cars_contents->set_description($data['description']);
        $cars_contents->set_condition($data['condition']);       
        $cars_contents->set_price((float)$data['price']);
        $cars_contents->set_power((int)$data['power']);
        $cars_contents->set_seats((int)$data['seats']);
        $cars_contents->set_doors_number((int)$data['doors_number']);
        $cars_contents->set_capacity((int)$data['capacity']);      
        $cars_contents->set_accident((int)$data['accident']);      
        $cars_contents->set_technical_condition((int)$data['technical_condition']);                
        $cars_contents->set_date_start($data['date_start']);
        $data['date_end'] = (date('Y-m-d', strtotime($data['date_start']. ' + '.$data['date_end'].' days')));
        $cars_contents->set_country_registration($data['country_registration']);
        $cars_contents->set_poland_registration((int)$data['poland_registration']);
        $cars_contents->set_date_registration($data['date_registration']);
        $cars_contents->set_date_production($data['date_production']);

      //  dd($data['date_end']);
        $cars_contents->set_date_end($data['date_end']);
        $cars_contents->set_cars_brands_id((int)$data['cars_brands_id']);
        $cars_contents->set_cars_models_id((int)$data['cars_models_id']);
        $cars_contents->set_cars_body_id((int)$data['cars_body_id']);        
        $cars_contents->set_contact_email($data['contact_email']);
        $cars_contents->set_contact_phone($data['contact_phone']);
        $cars_contents->set_users_id(Auth::id());

        $cars_contents->set_portal_id((int)(env('PORTAL_ID')));
        

        //logi przy ogloszeniu

        $user['browser'] = Arr::get($_SERVER,'SERVER_SOFTWARE');
        $user['ip'] = Arr::get($_SERVER,'REMOTE_ADDR');
        $user['port'] = Arr::get($_SERVER,'REMOTE_PORT');
        $user['host'] = Arr::get($_SERVER,'REMOTE_HOST');

        $ip = '91.228.136.201';
        $location = Location::get($ip);

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

        //dd((int)$user['port']);
        $cars_contents->set_adress_ip($user['ip']);
        $cars_contents->set_host($user['host']);
        $cars_contents->set_port((int)$user['port']);
        $cars_contents->set_browser($user['browser']);

        $cars_contents->save();
        $request->session()->put('cars_contents', $cars_contents);        

        return redirect('home/add/cars/photo');
    }

    public function photo(Request $request)
    {
        $cars_contents = $request->session()->get('cars_contents'); 
        $photos = $this->carsPhotosRepository->getAllPhotosByCars($cars_contents->get_id());   

       // dd($contents);

        return view('home.add.automotive.cars.photo', [
            'request'=>$request,
            'photos' => $photos,        
            'storage' => $this->storage
        ]);
    }


    public function photo_post(CarsPhotoRequest $request)
    {
        //$validatedData = $request->validate(['photos[]' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048']);
        // create an image manager instance with favored driver
       // dd($request);
       // $data = $request->validate();

        $cars_contents = $request->session()->get('cars_contents');

      //  dd($cars_contents);

        if ($request->hasFile('photos')) 
        {

            $sort = 0;


            foreach ($request->file('photos') as $image) {

                $name = uniqid();                

                $cars_photo = new \App\Models\CarsPhoto();

                $cars_photo->set_name($name);
                $cars_photo->set_cars_contents_id($cars_contents->get_id());
                $cars_photo->set_sort($sort);
                
                $cars_photo->save();

                // generujemy miniaturke
                $width = 300;
                $height = 250;
                $output =  'public/cars/'.$name.'_m.jpg';

                create_image($width, $height, $image, $output);

                // generujemy srednie foto
                $width = 1920;
                $height = 1080;
                $output =  'public/cars/'.$name.'_d.jpg';

                create_image($width, $height, $image, $output);

                // generujemy kw foto
                $width = 350;                
                $output =  'public/cars/'.$name.'_kw.jpg';

                create_square_image($width, $image, $output);

                $sort++;
                }       
    }
    else 
    {
        dd('brak zdjec');
    }       
        return redirect('/home/add/cars/photo');
        //return view('home.add.cars.photo',[compact('cars_contents')]);

    }

    public function promotion(Request $request)
    {
      
        $price['master_portal_7']=$this->priceRepository->getAllFromSectionAndName('cars','master_portal_7'); 
        $price['master_portal_14']=$this->priceRepository->getAllFromSectionAndName('cars','master_portal_14'); 
        $price['master_portal_30']=$this->priceRepository->getAllFromSectionAndName('cars','master_portal_30');
                
        $price['promotion_7']=$this->priceRepository->getAllFromSectionAndName('cars','promotion_7'); 
        $price['promotion_14']=$this->priceRepository->getAllFromSectionAndName('cars','promotion_14'); 
        $price['promotion_30']=$this->priceRepository->getAllFromSectionAndName('cars','promotion_30');

        $price['highlighted_7']=$this->priceRepository->getAllFromSectionAndName('cars','highlighted_7'); 
        $price['highlighted_14']=$this->priceRepository->getAllFromSectionAndName('cars','highlighted_14');         
        $price['highlighted_30']=$this->priceRepository->getAllFromSectionAndName('cars','highlighted_30'); 

        $price['inscription_7']=$this->priceRepository->getAllFromSectionAndName('cars','inscription_7'); 
        $price['inscription_14']=$this->priceRepository->getAllFromSectionAndName('cars','inscription_14'); 
        $price['inscription_30']=$this->priceRepository->getAllFromSectionAndName('cars','inscription_30'); 
        
        $price['newspaper_advertisement']=$this->priceRepository->getAllFromSectionAndName('cars','newspaper_advertisement'); 
        $price['newspaper_frame']=$this->priceRepository->getAllFromSectionAndName('cars','newspaper_frame'); 
        $price['newspaper_background']=$this->priceRepository->getAllFromSectionAndName('cars','newspaper_background'); 


       
        return view('home.add.automotive.cars.promotion', [
            'request'=>$request,
            'price'=>$price
        ]);
    }


    public function promotion_post(CarsPromotionRequest $request)
    {
        // tutaj dodajemy informacje o promocjach do edytowanego ogłoszenia 



        
        //$cars_contents->fill($data);  // wyłączyłem automatyczne wypełnianie obiektu
        
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

        

        $cars_contents = $this->carsRepository->getNonUnfinishedCars(Auth::id());  
        $cars_contents->set_highlighted($data['highlighted']);        
        $cars_contents->set_promoted($data['promoted']);
        $cars_contents->set_inscription($data['inscription']);
        $cars_contents->set_master_portal($master_portal);
        $cars_contents->set_top($top);
        $cars_contents->save();

        return redirect('/home/add/cars/summary');

    }

    public function summary(Request $request)
    {
        
        $content = $this->carsRepository->getNonUnfinishedCars(Auth::id());  
        $data = strtotime($content['date_start']);
        $teraz = strtotime(now()->format('Y-m-d'));

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
        $brands = $this->carsBrandsRepository->getBrandsById($content['cars_brands_id']);  
       
        $models = $this->carsModelsRepository->getModelsByBrandsId($content['cars_brands_id'] );  

        $bodies = $this->carsBodiesRepository->getBodiesById($content['cars_bodies_id'] ); 

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

        $photos = $this->carsPhotosRepository->getAllPhotosByCars($content->get_id());   

        $user = Auth::user();
        return view('home.add.automotive.cars.summary',[

            'content' => $content,            
            'brands' => $brands,
            'models' => $models,
            'photos' => $photos,
            'storage' => $this->storage,
            'payments' => $payments,
            'section' => 'cars',
            'user' => $user
        
        ]);
    }



    public function summary_post(Request $request)
    {
            //dodajemy na potrzeby testowe potwirdzenie ze ogłoszenie zostało ukonczone
        $content = $this->carsRepository->getNonUnfinishedCars(Auth::id());  
        $content->set_status('active');
        $content->save();


        return view('/home/add/cars/payments');
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
if(empty($request->session()->get('cars_contents'))){
    $cars_contents = new \App\Models\CarsContent();
    $cars_contents->fill($validatedData);
    $request->session()->put('cars_contents', $cars_contents);
}else{
    $cars_contents = $request->session()->get('cars_contents');            
    $cars_contents->fill($validatedData);
    $request->session()->put('cars_contents', $cars_contents);
}
*/


