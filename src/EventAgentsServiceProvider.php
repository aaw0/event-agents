<?php

namespace Aaw0\EventAgents;

use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Nova;

class EventAgentsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Nova::resources([
            EventAgent::class
        ]);
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
    }

    public function register()
    {

    }
}
