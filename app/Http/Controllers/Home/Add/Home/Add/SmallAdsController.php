<?php

declare(strict_types=1);

namespace App\Http\Controllers\Home\Add;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Repositories\Eloquent\SmallAdsRepository;
use App\Repositories\Eloquent\SmallAdsCategoriesRepository;
use App\Repositories\Eloquent\SmallAdsSubCategoriesRepository;
use App\Repositories\Eloquent\SmallAdsPhotosRepository;
use App\Repositories\Eloquent\NewspaperRepository;
use App\Repositories\Eloquent\PriceRepository;
use App\Repositories\Eloquent\PaymentRepository;


use Stevebauman\Location\Facades\Location;

use App\Http\Requests\SmallAdsContentRequest;
use App\Http\Requests\SmallAdsCreatePhotoRequest;
use App\Http\Requests\SmallAdsPromotionRequest;
use App\Http\Requests\SmallAdsPhotoRequest;
use App\Http\Requests\SmallAdsPaymentRequest;

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
    private $newspaperRepository;
    private $priceRepository;
    private $storage;

    public function __construct(
    
        SmallAdsRepository $smallAdsRepository,
        SmallAdsCategoriesRepository $smallAdsCategoriesRepository,
        SmallAdsSubCategoriesRepository $smallAdsSubCategoriesRepository,
        SmallAdsPhotosRepository $smallAdsPhotosRepository,
        NewspaperRepository $newspaperRepository,
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
            
            $this->smallAdsRepository = $smallAdsRepository;
            $this->smallAdsCategoriesRepository = $smallAdsCategoriesRepository;
            $this->smallAdsSubCategoriesRepository = $smallAdsSubCategoriesRepository;
            $this->smallAdsPhotosRepository = $smallAdsPhotosRepository;
            $this->newspaperRepository = $newspaperRepository;
            $this->priceRepository = $priceRepository;
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
 
        //$request->session()->forget('small_ads_contents');

     

        $content = $this->smallAdsRepository->getNonUnfinishedSmallAds(Auth::id());  
        //$content = $this->smallAdsRepository->getNonUnfinishedSmallAds(55);  
        if ($content==null) {
            $content = new \App\Models\SmallAdsContent();
            $content->setTable('small_ads_contents');
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


    public function content_post(SmallAdsContentRequest $request)
    {

        $data = $request->validated();          
        $ID = intval($data['id']);

         //sprawdzamy czy to nowe ogłoszenie, czy może aktualizacja rozpoczętego dodawania
        if (is_numeric($ID) and ($ID>0)) {
            
            //aktualizacja wczesniej dodawanego ogłoszenia

            $small_ads_contents = $this->smallAdsRepository->get($ID);
            
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
        $small_ads_contents->set_items((int)$data['items']);
        $small_ads_contents->set_price((float)$data['price']);
        $small_ads_contents->set_date_start($data['date_start']);
        $data['date_end'] = (date('Y-m-d', strtotime($data['date_start']. ' + '.$data['date_end'].' days')));

      //  dd($data['date_end']);
        $small_ads_contents->set_date_end($data['date_end']);
        $small_ads_contents->set_small_ads_categories_id((int)$data['small_ads_categories_id']);
        $small_ads_contents->set_small_ads_sub_categories_id((int)$data['small_ads_sub_categories_id']);
        $small_ads_contents->set_small_ads_classified_enum($data['small_ads_classified_enum']);
        $small_ads_contents->set_contact_email($data['contact_email']);
        $small_ads_contents->set_contact_phone($data['contact_phone']);
        $small_ads_contents->set_users_id(Auth::id());

        $small_ads_contents->set_portal_id((int)(env('PORTAL_ID')));

        //logi przy ogloszeniu

        $user['browser'] = Arr::get($_SERVER,'SERVER_SOFTWARE');
        $user['ip'] = Arr::get($_SERVER,'REMOTE_ADDR');
        $user['port'] = Arr::get($_SERVER,'REMOTE_PORT');
        $user['host'] = Arr::get($_SERVER,'REMOTE_HOST');

        //dd($user);
        $ip = '91.228.136.201';
        $location = Location::get( $user['ip']);
       // dd($location);

        if ($location!=null)
        {
            $user['cc'] = $location->countryName; //Country Code
            $user['rc'] = $location->regionCode; //Region Code
            $user['rn'] = $location->regionName; //Region Name
            $user['zip'] = $location->zipCode; //zipCode
            $user['city'] = $location->cityName;
            $user['lat'] = $location->latitude;
            $user['lng'] = $location->longitude;        
        }
       // $location_serialize = (serialize($location));

       // dd(($location_serialize));





        $small_ads_contents->set_adress_ip($user['ip']);
        $small_ads_contents->set_host($user['host']);
        $small_ads_contents->set_port((int)$user['port']);
        $small_ads_contents->set_browser($user['browser']);
       // $small_ads_contents->set_location();

        $small_ads_contents->save();
        $request->session()->put('small_ads_contents', $small_ads_contents);        

        return redirect('home/add/small_ads/photo');
    }

    public function photo(Request $request)
    {
        $small_ads_contents = $request->session()->get('small_ads_contents'); 
        $photos = $this->smallAdsPhotosRepository->getAllPhotosByAd($small_ads_contents->get_id());   

        return view('home.add.small_ads.photo', [
            'request'=>$request,
            'photos' => $photos,        
            'storage' => $this->storage
        ]);
    }


    public function photo_post(SmallAdsPhotoRequest $request)
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

    public function promotion()
    {
        $newspapers = $this->newspaperRepository->getAvaibleNewspaperEdition();
       

        $prices_collection = $this->priceRepository->getAllFromSection('small_ads');
        $price = [];
        
        foreach ($prices_collection as $row) {
            
            $price[$row->name] = $row['price'];
        }

        
    
        
            // $price['master_portal_7']=$this->priceRepository->getAllFromSectionAndName('small_ads','master_portal_7'); 
            // $price['master_portal_14']=$this->priceRepository->getAllFromSectionAndName('small_ads','master_portal_14'); 
            // $price['master_portal_30']=$this->priceRepository->getAllFromSectionAndName('small_ads','master_portal_30');
                    
            // $price['promoted_7']=$this->priceRepository->getAllFromSectionAndName('small_ads','promoted_7'); 
            // $price['promoted_14']=$this->priceRepository->getAllFromSectionAndName('small_ads','promoted_14'); 
            // $price['promoted_30']=$this->priceRepository->getAllFromSectionAndName('small_ads','promoted_30');

            // $price['highlighted_7']=$this->priceRepository->getAllFromSectionAndName('small_ads','highlighted_7'); 
            // $price['highlighted_14']=$this->priceRepository->getAllFromSectionAndName('small_ads','highlighted_14');         
            // $price['highlighted_30']=$this->priceRepository->getAllFromSectionAndName('small_ads','highlighted_30'); 

            // $price['inscription_7']=$this->priceRepository->getAllFromSectionAndName('small_ads','inscription_7'); 
            // $price['inscription_14']=$this->priceRepository->getAllFromSectionAndName('small_ads','inscription_14'); 
            // $price['inscription_30']=$this->priceRepository->getAllFromSectionAndName('small_ads','inscription_30'); 
            
            // $price['newspaper_advertisement']=$this->priceRepository->getAllFromSectionAndName('small_ads','newspaper_advertisement'); 
            // $price['newspaper_frame']=$this->priceRepository->getAllFromSectionAndName('small_ads','newspaper_frame'); 
            // $price['newspaper_background']=$this->priceRepository->getAllFromSectionAndName('small_ads','newspaper_background'); 
            // $price['newspaper_photo']=$this->priceRepository->getAllFromSectionAndName('small_ads','newspaper_photo'); 

        //dd($price);

        return view('home.add.small_ads.promotion', [     
            
            'newspapers'=>$newspapers,
            'price'=>$price,
        ]);
    }


    public function promotion_post(SmallAdsPromotionRequest $request)
    {
        // tutaj dodajemy informacje o promocjach do edytowanego ogłoszenia 
        //$small_ads_contents->fill($data);  // wyłączyłem automatyczne wypełnianie obiektu
        
        $data = $request->validated(); 

       // dd($data['newspaper_edition'][7]);

        if (!isset($data['promoted'])) $data['promoted'] = false;
        if (!isset($data['master_portal'])) $data['master_portal']= false;        
        
        $small_ads_contents = $this->smallAdsRepository->getNonUnfinishedSmallAds(Auth::id());  
        $small_ads_contents->set_highlighted($data['highlighted']);        
        $small_ads_contents->set_promoted((bool)$data['promoted']);
        $small_ads_contents->set_inscription($data['inscription']);
        $small_ads_contents->set_master_portal((bool)$data['master_portal']);        
        $small_ads_contents->save();

        $newspapers = $this->newspaperRepository->getAvaibleNewspaperEdition();

        foreach ($newspapers as $editions )
        {
            foreach ($editions->AvaibleEditions as $edition);
            {
                
                if (isset($data['newspaper_edition'][$edition->id])) {
                    dd ($data['newspaper_edition'][$edition->id]);
                }
                

            }
        }

        return redirect('/home/add/small_ads/summary');

    }

    public function summary()
    {
     
        $content = $this->smallAdsRepository->getNonUnfinishedSmallAds(Auth::id());  
        $data = strtotime($content['date_start']);
        $teraz = strtotime(now()->format('Y-m-d'));

       // dd($content);
        $price = $this->priceRepository->getAllFromSection('small_ads');  

        if (($data - $teraz)<0)
        { 
            $content['date_start'] = date('Y-m-d'); 
        }
        else
        {
            $content['date_start'] = date('Y-m-d',$data);
        }
      // dd($content);
        $categories = $this->smallAdsCategoriesRepository->getCategoriesById($content['small_ads_categories_id']);  

       // dd($categories);
        $subcategories = $this->smallAdsSubCategoriesRepository->getSubcategoriesByCategoriesId($content['small_ads_categories_id'] );  
       // dd($subcategories);

       //zliczanie płatności po stronie serwera

        $promoted_price = 0;
        $top_price = 0;
        $highlighted_price = 0;
        $inscription_price = 0;

     //  dd($content['date_end']);

        if ($content['date_end']>0) {
    
        
            
            if ($content['promotion']!=0) {
                $promoted_price = $price['promotion_'.$content['date_end']];
            }
            if ($content['master_portal']!=0) {
                $top_price = $price['master_portal_'.$content['date_end']];
            }
            if ($content['highlighted']!='#ffffff') {
                $highlighted_price = $price['highlighted_'.$content['date_end']];
            }
            if ($content['inscription']!='none') {
                $inscription_price = $price['inscription_'.$content['date_end']];
            }
        }

        $payments = $promoted_price + $highlighted_price + $top_price + $inscription_price;

//        dd($payments);

        $photos = $this->smallAdsPhotosRepository->getAllPhotosByAd($content->get_id());   

        $user = Auth::user();
        return view('home.add.small_ads.summary',[

            'content' => $content,            
            'categories' => $categories,
            'subcategories' => $subcategories,
            'photos' => $photos,
            'storage' => $this->storage,
            'payments' => $payments,
            'section' => 'small_ads',
            'user' => $user
        
        ]);
    }



    public function summary_post(Request $request)
    {
            //dodajemy na potrzeby testowe potwirdzenie ze ogłoszenie zostało ukonczone
        $content = $this->smallAdsRepository->getNonUnfinishedSmallAds(Auth::id());  
        $content->set_status('active');
        $content->save();


        return view('/payments/form');
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

