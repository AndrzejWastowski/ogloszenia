<?php

namespace App\Http\Controllers\Home\Lists;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repositories\Eloquent\SmallAdsRepository;
//use App\Repositories\AdPhotosRepository;
//use App\Repositories\AdCategoriesRepository;
//use App\Repositories\AdSubCategoriesRepository;

class SmallAdsController extends Controller
{   
    public function index(Request $request)
    {
        $request->session()->forget('small_ads');

        $products = \App\Register::all();

        return view('home.add.small_ads.step1');
    }

    public function lists(Request $request)
    {
        $request->session()->forget('small_ads');
        $products = \App\Register::all();
        return view('home.lists.small_ads');
    }

    
    public function store(Request $request)
    {
        $register = $request->session()->get('register');

        $register->save();

        return redirect('/data');
    }
}
