<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $banners = $this->settingService->getBannerAll();
        $productHots = $this->productService->getListProductHot(8);
        $blogNews = $this->blogService->getBlogNews(4);
        $productTypes = $this->productTypeService->getAll();
        return view('guest.home.home',[
            'banners' => $banners,
            'productHots' => $productHots,
            'blogNews' => $blogNews,
            'productTypes' => $productTypes
        ]);
    }
}
