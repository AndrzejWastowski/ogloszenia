<?php

declare(strict_types=1);

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Eloquent\ServicesRepository;
use App\Repositories\Eloquent\ServicesCategoriesRepository;
use App\Repositories\Eloquent\ServicesPhotosRepository;
use Illuminate\Support\Facades\Storage;


class ContentController extends Controller
{
    private $ServicesRepository;
    private $ServicesCategoriesRepository;
    private $ServicesSubCategoriesRepository;

    private $storage;

    public function __construct(
        ServicesRepository $ServicesRepository,
        ServicesCategoriesRepository $ServicesCategoriesRepository,        
        ServicesPhotosRepository $ServicesPhotosRepository,
        Storage $storage


       // Session $session,
    
    ) {
        $this->ServicesRepository = $ServicesRepository;
        $this->ServicesCategoriesRepository = $ServicesCategoriesRepository;        
        $this->ServicesPhotosRepository = $ServicesPhotosRepository;
        $this->storage = $storage::disk('local');
    }

    public function content(Request $request, $categories, $id)
    {
        //dd($id);
        $categories = $this->ServicesCategoriesRepository->getAllCategories();             
        $content = $this->ServicesRepository->getServicesById($id);
     
       
        return View('Services.Content', [
            'pageName' => 'Ogłoszenie',
            'categories' => $categories,            
            'contents' => $content,
            'storage' => $this->storage
            ]);
    }
}