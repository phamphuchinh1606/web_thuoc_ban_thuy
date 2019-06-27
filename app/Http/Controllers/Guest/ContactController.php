<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request$request){
        return view('guest.contact.contact',[
            'email' => $request->email
        ]);
    }

    public function sendContact(Request$request){
        $this->contactService->create($request);
        return redirect()->route('contact')->with('message','Đã gửi thông tin hỗ trợ thành công . Chúng tôi sẽ liên hệ trong thời gian sớm nhất');
    }
}
