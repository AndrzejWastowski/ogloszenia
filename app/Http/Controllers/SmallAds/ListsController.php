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

    public function ListsByCategories($category_link) 
    {

        $category = $this->smallAdsCategoriesRepository->getCategoriesByLink($category_link);


        if (!is_null($category)) {

            $subcategories = $this->smallAdsSubCategoriesRepository->getSubcategoriesByCategoriesId($category->id);
            $content = $this->smallAdsRepository->getAllSmallAdsByCategoriesId($category->id, 10, 0);
        }
        else
        {


        }

      //  dd($content);        

        return View('smallAds.ListByCategories', [
            'pageName' => 'Lista Ogłoszeń',
            'category' => $category,
            'subcategories' => $subcategories,
            'contents' => $content,
            'storage' => $this->storage
            ]);
    }



    //public function ListsBySubCategories($categories,$subcategories)  
    public function ListsBySubCategories($category_link,$subcategory_link )  
    {
       $category = $this->smallAdsCategoriesRepository->getCategoriesByLink($category_link);
       $subcategory = $this->smallAdsSubCategoriesRepository->getSubCategoriesByLink($subcategory_link);


      if (!is_null($category)) {

     
          $subcategories = $this->smallAdsSubCategoriesRepository->getSubcategoriesByCategoriesId($category->id);
          $content = $this->smallAdsRepository->getAllSmallAdsBySubCategoriesId($subcategory->id, 10, 0);
      }
      else
      {


      }
 
        //dd($subcategory);


        return View('smallAds.ListBySubCategories', [
            'pageName' => 'Lista Ogłoszeń',
            'category' => $category,
            'subcategory' => $subcategory,         
            'subcategories' => $subcategories,
            'contents' => $content,
            'storage' => $this->storage
            ]);
    }



}