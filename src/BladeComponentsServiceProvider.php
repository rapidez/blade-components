<?php

namespace Rapidez\BladeComponents;

use Illuminate\Support\ServiceProvider;

class BladeComponentsServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        $this
            ->bootViews()
            ->bootPublishables();
    }

    public function bootViews() : self
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'rapidez');

        return $this;
    }

    public function bootPublishables() : self
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/rapidez'),
            ], 'rapidez-blade-components-views');
        }

        return $this;
    }
}
