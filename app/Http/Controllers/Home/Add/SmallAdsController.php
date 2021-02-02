<?php

namespace App\Http\Controllers\Home\Add;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Repositories\Eloquent\SmallAdsRepository;
use App\Repositories\Eloquent\SmallAdsCategoriesRepository;
use App\Repositories\Eloquent\SmallAdsSubCategoriesRepository;
use App\Repositories\Eloquent\SmallAdsPhotosRepository;


use App\Http\Requests\CreateUpdateSmallAdsRequest;


use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
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

//        $request->session()->forget('small_ads_contents');

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


        return view('home.add.small_ads.content',[
            'content' => $content,
            'categories' => $categories,
            'subcategories' => $subcategories,
        
        ]);

    }


    public function content_post(CreateUpdateSmallAdsRequest $request)
    {

        $data = $request->validated();        

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

        
        $small_ads_contents->users_id = Auth::id();
    
       // $small_ads_contents->setTable('small_ads_contents');
      //  $small_ads_contents->setConnection('mysql');

        //dd($small_ads_contents);
        //sprawdzamy czy to nowe ogłoszenie, czy może aktualizacja rozpoczętego dodawania

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
        
        //$small_ads_contents->fill($data);  

        $small_ads_contents->set_portal_id((int)(env('PORTAL_ID')));
      
        $small_ads_contents->save();
        
        // $this->smallAdsRepository->GETlAS

        //return view('home.add.small_ads.photo',[compact('small_ads_contents')]);
        return redirect('home/add/small_ads/photo');
    }




    public function photo(Request $request)
    {

       // $small_ads_contents = $request->session()->get('small_ads_contents');       
       // dd('dodawanie zdjec controller photo'); 
        $photos = $this->smallAdsPhotosRepository->getAllPhotosByAd($request->id);    
        


        //$photos = $this->smallAdsPhotoRepository->getAllPhotosByUser();  


        return view('home.add.small_ads.photo', [
            'request'=>$request,
            'photos' => $photos,        
            'storage' => $this->storage
        ]);

    }


    public function photo_post(Request $request)
    {
        $validatedData = $request->validate(['file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048']);

        if (empty($request->session()->get('small_ads_contents'))) {
            $small_ads_contents = new \App\Models\SmallAdsContent();
            $small_ads_contents->fill($validatedData);
            $request->session()->put('small_ads_contents', $small_ads_contents);
        } else {
            $small_ads_contents = $request->session()->get('small_ads_contents');
            $small_ads_contents->fill($validatedData);
            $request->session()->put('small_ads_contents', $small_ads_contents);
        }


        // create an image manager instance with favored driver
        $manager = new ImageManager(array('driver' => 'imagick'));

        // to finally create image instances
       // $img = Image::make($request->file('photo')->getRealPath());
        $pom = 0;
        if ($request->hasFile('photos')) 
        {
            $images = $request->file('photos');
        
            
            foreach ($images as $image) {
                // rozmiar miniaturki oraz nazwa pliku
                $width = 300;
                $height = 250;


                $output =  'public/small_ads/'.$image->getClientOriginalName();

                


                $small_ads_photo = new \App\Models\SmallAdsPhoto();

                $this->smallAdsPhotosRepository->save($small_ads_photo);

                


                if (create_mini_image($width, $height, $image, $output)) {

                    
                    //dodanie do bazy danych
                }
            }
    }
    else 
    {
        dd('brak zdjec');
    }

        
        return redirect('/home/add/small_ads/photo');
        //return view('home.add.small_ads.photo',[compact('small_ads_contents')]);

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