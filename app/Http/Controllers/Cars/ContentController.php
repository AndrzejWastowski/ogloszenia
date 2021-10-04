<?php

declare(strict_types=1);

namespace App\Http\Controllers\Cars;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Eloquent\CarsRepository;
use App\Repositories\Eloquent\CarsBrandsRepository;
use App\Repositories\Eloquent\CarsModelsRepository;
use App\Repositories\Eloquent\CarsPhotosRepository;
use Illuminate\Support\Facades\Storage;


class ContentController extends Controller
{
    private $CarsRepository;
    private $CarsBrandsRepository;
    private $CarsModelsRepository;

    private $storage;

    public function __construct(
        CarsRepository $CarsRepository,
        CarsBrandsRepository $CarsBrandsRepository,
        CarsModelsRepository $CarsModelsRepository,
        CarsPhotosRepository $CarsPhotosRepository,
        Storage $storage


       // Session $session,
    
    ) {
        $this->CarsRepository = $CarsRepository;
        $this->CarsBrandsRepository = $CarsBrandsRepository;
        $this->CarsModelsRepository = $CarsModelsRepository;
        $this->CarsPhotosRepository = $CarsPhotosRepository;
        $this->storage = $storage::disk('local');
    }

    //public function content($brand,$bid,$model,$mid,$name,$id)

    public function content(Request $request)    
    {
        $name = $request->input('user.name');
        $id = (int)$request->id;
        $model = (string)$request->model;
        $mid = (int)$request->mid;
        $brand = (string)$request->brand;
        $bid = (int)$request->bid;
        $name = (string)$request->name;

     /*   $validated = $request->validate([
            'name' => 'required',
            'brand' => 'required',
        ]);
*/
        $data = 'data: '.$brand.' '.$bid.' '.$model.' '.$mid.' '.$name.' '.$id;
    //    dd($validated);
        
        $content = $this->CarsRepository->getCarsById($request->id);
     
       
        return View('cars.Content', [
            'pageName' => 'Ogłoszenie',            
            'contents' => $content,
            'storage' => $this->storage
            ]);
    }
}