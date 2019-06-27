<?php

namespace App\Logics;

use App\Common\Constant;
use App\Models\Vendor;

class VendorLogic extends BaseLogic{
    public function getAll(){
        return Vendor::where('is_delete',Constant::$DELETE_FLG_OFF)
            ->orderBy('id','asc')->get();
    }

    public function create($vendorName){
        $vendor = new Vendor();
        $vendor->vendor_name = $vendorName;
        return $vendor->save();
    }

    public function update($vendorId, $vendorName){
        $vendor = Vendor::find($vendorId);
        if(isset($vendor)){
            $vendor->vendor_name = $vendorName;
            $vendor->save();
        }
    }

    public function findId($vendorId){
        return Vendor::find($vendorId);
    }

    public function delete($vendorId){
        $vendor = Vendor::find($vendorId);;
        if(isset($vendor)){
            $vendor->is_delete = Constant::$DELETE_FLG_ON;
            $vendor->save();
        }
    }
}
