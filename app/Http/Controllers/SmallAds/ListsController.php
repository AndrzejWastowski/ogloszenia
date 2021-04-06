<?php

declare(strict_types=1);

namespace App\Http\Controllers\SmallAds;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



use App\Repositories\Eloquent\SmallAdsRepository;
use App\Repositories\Eloquent\SmallAdsCategoriesRepository;
use App\Repositories\Eloquent\SmallAdsSubCategoriesRepository;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;

class ListsController extends Controller
{
    private $smallAdsRepository;
    private $smallAdsCategoriesRepository;
    private $smallAdsSubCategoriesRepository;

    private $storage;

    public function __construct(
        SmallAdsRepository $smallAdsRepository,
        SmallAdsCategoriesRepository $smallAdsCategoriesRepository,
        SmallAdsSubCategoriesRepository $smallAdsSubCategoriesRepository,
        Storage $storage

 
    ) {
        $this->smallAdsRepository = $smallAdsRepository;
        $this->smallAdsCategoriesRepository = $smallAdsCategoriesRepository;
        $this->smallAdsSubCategoriesRepository = $smallAdsSubCategoriesRepository;     
        $this->storage = $storage::disk('local');
    }


    public function lists()
    {
        $categories = $this->smallAdsCategoriesRepository->getAllCategories();
        $subcategories = $this->smallAdsSubCategoriesRepository->getAll();        
        $content = $this->smallAdsRepository->getPromoted(8,1);
        

        return View('smallAds.AdsListByCategories', [
            'pageName' => 'Lista Ogłoszeń',
            'categories' => $categories,
            'subcategories' => $subcategories,
            'contents' => $content,
            'storage' => $this->storage
            ]);
    }

    public function ListsByCategories(Request $request) 
    {

        dd($request);
        $categoriesId = 10;
        $link = 'elektronika';

        $categories = $this->smallAdsCategoriesRepository->getAllCategories();
        $subcategories = $this->smallAdsSubCategoriesRepository->getAll();

        $category = $this->smallAdsCategoriesRepository->getCategoriesByLink($link);

        if ($$category==null) {
            $content = $this->smallAdsRepository->getAll();
          //  dd($content);
        }
        else
        {
            
            $content = $this->smallAdsRepository->getAllSmallAdsByCategoriesId($category->id,10,0);
        }

        dd($content);        

        return View('smallAds.ListByCategories', [
            'pageName' => 'Lista Ogłoszeń',
            'categories' => $categories,
            'subcategories' => $subcategories,
            'contents' => $content,
            'storage' => $this->storage
            ]);
    }



    //public function ListsBySubCategories($categories,$subcategories)  
    public function ListsBySubCategories(Request $request,$category_link,$subcategory_link )  
    {
       // dd($request->all());


        $category = $this->smallAdsCategoriesRepository->getCategoriesByLink($category_link);
        $subcategory = $this->smallAdsSubCategoriesRepository->getSubCategoriesByLink($subcategory_link);       

        $error = false;
        $error_message = '';

        if ($category==null) {
            $error = true;
            $error_message = 'nie ma takiej kategorii';
        }

        if ($subcategory==null) {
            $error = true;
            $error_message = 'nie ma takiej podkategorii';
        }

        $categories = $this->smallAdsCategoriesRepository->getAll();
        $subcategories = $this->smallAdsSubCategoriesRepository->getAll();
 
        //dd($subcategory);

        if ($subcategory==null) {
            $content = $this->smallAdsRepository->getAll();
            
        }
        else
        {
            
            $content = $this->smallAdsRepository->getAllSmallAdsBySubCategoriesId($subcategory->id,10,0);
        }
       // dd($subcategory);  

        return View('smallAds.ListByCategories', [
            'pageName' => 'Lista Ogłoszeń',
            'categories' => $categories,
            'subcategories' => $subcategories,
            'contents' => $content,
            'storage' => $this->storage
            ]);
    }



}