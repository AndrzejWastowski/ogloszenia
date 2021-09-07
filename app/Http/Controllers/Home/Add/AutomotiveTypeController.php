<?php

declare(strict_types=1);

namespace App\Http\Controllers\Home\Add;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


final class AutomotiveTypeController extends Controller
{   

    private $storage;

    public function __construct(Storage $storage)
        {

            $this->middleware('auth');            
            $this->storage = $storage::disk('local');
        }

    public function index() {
    
        return view('home.add.automotive.type',
        ['storage' => $this->storage]);
    }

}

