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



    public function  ListsAllCategories()
    {
        $categories = $this->smallAdsCategoriesRepository->getAllCategoriesWithSubcategories();
        $subcategories = $this->smallAdsSubCategoriesRepository->getAllSubCategories();        
        $content = $this->smallAdsRepository->getLastSmallAds(10);  

        dd($content);
    
    

        return View('smallAds.ListsAllCategories', [
            'pageName' => 'Lista Ogłoszeń Drobnych',
            'categories' => $categories,
            'subcategories' => $subcategories,   
            'contents' => $content,         
            'storage' => $this->storage
            ]);
    }


    public function ListsByCategories($category_link='',$content_page=0) 
    {

        $category = $this->smallAdsCategoriesRepository->getCategoriesByLink($category_link);
        $categories = $this->smallAdsCategoriesRepository->getAllCategoriesWithSubcategoriesByCategoriesId($category->id);

        if (!is_null($category)) {

            $subcategories = $this->smallAdsSubCategoriesRepository->getSubcategoriesByCategoriesId($category->id);
            $content = $this->smallAdsRepository->getAllSmallAdsByCategoriesId($category->id,10);    

           

            return View('smallAds.ListByCategories', [

                'pageName' => 'Lista Ogłoszeń',
                'categories' => $categories,
                'category' => $category,
                'subcategories' => $subcategories,
                'contents' => $content,
                'storage' => $this->storage,  
    
                ]);       
        }
        else
        {
            $this->ListsAllCategories();
        }
      //  dd($total_page);
    }



    //public function ListsBySubCategories($categories,$subcategories)  
    public function ListsBySubCategories($category_link,$subcategory_link )  
    {
        $category = $this->smallAdsCategoriesRepository->getCategoriesByLink($category_link);
        $pomsubcategory = $this->smallAdsSubCategoriesRepository->getSubCategoriesByLink($subcategory_link);
        $categories = $this->smallAdsCategoriesRepository->getAllCategoriesWithSubcategoriesByCategoriesId($category->id);
        $content = $this->smallAdsRepository->getAllSmallAdsBySubCategoriesId($pomsubcategory->id,20);
  
       // dd($content);

        return View('smallAds.ListBySubCategories', [
            'pageName' => 'Lista Ogłoszeń',
            'category' => $category,
            'pomsubcategory' => $pomsubcategory,         
            'categories' => $categories,          
            
            'contents' => $content,
            'storage' => $this->storage
            ]);
    }



}