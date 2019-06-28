<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(
            ['guest.layouts.partials.header.*',
                'admin.common.*'],
            'App\Http\ViewComposers\ProductComposer'
        );
        //Build data tag
        View::composer(['guest.common.__tag_key_one','guest.common.__tag_key_two'],
            'App\Http\ViewComposers\TagComposer');

        //Build data blog
        View::composer(['guest.blog.*','guest.home.partials.main-content-partials.__blogs'],
            'App\Http\ViewComposers\BlogComposer');

        //Build data app info
        View::composer(['guest.*','admin.layouts.*'],
            'App\Http\ViewComposers\AppInfoComposer');

        View::composer(['admin.layouts.partials.*'],
            'App\Http\ViewComposers\ContactComposer');

        //Build data manufacture
        View::composer(['guest.home.partials.main-content-partials.__block_manufacture'],
            'App\Http\ViewComposers\ManufactureComposer');


        //Build data banner
        View::composer([
                'guest.home.partials.main-top-partials.__slider',
                'guest.home.partials.main-content-partials.__top_columns'
        ],
            'App\Http\ViewComposers\BannerComposer');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
