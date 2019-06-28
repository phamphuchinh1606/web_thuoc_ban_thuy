<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Services\ProductTypeService;
use App\Services\VendorService;
use App\Services\{ProductService, EquipmentTypeService, DesignTypeService};

class ProductComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $productTypeService;

    protected $equipmentTypeService;

    protected $designTypeService;

    protected $productService;

    protected $vendorService;

    private static $productTypes;

    protected static $equipmentTypes;

    protected static $designTypes;

    private static $vendors;

    private static $productHosts;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct(ProductTypeService $productTypeService, VendorService $vendorService, ProductService $productService,
                                EquipmentTypeService $equipmentTypeService , DesignTypeService $designTypeService)
    {
        // Dependencies automatically resolved by service container...
        $this->productTypeService = $productTypeService;
        $this->vendorService = $vendorService;
        $this->productService = $productService;
        $this->equipmentTypeService = $equipmentTypeService;
        $this->designTypeService = $designTypeService;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        if(!isset(self::$productTypes)){
            self::$productTypes =  $this->productTypeService->getAllByTree();
        }
        if(!isset(self::$equipmentTypes)){
            self::$equipmentTypes =  $this->equipmentTypeService->getAllByTree();
        }
        if(!isset(self::$designTypes)){
            self::$designTypes =  $this->designTypeService->getAllByTree();
        }

//        if(!isset(self::$vendors)){
//            self::$vendors =  $this->vendorService->getAll();
//        }
//
//        if(!isset(self::$productHosts)){
//            self::$productHosts = $this->productService->getListProductHot();
//        }

        $view->with('productTypes', self::$productTypes)
                ->with('equipmentTypes',self::$equipmentTypes)
                ->with('designTypes', self::$designTypes);
    }
}