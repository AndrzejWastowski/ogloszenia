<?php

declare(strict_types=1);

namespace App\Http\Controllers\Services;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



use App\Repositories\Eloquent\ServicesRepository;
use App\Repositories\Eloquent\ServicesCategoriesRepository;
use App\Repositories\Eloquent\ServicesSubCategoriesRepository;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;

class ListsController extends Controller
{
    private $ServicesRepository;
    private $ServicesCategoriesRepository;
    private $ServicesSubCategoriesRepository;

    private $storage;

    public function __construct(
        ServicesRepository $ServicesRepository,
        ServicesCategoriesRepository $ServicesCategoriesRepository,        
        Storage $storage

 
    ) {
        $this->ServicesRepository = $ServicesRepository;
        $this->ServicesCategoriesRepository = $ServicesCategoriesRepository;
        
        $this->storage = $storage::disk('local');
    }



    public function  ListsAllCategories()
    {
        
        
        $contents = $this->ServicesRepository->getAllServices();
        $categories = $this->ServicesCategoriesRepository->getAllCategories();  

     

        return View('Services.ListsAllCategories', [
            'pageName' => 'Lista Nieruchomości',        
            'categories' => $categories ,
            'contents' => $contents,         
            'storage' => $this->storage
            ]);
    }


    public function ListsByCategories($category_link='',$content_page=0) 
    {

        $category = $this->ServicesCategoriesRepository->getCategoriesByLink($category_link);
        
        $categories = $this->ServicesCategoriesRepository->getAllCategories();  
     
        $groups = 'grupy';

         
  

        if (isset($category[0]->id)) {
            
            $contents = $this->ServicesRepository->getServicesByCategoriesId($category[0]->id); 
            
            
            if ($contents->total()==0) 
            return View('Services.ListByCategoriesEmpty',[
                'pageName' => 'Lista nieruchomości',                
                'category' => $category,
                'categories' => $categories,
                'storage' => $this->storage, 
            ]);

           

            return View('Services.ListByCategories', [

                'pageName' => 'Lista nieruchomości',                
                'category' => $category,
                'categories' => $categories,
                'groups' => $groups,
                'contents' => $contents,                
                'storage' => $this->storage,  
    
                ]);       
        }
        else
        {
           return redirect('/nieruchomosci');
        }
      //  dd($total_page);
    }



    //public function ListsBySubCategories($categories,$subcategories)  
    public function ListsBySubCategories($category_link,$subcategory_link )  
    {
        $category = $this->ServicesCategoriesRepository->getCategoriesByLink($category_link);
        $pomsubcategory = $this->ServicesSubCategoriesRepository->getSubCategoriesByLink($subcategory_link);
        
       // dd($content);

        return View('Services.ListBySubCategories', [
            'pageName' => 'Lista nieruchomosci',
            'category' => $category,             
            'storage' => $this->storage
            ]);
    }



}