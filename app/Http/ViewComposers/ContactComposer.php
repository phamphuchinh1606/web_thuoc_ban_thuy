<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Services\ContactService;

class ContactComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $contactService;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct(ContactService $contactService)
    {
        // Dependencies automatically resolved by service container...
        $this->contactService = $contactService;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $count = $this->contactService->countContactNotRead();
        $view->with('countContact', $count);
    }
}