<?php

namespace App\Logics;

use App\Common\AppCommon;
use App\Common\Constant;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\TableNameDB;

class OrderLogic extends BaseLogic{

    public function findId($orderId){
        return Order::find($orderId);
    }

    public function save($order){
        if($order){
            $order->save();
        }
    }

    public function getAll($searchForm = [] , $limitPage = 20){
        $tableOrder = TableNameDB::$TableOrder;
        $query = Order::join(TableNameDB::$TableOrderAddress. ' as shipping', $tableOrder.'.id','=','shipping.order_id')
                        ->select($tableOrder.'.*', 'shipping.full_name','shipping.email','shipping.phone_number');
        if(count($searchForm) > 0){
            if(isset($searchForm['order_code'])){
                $query->whereOrderCode($searchForm['order_code']);
            }
            if(isset($searchForm['full_name'])){
                $query->whereRaw("LOWER(shipping.full_name) like '%".strtolower($searchForm['full_name'])."%'");
            }
            if(isset($searchForm['phone_number'])){
                $query->where('shipping.phone_number',$searchForm['phone_number']);
            }
            if(isset($searchForm['email'])){
                $query->where('shipping.email',$searchForm['email']);
            }
            if(isset($searchForm['order_date_start'])){
                $query->whereDate($tableOrder.'.order_date','>=',$searchForm['order_date_start']);
            }
            if(isset($searchForm['order_date_end'])){
                $query->whereDate($tableOrder.'.order_date','<=',$searchForm['order_date_end']);
            }
            if(isset($searchForm['order_status'])){
                $query->whereStatusOrder($searchForm['order_status']);
            }
        }
        $orders = $query->paginate($limitPage);
        return $orders;
    }

    public function getOrderInfo($orderId){
        $tableOrder = TableNameDB::$TableOrder;
        $tableProvince = TableNameDB::$TableProvince;
        $tableDistrict = TableNameDB::$TableDistrict;
        $order = Order::join(TableNameDB::$TableOrderAddress.' as address',$tableOrder.'.id','=','address.order_id')
                ->leftjoin($tableProvince.' as province','province.code','=','address.ward')
                ->leftjoin($tableDistrict.' as district','district.code','=','address.district')
                ->where($tableOrder.'.id',$orderId)
                ->select($tableOrder.'.*', 'address.full_name','address.email','address.phone_number','address.address')
                ->first();
        return $order;
    }

    public function create($params = []){
        $order = new Order();
        $order->order_date = $params['orderDate'];
        $order->total_amount = $params['totalAmount'];
        $order->payment_amount = $params['paymentAmount'];
        $order->status_order = $params['statusOrder'];
        $order->note = $params['note'];
        if(isset($params['orderCode'])){
            $order->order_code = $params['orderCode'];
        }
        $order->save();
        return $order;
    }

    public function getMaxOrderCode(){
        $orderCode = Order::max('order_code');
        return $orderCode;
    }
}
