<?php

namespace App\Logics;
use App\Common\Constant;
use App\Models\Contact;

class ContactLogic extends BaseLogic{

    public function getAll($limitPage = 20)
    {
        return Contact::orderBy('created_at', 'desc')->paginate($limitPage);
    }

    public function getContactNew($limitPage = 20){
        return Contact::orderBy('created_at', 'desc')->where('is_read',Constant::$STATUS_READ_ON)->paginate($limitPage);
    }

    public function countContactNotRead(){
        return Contact::whereIsRead(Constant::$STATUS_READ_OFF)->count();
    }

    public function create($params = []){
        $contact = new Contact();
        $contact->guest_name = $params['GuestName'];
        $contact->guest_phone = $params['GuestPhone'];
        $contact->guest_email = $params['GuestEmail'];
        $contact->guest_content = $params['GuestContent'];
        $contact->save();
        return $contact;
    }

    public function save(Contact $contact){
        $contact->save();
    }

    public function findId($id){
        return Contact::find($id);
    }
}
