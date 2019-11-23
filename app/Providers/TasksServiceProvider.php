<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class TasksServiceProvider extends ServiceProvider
{
    /**
     * Register any tasks interfaces for our application.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'InterfaceUser',
            'User'
        );
        $this->app->bind(
            'InterfacePost',
            'Post'
        );
    }
}
