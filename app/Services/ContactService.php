<?php

namespace App\Services;
use App\Common\AppCommon;
use App\Common\Constant;
use Illuminate\Http\Request;

class ContactService extends BaseService{
    public function getAll(){
        $contacts = $this->contactLogic->getAll();
        foreach ($contacts as $contact){
            $contact->status_name = AppCommon::nameStatusIsRead($contact->is_read);
            $contact->status_class = AppCommon::classStatusIsRead($contact->is_read);
        }
        return $contacts;
    }

    public function getContactNew(){
        $contacts = $this->contactLogic->getContactNew();
        foreach ($contacts as $contact){
            $contact->status_name = AppCommon::nameStatusIsRead($contact->is_read);
            $contact->status_class = AppCommon::classStatusIsRead($contact->is_read);
        }
        return $contacts;
    }

    public function countContactNotRead(){
        return $this->contactLogic->countContactNotRead();
    }

    public function create(Request $request){
        $params['GuestName'] = $request->guest_name;
        $params['GuestPhone'] = $request->guest_phone;
        $params['GuestEmail'] = $request->guest_email;
        $params['GuestContent'] = $request->guest_content;
        return $this->contactLogic->create($params);
    }

    public function findId($id){
        return $this->contactLogic->findId($id);
    }

    public function updateReadContact($id){
        $contact = $this->contactLogic->findId($id);
        if($contact){
            $contact->is_read = Constant::$STATUS_READ_ON;
            $this->contactLogic->save($contact);
        }
    }

}
