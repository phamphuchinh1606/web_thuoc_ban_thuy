<?php

namespace App\Http\Controllers\Guest;

use App\Common\Constant;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $blogs = $this->blogService->getAll(['isPublic' => Constant::$PUBLIC_FLG_ON, 'limit' => 6]);
        return view('guest.blog.blog',[
            'blogs' => $blogs
        ]);
    }

    public function detail($slug = null){
        $blog = $this->blogService->findSlug($slug);
        return view('guest.blog.blog_detail',[
            'blog' => $blog
        ]);
    }
}
