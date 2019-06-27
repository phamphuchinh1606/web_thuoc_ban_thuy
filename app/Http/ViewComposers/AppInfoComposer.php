<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Services\SettingService;

class AppInfoComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $settingService;

    private static $appInfo;

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
        if(!isset(self::$appInfo)){
            self::$appInfo = $this->settingService->getAppInfo();
        }
        $view->with('appInfo', self::$appInfo);
    }
}