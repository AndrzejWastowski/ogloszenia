<?php

declare(strict_types=1);

namespace App\Http\Controllers\SmallAds;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Eloquent\SmallAdsRepository;
use App\Repositories\Eloquent\SmallAdsCategoriesRepository;
use App\Repositories\Eloquent\SmallAdsSubCategoriesRepository;
use App\Repositories\Eloquent\SmallAdsPhotosRepository;
use Illuminate\Support\Facades\Storage;


class ContentController extends Controller
{
    private $smallAdsRepository;
    private $smallAdsCategoriesRepository;
    private $smallAdsSubCategoriesRepository;

    private $storage;

    public function __construct(
        SmallAdsRepository $smallAdsRepository,
        SmallAdsCategoriesRepository $smallAdsCategoriesRepository,
        SmallAdsSubCategoriesRepository $smallAdsSubCategoriesRepository,
        SmallAdsPhotosRepository $smallAdsPhotosRepository,
        Storage $storage


       // Session $session,
    
    ) {
        $this->smallAdsRepository = $smallAdsRepository;
        $this->smallAdsCategoriesRepository = $smallAdsCategoriesRepository;
        $this->smallAdsSubCategoriesRepository = $smallAdsSubCategoriesRepository;
        $this->smallAdsPhotosRepository = $smallAdsPhotosRepository;
        $this->storage = $storage::disk('local');
    }

    public function content(Request $request, $categories, $subcategories, $id)
    {
        //dd($id);
        $categories = $this->smallAdsCategoriesRepository->getAllCategories();
        $subcategories = $this->smallAdsSubCategoriesRepository->getAll();        
        $content = $this->smallAdsRepository->getSmallAdsById($id);
     
       
        return View('smallAds.Content', [
            'pageName' => 'Ogłoszenie',
            'categories' => $categories,
            'subcategories' => $subcategories,
            'contents' => $content,
            'storage' => $this->storage
            ]);
    }
}