<?php

namespace App\Logics;

use App\Models\OrderDetail;
use App\Models\TableNameDB;

class OrderDetailLogic extends BaseLogic{
    public function create($params = []){
        $orderDetail = new OrderDetail();
        $orderDetail->order_id = $params['orderId'];
        $orderDetail->product_id = $params['productId'];
        $orderDetail->product_price = $params['productPrice'];
        $orderDetail->product_qty = $params['productQty'];
        $orderDetail->total_money = $params['totalMoney'];
        $orderDetail->save();
        return $orderDetail;
    }

    public function getOrderDetailInfo($orderId){
        $tableOrderDetail = TableNameDB::$TableOrderDetail;
        $tableProduct = TableNameDB::$TableProduct;
        $orderDetails = OrderDetail::join($tableProduct.' as product','product.id','=',$tableOrderDetail.'.product_id')
                        ->where($tableOrderDetail.'.order_id',$orderId)
                        ->select($tableOrderDetail.'.*','product.product_name')
                        ->get();
        return $orderDetails;
    }
}
