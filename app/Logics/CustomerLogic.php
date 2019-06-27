<?php

namespace App\Logics;

use App\Models\Customer;

class CustomerLogic extends BaseLogic{
    public function create($params = []){
        $customer = new Customer();
        $customer->full_name = $params['fullName'];
        $customer->phone = $params['phone'];
        $customer->email = $params['email'];
        $customer->address = $params['address'];
        $customer->province_id = $params['provinceId'];
        $customer->district_id = $params['districtId'];
        $customer->save();
        return $customer;
    }
}
