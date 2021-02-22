<?php

namespace App\Http\Controllers\Home\Add;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Repositories\Eloquent\SmallAdsRepository;
use App\Repositories\Eloquent\SmallAdsCategoriesRepository;
use App\Repositories\Eloquent\SmallAdsSubCategoriesRepository;
use App\Repositories\Eloquent\SmallAdsPhotosRepository;
use Stevebauman\Location\Facades\Location;

use App\Http\Requests\SmallAdsCreateUpdateRequest;
use App\Http\Requests\SmallAdsCreatePhotoRequest;
use App\Http\Requests\SmallAdsPromotionRequest;

use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
//use App\Repositories\AdPhotosRepository;


final class SmallAdsController extends Controller
{   

    private $smallAdsRepository;
    private $smallAdsCategoriesRepository;
    private $smallAdsSubCategoriesRepository;
    private $smallAdsPhotosRepository;
    private $storage;
  

    public function __construct(
    
       
        SmallAdsRepository $smallAdsRepository,
        SmallAdsCategoriesRepository $smallAdsCategoriesRepository,
        SmallAdsSubCategoriesRepository $smallAdsSubCategoriesRepository,
        SmallAdsPhotosRepository $smallAdsPhotosRepository,
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
            
            $this->smallAdsRepository = $smallAdsRepository;
            $this->smallAdsCategoriesRepository = $smallAdsCategoriesRepository;
            $this->smallAdsSubCategoriesRepository = $smallAdsSubCategoriesRepository;
            $this->smallAdsPhotosRepository = $smallAdsPhotosRepository;
            $this->storage = $storage::disk('local');
        }



    public function index(Request $request)
    {
     //   $request->session()->forget('small_ads');
     //   $products = \App\Register::all();
      //  return view('home.add.small_ads.step1');
    }

    public function content(Request $request)
    {
    
        $user['browser'] = Arr::get($_SERVER,'SERVER_SOFTWARE');
        $user['ip'] = Arr::get($_SERVER,'REMOTE_ADDR');
        $user['port'] = Arr::get($_SERVER,'REMOTE_PORT');

        $ip = '91.228.136.201';
        $location = Location::get($ip);

      if ($location!=null)
      {
        $user['countryCode'] = $location->countryName;        
        $user['regionCode'] = $location->countryName;
        $user['regionName'] = $location->regionName;
        $user['zipCode'] = $location->zipCode;
        $user['cityName'] = $location->cityName;
        $user['latitude'] = $location->latitude;
        $user['longitude'] = $location->longitude;

     //   dd($user);
      }

        //$request->session()->forget('small_ads_contents');

        $content = $this->smallAdsRepository->getNonUnfinishedSmallAds(Auth::id());  
        //$content = $this->smallAdsRepository->getNonUnfinishedSmallAds(55);  
        if ($content==null) {
            $content = new \App\Models\SmallAdsContent();
            $content->setTable('small_ads_contents');
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

    //   dd($content);
        $categories = $this->smallAdsCategoriesRepository->getAllCategories();  
        $subcategories = $this->smallAdsSubCategoriesRepository->getSubcategoriesByCategoriesId($content['small_ads_categories_id'] );  
       // dd($subcategories);

       
       $user = Auth::user();
       // dd($user);


        return view('home.add.small_ads.content',[
            'content' => $content,
            'categories' => $categories,
            'subcategories' => $subcategories,
            'user' => $user
        
        ]);

    }


    public function content_post(SmallAdsCreateUpdateRequest $request)
    {

        $data = $request->validated();  
        

         //sprawdzamy czy to nowe ogłoszenie, czy może aktualizacja rozpoczętego dodawania
        if ($data['id']>0) {
            
            //aktualizacja wczesniej dodawanego ogłoszenia

            $small_ads_contents = $this->smallAdsRepository->get($data['id']);
            
            // pobieramy istniejacy rekord 
            // sprawdzamy czy aktualny uzytkownik jest faktycznym właścicielem ogłoszenia
            // czy p[rzypadkiem nie nastąpiła podmiana id]

            if (Auth::id()!=$small_ads_contents->get_users_id()) 
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
            $small_ads_contents = new \App\Models\SmallAdsContent();
        }

        
        //$small_ads_contents->fill($data);  // wyłączyłem automatyczne wypełnianie obiektu
        
        $small_ads_contents->users_id = Auth::id();
        $small_ads_contents->set_name($data['name']);
        $small_ads_contents->set_lead($data['lead']);
        $small_ads_contents->set_description($data['description']);
        $small_ads_contents->set_condition($data['condition']);
        $small_ads_contents->set_items($data['items']);
        $small_ads_contents->set_price($data['price']);
        $small_ads_contents->set_date_start($data['date_start']);
        $data['date_end'] = (date('Y-m-d', strtotime($data['date_start']. ' + '.$data['date_end'].' days')));

      //  dd($data['date_end']);
        $small_ads_contents->set_date_end($data['date_end']);
        $small_ads_contents->set_small_ads_categories_id($data['small_ads_categories_id']);
        $small_ads_contents->set_small_ads_sub_categories_id($data['small_ads_sub_categories_id']);
        $small_ads_contents->set_small_ads_classified_enum($data['small_ads_classified_enum']);
        $small_ads_contents->set_users_id(Auth::id());

        $small_ads_contents->set_portal_id((int)(env('PORTAL_ID')));

        $small_ads_contents->save();
        $request->session()->put('small_ads_contents', $small_ads_contents);
        

        return redirect('home/add/small_ads/photo');
    }

    public function photo(Request $request)
    {
        $small_ads_contents = $request->session()->get('small_ads_contents'); 
        $photos = $this->smallAdsPhotosRepository->getAllPhotosByAd($small_ads_contents->get_id());   

        $contents = Storage::url('public/small_ads/601aaab35cbdb_kw.jpg');

       // dd($contents);

        return view('home.add.small_ads.photo', [
            'request'=>$request,
            'photos' => $photos,        
            'storage' => $this->storage
        ]);
    }


    public function photo_post(SmallAdsCreatePhotoRequest $request)
    {
        //$validatedData = $request->validate(['photos[]' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048']);
        // create an image manager instance with favored driver
       // dd($request);
       // $data = $request->validate();

        $small_ads_contents = $request->session()->get('small_ads_contents');

      //  dd($small_ads_contents);

        if ($request->hasFile('photos')) 
        {

            $sort = 0;


            foreach ($request->file('photos') as $image) {

                $name = uniqid();                

                $small_ads_photo = new \App\Models\SmallAdsPhoto();

                $small_ads_photo->set_name($name);
                $small_ads_photo->set_small_ads_contents_id($small_ads_contents->get_id());
                $small_ads_photo->set_sort($sort);
                
                $small_ads_photo->save();

                // generujemy miniaturke
                $width = 300;
                $height = 250;
                $output =  'public/small_ads/'.$name.'_m.jpg';

                create_image($width, $height, $image, $output);

                // generujemy srednie foto
                $width = 1920;
                $height = 1080;
                $output =  'public/small_ads/'.$name.'_d.jpg';

                create_image($width, $height, $image, $output);

                // generujemy kw foto
                $width = 350;                
                $output =  'public/small_ads/'.$name.'_kw.jpg';

                create_square_image($width, $image, $output);

                $sort++;
                }       
    }
    else 
    {
        dd('brak zdjec');
    }       
        return redirect('/home/add/small_ads/photo');
        //return view('home.add.small_ads.photo',[compact('small_ads_contents')]);

    }

    public function promotion(Request $request)
    {
        return view('home.add.small_ads.promotion', [
            'request'=>$request
        ]);
    }


    public function promotion_post(SmallAdsPromotionRequest $request)
    {
        // tutaj dodajemy informacje o promocjach do edytowanego ogłoszenia 



        
        //$small_ads_contents->fill($data);  // wyłączyłem automatyczne wypełnianie obiektu
        
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

        

        $small_ads_contents = $this->smallAdsRepository->getNonUnfinishedSmallAds(Auth::id());  
        $small_ads_contents->set_highlighted($data['highlighted']);        
        $small_ads_contents->set_promoted($data['promoted']);
        $small_ads_contents->set_recomended($data['recomended']);
        $small_ads_contents->set_master_portal($master_portal);
        $small_ads_contents->set_top($top);
        $small_ads_contents->save();

        return redirect('/home/add/small_ads/summary');

    }

    public function summary(Request $request)
    {

        $content = $this->smallAdsRepository->getNonUnfinishedSmallAds(Auth::id());  
        $data = strtotime($content['date_start']);
        $teraz = strtotime(now());

        if (($data - $teraz)<0)
        { 
            $content['date_start'] = date('Y-m-d'); 
        }
        else
        {
            $content['date_start'] = date('Y-m-d',$data);
        }
//       dd($content);
        $categories = $this->smallAdsCategoriesRepository->getCategoriesById($content['small_ads_categories_id']);  

       // dd($categories);
        $subcategories = $this->smallAdsSubCategoriesRepository->getSubcategoriesByCategoriesId($content['small_ads_categories_id'] );  
       // dd($subcategories);
       $payments = ' 0.00 ';

       $photos = $this->smallAdsPhotosRepository->getAllPhotosByAd($content->get_id());   

       $user = Auth::user();
        return view('home.add.small_ads.summary',[

            'content' => $content,            
            'categories' => $categories,
            'subcategories' => $subcategories,
            'photos' => $photos,
            'storage' => $this->storage,
            'payments' => $payments,
            'section' => 'small_ads'
        
        ]);


;
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
if(empty($request->session()->get('small_ads_contents'))){
    $small_ads_contents = new \App\Models\SmallAdsContent();
    $small_ads_contents->fill($validatedData);
    $request->session()->put('small_ads_contents', $small_ads_contents);
}else{
    $small_ads_contents = $request->session()->get('small_ads_contents');            
    $small_ads_contents->fill($validatedData);
    $request->session()->put('small_ads_contents', $small_ads_contents);
}
*/
