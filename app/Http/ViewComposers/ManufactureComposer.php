<?php

namespace App\Http\ViewComposers;

use App\Common\Constant;
use Illuminate\View\View;
use App\Services\ManufactureService;

class ManufactureComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $manufactureService;

    private static $manufactures;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct(ManufactureService $manufactureService)
    {
        // Dependencies automatically resolved by service container...
        $this->manufactureService = $manufactureService;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        if(!isset(self::$manufactures)){
            self::$manufactures =  $this->manufactureService->getManufactureAll();
        }
        $view->with('manufactures', self::$manufactures);
    }
}