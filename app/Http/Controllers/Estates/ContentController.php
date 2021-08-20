<?php

declare(strict_types=1);

namespace App\Http\Controllers\Estates;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Eloquent\EstatesRepository;
use App\Repositories\Eloquent\EstatesCategoriesRepository;
use App\Repositories\Eloquent\EstatesPhotosRepository;
use Illuminate\Support\Facades\Storage;


class ContentController extends Controller
{
    private $EstatesRepository;
    private $EstatesCategoriesRepository;
    private $EstatesSubCategoriesRepository;

    private $storage;

    public function __construct(
        EstatesRepository $EstatesRepository,
        EstatesCategoriesRepository $EstatesCategoriesRepository,        
        EstatesPhotosRepository $EstatesPhotosRepository,
        Storage $storage


       // Session $session,
    
    ) {
        $this->EstatesRepository = $EstatesRepository;
        $this->EstatesCategoriesRepository = $EstatesCategoriesRepository;        
        $this->EstatesPhotosRepository = $EstatesPhotosRepository;
        $this->storage = $storage::disk('local');
    }

    public function content(Request $request, $categories, $id)
    {
        //dd($id);
        $categories = $this->EstatesCategoriesRepository->getAllCategories();             
        $content = $this->EstatesRepository->getEstatesById($id);
     
       
        return View('estates.Content', [
            'pageName' => 'Ogłoszenie',
            'categories' => $categories,            
            'contents' => $content,
            'storage' => $this->storage
            ]);
    }
}