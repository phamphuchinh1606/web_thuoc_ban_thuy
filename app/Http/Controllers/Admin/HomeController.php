<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $contactsNew = $this->contactService->getContactNew();
        return view('admin.home',[
            'contactsNew' => $contactsNew
        ]);
    }
}
