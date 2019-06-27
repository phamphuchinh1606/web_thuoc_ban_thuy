<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
        return view('guest.about.about');
    }

    public function album(){
        $albums = $this->albumService->getAll();
        return view('guest.album.album',['albums' => $albums]);
    }
}
