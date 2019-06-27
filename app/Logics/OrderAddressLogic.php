<?php

namespace App\Logics;

use App\Models\OrderAddress;

class OrderAddressLogic extends BaseLogic{
    public function create($params = []){
        $orderAddress = new OrderAddress();
        $orderAddress->order_id = $params['orderId'];
        $orderAddress->full_name = $params['fullName'];
        $orderAddress->phone_number = $params['phone'];
        $orderAddress->email = $params['email'];
        $orderAddress->address = $params['address'];
        $orderAddress->ward = $params['provinceId'];
        $orderAddress->district = $params['districtId'];
        $orderAddress->save();
        return $orderAddress;
    }
}
