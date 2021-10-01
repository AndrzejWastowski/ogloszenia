<?php

declare(strict_types=1);

namespace App\Http\Controllers\Automotive;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Eloquent\CarsRepository;
use Illuminate\Support\Facades\Storage;


class StartController extends Controller
{
    private $carsRepository;

    private $storage;

    public function __construct(
        CarsRepository $carsRepository,
        Storage $storage


       // Session $session,
    
    ) {
        $this->carsRepository = $carsRepository;
        $this->storage = $storage::disk('local');
    }

    public function index()
    {
        
        return View('automotive.Start', [            
            'storage' => $this->storage
            ]);
    }
}