<?php

namespace QueueRedis;

use Illuminate\Support\ServiceProvider;

class QueueRedisServiceProvider extends ServiceProvider {

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                QueueRedisCommand::class,
            ]);
        }
    }
}