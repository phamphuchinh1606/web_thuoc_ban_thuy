<?php

namespace App\Http\ViewComposers;

use App\Common\Constant;
use Illuminate\View\View;
use App\Services\BlogService;

class BlogComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $blogService;

    protected static $blogNews;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct(BlogService $blogService)
    {
        // Dependencies automatically resolved by service container...
        $this->blogService = $blogService;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        if(!isset(self::$blogNews)){
            self::$blogNews = $this->blogService->getBlogNews(5);
        }
        $view->with('blogNews', self::$blogNews);
    }
}