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
use App\Repositories\Eloquent\NewspaperEditionRepository;
use App\Repositories\Eloquent\PriceRepository;
use App\Repositories\Eloquent\OrdersRepository;
use App\Repositories\Eloquent\PaymentRepository;

use Stevebauman\Location\Facades\Location;

use App\Http\Requests\SmallAdsContentRequest;
use App\Http\Requests\SmallAdsCreatePhotoRequest;
use App\Http\Requests\SmallAdsPromotionRequest;
use App\Http\Requests\SmallAdsPhotoRequest;
use App\Http\Requests\SmallAdsPaymentRequest;
use App\Models\OrderList;
use Intervention\Image\ImageManager;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use Illuminate\Contracts\View\View;
//use App\Repositories\AdPhotosRepository;

use Money\Currencies\ISOCurrencies;
use Money\Currency;
use Money\Formatter\IntlMoneyFormatter;
use Money\Money;

final class SmallAdsController extends Controller
{
    private $smallAdsRepository;
    private $smallAdsCategoriesRepository;
    private $smallAdsSubCategoriesRepository;
    private $smallAdsPhotosRepository;
    private $newspaperRepository;
    private $newspaperEditionReposistory;
    private $priceRepository;
    private $ordersRepository;
    private $storage;

    private $currencies;
    private $numberFormatter;
    private $moneyFormatter;

    public function __construct(
        SmallAdsRepository $smallAdsRepository,
        SmallAdsCategoriesRepository $smallAdsCategoriesRepository,
        SmallAdsSubCategoriesRepository $smallAdsSubCategoriesRepository,
        SmallAdsPhotosRepository $smallAdsPhotosRepository,
        NewspaperRepository $newspaperRepository,
        NewspaperEditionRepository $newspaperEditionRepository,
        PriceRepository $priceRepository,
        OrdersRepository $ordersRepository,
        Storage $storage

        /*AdPhotosRepository $photoRepository,
        PaymentsRepository $paymentsRepository,
        Session $session,
        Carbon $carbon,
        Storage $storage
        */
    ) {
        $this->middleware('auth');
            
        $this->smallAdsRepository = $smallAdsRepository;
        $this->smallAdsCategoriesRepository = $smallAdsCategoriesRepository;
        $this->smallAdsSubCategoriesRepository = $smallAdsSubCategoriesRepository;
        $this->smallAdsPhotosRepository = $smallAdsPhotosRepository;
        $this->newspaperRepository = $newspaperRepository;
        $this->newspaperEditionRepository = $newspaperEditionRepository;
        $this->priceRepository = $priceRepository;
        $this->ordersRepository = $ordersRepository;
        $this->storage = $storage::disk('local');

        $this->currencies = new ISOCurrencies();
        $this->numberFormatter = new \NumberFormatter('pl_PL', \NumberFormatter::CURRENCY);
        $this->moneyFormatter = new IntlMoneyFormatter($this->numberFormatter, $this->currencies);
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

        //  dd($request);

        $content = $this->smallAdsRepository->getNonUnfinishedSmallAds(Auth::id());
        //$content = $this->smallAdsRepository->getNonUnfinishedSmallAds(55);
        if ($content===null) {
            $content = new \App\Models\SmallAdsContent();
            $content->setTable('small_ads_contents');
            $content->setConnection('mysql');
            $content->set_date_start(now()->format('Y-m-d'));
        }

        $data = strtotime($content['date_start']);
    
        $teraz = strtotime(now()->format('Y-m-d'));

        if (($data - $teraz)<0) {
            $content['date_start'] = date('Y-m-d');
        } else {
            $content['date_start'] = date('Y-m-d', $data);
        }

        // dd($content);
        $categories = $this->smallAdsCategoriesRepository->getAllCategories();
        $subcategories = $this->smallAdsSubCategoriesRepository->getSubcategoriesByCategoriesId($content['small_ads_categories_id']);
        // dd($subcategories);

        $user = Auth::user();
        // dd($user);

        return view('home.add.small_ads.content', [
            'content' => $content,
            'categories' => $categories,
            'subcategories' => $subcategories,
            'user' => $user
        
        ]);
    }


    public function content_post(SmallAdsContentRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $ID = intval($data['id']);

        //sprawdzamy czy to nowe ogłoszenie, czy może aktualizacja rozpoczętego dodawania
        if (is_numeric($ID) && ($ID>0)) {
            
            //aktualizacja wczesniej dodawanego ogłoszenia

            $small_ads_contents = $this->smallAdsRepository->get($ID);
            
            // pobieramy istniejacy rekord
            // sprawdzamy czy aktualny uzytkownik jest faktycznym właścicielem ogłoszenia
            // czy p[rzypadkiem nie nastąpiła podmiana id]

            if (Auth::id()!=$small_ads_contents->get_users_id()) {
                //proba podmiany ogłoszenia innego uzytkownika
                //natychmiastowe wylogowanie
                // trzeba jeszcze zapisać dane do logów...
                Auth::logout();
            }
        } else {
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
        $small_ads_contents->set_price((int)$data['price']);
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

        $user['browser'] = $request->server->get('HTTP_USER_AGENT');
       // dd($user['browser']);
        $user['ip'] = $request->server->get('REMOTE_ADDR');
        $user['port'] = $request->server->get('REMOTE_PORT');
        $user['host'] = $request->server->get('REMOTE_HOST');

 
        $ip = '91.228.136.201';
        $location = Location::get($ip);
        // dd($location);

        if ($location!==null) {
            $user['cc'] = $location->countryName; //Country Code
            $user['rc'] = $location->regionCode; //Region Code
            $user['rn'] = $location->regionName; //Region Name
            $user['zip'] = $location->zipCode; //zipCode
            $user['city'] = $location->cityName;
            $user['lat'] = $location->latitude;
            $user['lng'] = $location->longitude;
        }

       // dd($user);
        // $location_serialize = (serialize($location));

        // dd(($user));

        $small_ads_contents->set_adress_ip($user['ip']);
        $small_ads_contents->set_host($user['host']);
        $small_ads_contents->set_port((int)$user['port']);
        $small_ads_contents->set_browser($user['browser']);
        // $small_ads_contents->set_location();

        $small_ads_contents->save();
        $request->session()->put('small_ads_contents', $small_ads_contents);

        return redirect('home/add/small_ads/photo');
    }

    public function photo(Request $request) : View
    {
        $small_ads_contents = $request->session()->get('small_ads_contents');
        $photos = $this->smallAdsPhotosRepository->getAllPhotosByAd($small_ads_contents->get_id());

        return view('home.add.small_ads.photo', [
            'request' => $request,
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


        if ($request->hasFile('photos')) {
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
        } else {
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
            $money = new Money($row['price'], new Currency('PLN'));
            $price_view = $this->moneyFormatter->format($money); // outputs $1.00
            
            $price[$row->name]['amount'] = $row['price']; //kwota w groszach
            $price[$row->name]['price_view'] = $price_view; //wyswietlana cena
        }
       

        return view('home.add.small_ads.promotion', [
            
            'newspapers'=>$newspapers,
            'price'=>$price,
        ]);
    }

    public function promotion_post(SmallAdsPromotionRequest $request)
    {
        // tutaj dodajemy informacje o promocjach do edytowanego ogłoszenia
        //$small_ads_contents->fill($data);  // wyłączyłem automatyczne wypełnianie obiektu
        
        // dd($request);
     
        $data = $request->validated();
        //dd($data);
        $small_ads_contents = $this->smallAdsRepository->getNonUnfinishedSmallAds(Auth::id());

        // dd($small_ads_contents);
        $prices_collection = $this->priceRepository->getAllFromSection('small_ads');
        $price = [];
        $order_list = [];

        foreach ($prices_collection as $row) {
            $price[$row->name]['price'] = $row['price'];
            $price[$row->name]['description'] = $row['description'];
        }

        $SUMA = 0;

        if (isset($data['master_portal']) and $data['master_portal']=="true") {
            $price_detal = $price['master_portal_'.$data['date_end_promoted']]['price'];
            $description = $price['master_portal_'.$data['date_end_promoted']]['description'];
            $SUMA = $SUMA + $price_detal;

            $order_list[] = new OrderList([
                'name' => 'ramka na głownym portalu',
                'quantity' => 1,
                'description' => $description,
                'price' => $price_detal,
            ]);
        } else {
            $data['master_portal'] = "false";
        }

        if ($data['inscription']!='none') {
            $price_detal = $price['inscription_'.$data['date_end_promoted']]['price'];
            $description = $price['inscription_'.$data['date_end_promoted']]['description'];
            $SUMA = $SUMA + $price_detal;
          
            $order_list[] = new OrderList([
                'name' => 'Wyróżniający napis',
                'quantity' => 1,
                'description' => $description,
                'price' => $price_detal,
            ]);
        }

        if ($data['highlighted']!="#ffffff") {
            $price_detal = $price['highlighted_'.$data['date_end_promoted']]['price'];
            $description = $price['highlighted_'.$data['date_end_promoted']]['description'];
            $SUMA = $SUMA + $price_detal;


            $order_list[] = new OrderList([
                'name' => 'Kolorowe tło',
                'quantity' => 1,
                'description' => $description,
                'price' => $price_detal,
            ]);
        }

        if (isset($data['promoted']) and ($data['promoted']=="true")) {
            $price_detal = $price['promoted_'.$data['date_end_promoted']]['price'];
            $description = $price['promoted_'.$data['date_end_promoted']]['description'];
            $SUMA = $SUMA + $price_detal;

            $order_list[] = new OrderList([
                'name' => 'Wyświetlaj się nad zwykłymi...',
                'quantity' => 1,
                'description' => $description,
                'price' => $price_detal,
            ]);
        } else {
            $data['promoted'] = false;
        }
        

        $price_newspaper_background = 0;
        $price_newspaper_photo = 0;
        $price_newspaper_frame = 0;
        $price_newspaper_advertisement = $price['newspaper_advertisement']['price'];

        $description = '';
       
        if (isset($data['newspaper_background']) and  $data['newspaper_background']=="on") {
            $price_newspaper_background = $price['newspaper_background']['price'];
            $description .= "/tło";
        }
        if (isset($data['newspaper_photo']) and  $data['newspaper_photo']=="on") {
            $price_newspaper_photo = $price['newspaper_photo']['price'];
            $description .= "/zdjęcie";
        }
        if (isset($data['newspaper_frame']) and  $data['newspaper_frame']=="on") {
            $price_newspaper_frame = $price['newspaper_frame']['price'];
            $description .= "/ramka";
        }
        
      
        if (isset($data['newspaper_edition'])) {
            foreach ($data['newspaper_edition'] as $newspaper_edition) {
                $edition = $this->newspaperEditionRepository->getNewspaperEditionById($newspaper_edition);

                $EDITION_PRICE = $price_newspaper_advertisement + $price_newspaper_background + $price_newspaper_photo + $price_newspaper_frame;
                $SUMA = $SUMA + $EDITION_PRICE;
                   
                $order_list[] = new OrderList([
                        'name' => $edition['Newspaper']['name'].' '.$edition['date'],
                        'quantity' => 1,
                        'price' => $EDITION_PRICE,
                        'description' => $description,
                    ]);
            }
        }

        // dd($SUMA);
        $small_ads_contents->set_highlighted($data['highlighted']);
        $small_ads_contents->set_promoted((bool)$data['promoted']);
        $small_ads_contents->set_inscription($data['inscription']);
        $small_ads_contents->set_master_portal((bool)$data['master_portal']);
        $small_ads_contents->save();
        
        
     
        $order = $this->ordersRepository->getOrderByAdsId($small_ads_contents->get_id(), 'small_ads');
        
        
        if ($order==null) {
            $order = new \App\Models\Order();
        }

        // dd($order);
        $order->deleteOrderList();
        $order->set_name('D/'.$small_ads_contents->get_id().'/'.date("Y"));
        $order->set_payments_id(0);
        $order->set_addons_id($small_ads_contents->get_id());
        $order->set_section('small_ads');
        $order->set_price_summary($SUMA);
        $order->set_users_id(Auth::id());
        $order->save();
        $order->OrderList()->saveMany($order_list);
        

        return redirect('/home/add/small_ads/summary');
    }

    public function summary()
    {
        $content = $this->smallAdsRepository->getNonUnfinishedSmallAds(Auth::id());
        $order = $this->ordersRepository->getOrderByAdsId($content->get_id(), 'small_ads');
     
        $categories = $this->smallAdsCategoriesRepository->getCategoriesById($content['small_ads_categories_id']);
        $subcategories = $this->smallAdsSubCategoriesRepository->getSubcategoriesByCategoriesId($content['small_ads_categories_id']);
        $photos = $this->smallAdsPhotosRepository->getAllPhotosByAd($content->get_id());
        
        
        $user = Auth::user();
        return view('home.add.small_ads.summary', [

            'content' => $content,
            'categories' => $categories,
            'subcategories' => $subcategories,
            'photos' => $photos,
            'storage' => $this->storage,
            'order' => $order,
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

        return view('register.step3', compact('register'));
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
