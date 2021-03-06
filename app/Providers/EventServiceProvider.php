<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\UserCreated' => [
            'App\Listeners\UsersEventListeners',
        ],

        'App\Events\CommentCreated' => [
            'App\Listeners\CommentsEventListeners',
        ],

        'App\Events\Modelchanged' => [
            'App\Listeners\CacheHandler',
        ],
    ];

    protected $subscribe = [
        'App\Listeners\UsersEventListeners',
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
