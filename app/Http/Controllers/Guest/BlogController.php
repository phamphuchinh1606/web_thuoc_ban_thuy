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

    public function detail($slug = null, $id){
        $blog = $this->blogService->findId($id);
        return view('guest.blog.blog_detail',[
            'blog' => $blog
        ]);
    }
}
