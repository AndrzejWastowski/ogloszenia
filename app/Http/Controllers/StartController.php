<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class StartController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $storage = Storage::disk('public');
       // $adsContents = $adRepo->getPromoted(12, 0);

        //$estatesContents = $estateRepo->getPromoted(12,0);

        //$adsLastChanse = $adRepo->getLastChanse(4);
        // dd($adsLastChanse);
        //$adsNewOffer = $adRepo->getNewOffer(4);
        //$adsTopView = $adRepo->getTopView(4);

        return view('start',[
            'storage' => $storage
        ]);
    }

    public function start()
    {
        return view('start');
    }
}
