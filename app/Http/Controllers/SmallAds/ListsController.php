<?php

declare(strict_types=1);

namespace App\Http\Controllers\SmallAds;

use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\SmallAdsRepository;
use App\Repositories\Eloquent\SmallAdsCategoriesRepository;
use App\Repositories\Eloquent\SmallAdsSubCategoriesRepository;
use App\Repositories\Eloquent\SmallAdsPhotosRepository;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;

class ListsController extends Controller
{
    private $smallAdsRepository;
    private $smallAdsCategoriesRepository;
    private $smallAdsSubCategoriesRepository;
    private $smallAdsPhotosRepository;
    private $priceRepository;
    private $storage;

    public function __construct(
        SmallAdsRepository $smallAdsRepository,
        SmallAdsCategoriesRepository $smallAdsCategoriesRepository,
        SmallAdsSubCategoriesRepository $smallAdsSubCategoriesRepository,
        SmallAdsPhotosRepository $smallAdsPhotosRepository,
        Storage $storage

        /*AdPhotosRepository $photoRepository,
        PaymentsRepository $paymentsRepository,
        Session $session,
        Carbon $carbon,
        Storage $storage
        */
    ) {
        $this->smallAdsRepository = $smallAdsRepository;
        $this->smallAdsCategoriesRepository = $smallAdsCategoriesRepository;
        $this->smallAdsSubCategoriesRepository = $smallAdsSubCategoriesRepository;
        $this->smallAdsPhotosRepository = $smallAdsPhotosRepository;
        $this->storage = $storage::disk('local');
    }

    public function index()
    {

        //$categories = $this->smallAdsCategoriesRepository->getAllCategories();
        //$subcategories = $this->smallAdsSubCategoriesRepository->getAll();
        //$content = $this->smallAdsRepository->getAll();
        //$content = $this->smallAdsRepository->getAll();
        $content = $this->smallAdsRepository->getPromoted(8,1);
        

        return View('smallAds.AdsListByCategories', [
            'pageName' => 'Lista Ogłoszeń',
         //   'categories' => $categories,
          //  'subCategories' => $subcategories,
            'contents' => $content,
            'storage' => $this->storage
            ]);
    }


    public function lists()
    {
        $categories = $this->smallAdsCategoriesRepository->getAllCategories();
        $subcategories = $this->smallAdsSubCategoriesRepository->getAll();
        $content = $this->smallAdsRepository->getAll();
        return View('ads.AdsListByCategories', [
            'pageName' => 'Lista Ogłoszeń',
            'adsCategories' => $categories,
            'adsCategories' => $subcategories,
            'adsContents' => $content,
            ]);
    }

    public function ListsByCategories()
    {
        $categories = $this->smallAdsCategoriesRepository->getAllCategories();
        $subcategories = $this->smallAdsSubCategoriesRepository->getAll();
        $content = $this->smallAdsRepository->getAll();

        return View('smallAds.ListByCategories', [
            'pageName' => 'Lista Ogłoszeń',
            'adsCategories' => $categories,
            'adsCategories' => $subcategories,
            'adsContents' => $content,
            ]);
    }


    public function indexcc(
        SmallAdsRepository $smallAdsRepository,
        SmallAdsCategoriesRepository $categoriesRepository,
        SmallAdsPhotosRepository $repoPhoto
    ) {
        dd($categoriesRepository);

        $adsCategories = $categoriesRepository->getPopularCategories();
        $adsContents = $smallAdsRepository->getAll();
        

        return View('ads.AdsListByCategories', [
            'pageName' => 'Lista Ogłoszeń',
            'adsCategories' => $adsCategories,
            'adsContents' => $adsContents,
            ]);
    }
}