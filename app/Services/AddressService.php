<?php

namespace App\Services;

class AddressService extends BaseService{
    public function createCountry($countryCode, $countryName, $label, $value){
        return $this->addressLogic->createCountry($countryCode, $countryName, $label, $value);
    }

    public function createProvince($code, $label,$lat, $lon, $name, $countryCode){
        return $this->addressLogic->createProvince($code, $label, $lat, $lon, $name, $countryCode);
    }

    public function createDistrict($code, $label, $lat, $lon, $name, $provinceCode){
        return $this->addressLogic->createDistrict($code, $label, $lat, $lon, $name, $provinceCode);
    }

    public function getProvinceByCode($code){
        return $this->addressLogic->getProvinceByCode($code);
    }

    public function getProvinceAll(){
        return $this->addressLogic->getProvinceAll();
    }

    public function getDistrictByProvinceCode($provinceCode){
        return $this->addressLogic->getDistrictByProvinceCode($provinceCode);
    }

}
