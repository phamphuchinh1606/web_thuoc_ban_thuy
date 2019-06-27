<?php

namespace App\Services;
use App\Common\AppCommon;
use App\Common\Constant;
use Illuminate\Http\Request;
use DB;
use phpDocumentor\Reflection\DocBlock\Tags\Throws;

class OrderService extends BaseService{

    public function getAll($searchForm){
        $orders = $this->orderLogic->getAll($searchForm);
        foreach ($orders as $order){
            $order->status_name = AppCommon::namePublicOrderStatus($order->status_order);
            $order->status_class = AppCommon::classPublicOrderStatus($order->status_order);
        }
        return $orders;
    }

    public function getDetail($orderId){
        $order = $this->orderLogic->getOrderInfo($orderId);
        $order->status_name = AppCommon::namePublicOrderStatus($order->status_order);
        $order->status_class = AppCommon::classPublicOrderStatus($order->status_order);
        $order->orderDetails = $this->orderDetailLogic->getOrderDetailInfo($orderId);
        return $order;
    }

    public function createOrder($cartItems , $shippingInfo, $totalAmount, $shipmentAmount){
        try{
            DB::beginTransaction();
            $params['orderDate'] = AppCommon::newDate();
            $params['totalAmount'] = $totalAmount;
            $params['paymentAmount'] = 0;
            $params['statusOrder'] = Constant::$ORDER_STATUS_NEW_CODE;
            $params['note'] = $shippingInfo['note'];
            $params['orderCode'] = $this->ramdomOrderCode();
            //Create Order
            $order = $this->orderLogic->create($params);

            //Create order address
            $this->orderAddressLogic->create(array(
                'orderId' => $order->id,
                'fullName' => $shippingInfo['full_name'],
                'phone' => $shippingInfo['phone'],
                'email' => $shippingInfo['email'],
                'address' => $shippingInfo['address'],
                'provinceId' => $shippingInfo['province'],
                'districtId' => $shippingInfo['district']
            ));

            //Create order detail
            foreach ($cartItems as $orderDetail){
                $this->orderDetailLogic->create(array(
                    'orderId' => $order->id,
                    'productId' => $orderDetail->id,
                    'productPrice' => $orderDetail->price,
                    'productQty' => $orderDetail->quantity,
                    'totalMoney' => $orderDetail->getPriceSum()
                ));
            }
            DB::commit();
        }catch (\Exception $ex){
            DB::rollBack();
            throw new \Exception($ex);
        }
    }

    private function ramdomOrderCode(){
        $maxOrderCode = $this->orderLogic->getMaxOrderCode();
        $strStart = "HD";
        if(isset($maxOrderCode)){
            $intMaxOrder = str_replace($strStart,"",$maxOrderCode);
            $number = intval($intMaxOrder) + 1;
            return $strStart.str_pad($number,6,'0',STR_PAD_LEFT);
        }else{
            return $strStart.str_pad(1,6,'0',STR_PAD_LEFT);
        }
    }

    public function updateStatusOrder($orderId, $orderStatus){
        $order = $this->orderLogic->findId($orderId);
        if($orderStatus != $order->status_order){
            $order->status_order = $orderStatus;
            $this->orderLogic->save($order);
        }
    }
}
