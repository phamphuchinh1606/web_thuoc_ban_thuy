<?php

namespace App\Http\ViewComposers;

use App\Common\Constant;
use Illuminate\View\View;
use App\Services\SettingService;

class BannerComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $settingService;

    private static $banners;

    private static $topBanners;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct(SettingService $settingService)
    {
        // Dependencies automatically resolved by service container...
        $this->settingService = $settingService;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        if(!isset(self::$banners)){
            self::$banners = $this->settingService->getBannerAll();
        }
        if(!isset(self::$topBanners)){
            self::$topBanners = $this->settingService->getTopBannerAll();
        }
        $view->with('banners', self::$banners)->with('topBanners', self::$topBanners);
    }
}
