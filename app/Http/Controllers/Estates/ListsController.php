<?php

declare(strict_types=1);

namespace App\Http\Controllers\Estates;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



use App\Repositories\Eloquent\EstatesRepository;
use App\Repositories\Eloquent\EstatesCategoriesRepository;
use App\Repositories\Eloquent\EstatesSubCategoriesRepository;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;

class ListsController extends Controller
{
    private $EstatesRepository;
    private $EstatesCategoriesRepository;
    private $EstatesSubCategoriesRepository;

    private $storage;

    public function __construct(
        EstatesRepository $EstatesRepository,
        EstatesCategoriesRepository $EstatesCategoriesRepository,        
        Storage $storage

 
    ) {
        $this->EstatesRepository = $EstatesRepository;
        $this->EstatesCategoriesRepository = $EstatesCategoriesRepository;
        
        $this->storage = $storage::disk('local');
    }



    public function  ListsAllCategories()
    {
        
        
        $content = $this->EstatesRepository->getAllEstates();
        $categories = $this->EstatesCategoriesRepository->getAllCategories();  

     //   dd($content);
    
    

        return View('Estates.ListsAllCategories', [
            'pageName' => 'Lista Nieruchomości',        
            'categories' => $categories ,
            'contents' => $content,         
            'storage' => $this->storage
            ]);
    }


    public function ListsByCategories($category_link='',$content_page=0) 
    {

        $category = $this->EstatesCategoriesRepository->getCategoriesByLink($category_link);
        

        if (!is_null($category)) {

            $subcategories = $this->EstatesSubCategoriesRepository->getSubcategoriesByCategoriesId($category->id);
         

           

            return View('Estates.ListByCategories', [

                'pageName' => 'Lista Ogłoszeń',
                
                'category' => $category,
                'subcategories' => $subcategories,
                
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
        $category = $this->EstatesCategoriesRepository->getCategoriesByLink($category_link);
        $pomsubcategory = $this->EstatesSubCategoriesRepository->getSubCategoriesByLink($subcategory_link);
        
       // dd($content);

        return View('Estates.ListBySubCategories', [
            'pageName' => 'Lista Ogłoszeń',
            'category' => $category,
            'pomsubcategory' => $pomsubcategory,         
            'storage' => $this->storage
            ]);
    }



}