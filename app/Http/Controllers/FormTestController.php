<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

final class FormTestController extends Controller
{

    private $storage;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        Storage $storage )
    {
        $this->storage = $storage;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index()
    {
        $storage = $this->storage::disk('local');
        

        return View('FormTest', [
            'storage' => $storage,   
            ]);

    }
}


