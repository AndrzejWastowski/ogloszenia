<?php

namespace App\Http\Controllers\Home\Add;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repositories\Eloquent\SmallAdsRepository;
use App\Repositories\Eloquent\SmallAdsCategoriesRepository;
use App\Repositories\Eloquent\SmallAdsSubCategoriesRepository;
//use App\Repositories\AdPhotosRepository;


final class SmallAdsController extends Controller
{   

    private $smallAdsRepository;
    private $smallAdsCategoriesRepository;
    private $smallAdsSubCategoriesRepository;

    public function __construct(
    
        SmallAdsRepository $smallAdsRepository,
        SmallAdsCategoriesRepository $smallAdsCategoriesRepository,
        SmallAdsSubCategoriesRepository $smallAdsSubCategoriesRepository

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
        }



    public function index(Request $request)
    {
        $request->session()->forget('small_ads');

        $products = \App\Register::all();

        return view('home.add.small_ads.step1');
    }

    public function content(Request $request)
    {
        $request->session()->forget('small_ads_contents');

        $content = $this->smallAdsRepository->get(0);     
        $categories = $this->smallAdsCategoriesRepository->getAllCategories();  

        return view('home.add.small_ads.content',[
            'content' => $content,
            'categories' => $categories
            
        ]);

    }


    public function content_post(Request $request)
    {
        

       // dd($request->dateStart);

        $validatedData = $request->validate([
            //'id' => ['required', 'integer', 'min:0' 'max:255'],
            'adressId' => ['required', 'min:0', 'max:255'],
            'portalId' => ['required', 'min:0','max:255'],
            'recomended' => ['required', 'max:255'],
            'adsClassifiedEnum' => ['required',  'max:255'],
            'smallAdsCategoriesId' => ['required',  'max:255'],
            'smallAdsSubCategoriesId'  => ['required',  'max:255'],
            'dateStart' => ['required','date_format:Y-m-d'],
            'name' => ['required'],
            'lead' => ['required'],
            'dateEnd' => ['required','min:0'],
            'description' => ['required'],
            'price' => ['required'],
            'items' => ['required'],
            'invoice' => ['required'],
            'condition' => ['required']
        ]);

        if(empty($request->session()->get('small_ads_contents'))){
            $small_ads_contents = new \App\Models\SmallAdsContent();
            $small_ads_contents->fill($validatedData);
            $request->session()->put('small_ads_contents', $small_ads_contents);
        }else{
            $small_ads_contents = $request->session()->get('small_ads_contents');
            $small_ads_contents->fill($validatedData);
            $request->session()->put('small_ads_contents', $small_ads_contents);
        }

        return view('home.add.small_ads.photo',[compact('small_ads_contents')]);

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
