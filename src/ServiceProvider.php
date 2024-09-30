<?php

namespace Ka4ivan\ViewSortable;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishConfig();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/view-sortable.php', 'view-sortable');
    }

    protected function publishConfig()
    {
        $this->publishes([
            __DIR__ . '/../config/view-sortable.php' => config_path('view-sortable.php'),
        ], 'view-sortable');
    }
}
