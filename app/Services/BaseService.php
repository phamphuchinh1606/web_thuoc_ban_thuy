<?php

namespace App\Services;

use App\Logics\{ContactLogic,
    CustomerLogic,
    OrderAddressLogic,
    OrderDetailLogic,
    OrderLogic,
    ProductTypeLogic,
    ProductLogic,
    ProductImageLogic,
    VendorLogic,
    SettingLogic,
    BlogLogic,
    AddressLogic,
    ManufactureLogic,
    AlbumLogic,
    EquipmentTypeLogic,
    DesignTypeLogic};

class BaseService {
    protected $productTypeLogic;

    protected $productLogic;

    protected $productImageLogic;

    protected $vendorLogic;

    protected $settingLogic;

    protected $blogLogic;

    protected $addressLogic;

    protected $contactLogic;

    protected $orderLogic;

    protected $orderDetailLogic;

    protected $customerLogic;

    protected $orderAddressLogic;

    protected $manufactureLogic;

    protected $albumLogic;

    protected $equipmentTypeLogic;

    protected $designTypeLogic;

    public function __construct(ProductTypeLogic $productTypeLogic, ProductLogic $productLogic,
                                ProductImageLogic $productImageLogic , VendorLogic $vendorLogic,
                                SettingLogic $settingLogic, BlogLogic $blogLogic, AddressLogic $addressLogic,
                                ContactLogic $contactLogic, CustomerLogic $customerLogic, OrderAddressLogic $orderAddressLogic,
                                OrderLogic $orderLogic, OrderDetailLogic $orderDetailLogic, ManufactureLogic $manufactureLogic,
                                AlbumLogic $albumLogic, EquipmentTypeLogic $equipmentTypeLogic, DesignTypeLogic $designTypeLogic)
    {
        $this->productTypeLogic = $productTypeLogic;
        $this->productLogic = $productLogic;
        $this->productImageLogic = $productImageLogic;
        $this->vendorLogic = $vendorLogic;
        $this->settingLogic = $settingLogic;
        $this->blogLogic = $blogLogic;
        $this->addressLogic = $addressLogic;
        $this->contactLogic = $contactLogic;
        $this->customerLogic = $customerLogic;
        $this->orderAddressLogic = $orderAddressLogic;
        $this->orderLogic = $orderLogic;
        $this->orderDetailLogic = $orderDetailLogic;
        $this->manufactureLogic = $manufactureLogic;
        $this->albumLogic = $albumLogic;
        $this->equipmentTypeLogic = $equipmentTypeLogic;
        $this->designTypeLogic = $designTypeLogic;
    }
}
