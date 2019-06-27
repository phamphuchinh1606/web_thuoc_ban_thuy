<?php

namespace App\Services;

class VendorService extends BaseService{

    public function getAll(){
        return $this->vendorLogic->getAll();
    }

    public function create($vendorName){
        $this->vendorLogic->create($vendorName);
    }

    public function update($vendorId, $vendorName){
        $this->vendorLogic->update($vendorId, $vendorName);
    }

    public function findId($vendorId){
        return $this->vendorLogic->findId($vendorId);
    }

    public function delete($vendorId){
        $this->vendorLogic->delete($vendorId);
    }
}
