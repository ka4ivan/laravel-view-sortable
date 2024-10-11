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

        $this->app->bind(\Ka4ivan\ViewSortable\Sort::class, function () {
            return new \Ka4ivan\ViewSortable\Support\Sort;
        });

        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        $loader->alias('Sort', "Ka4ivan\\ViewSortable\\Facades\\Sort");
    }

    protected function publishConfig()
    {
        $this->publishes([
            __DIR__ . '/../config/view-sortable.php' => config_path('view-sortable.php'),
        ], 'view-sortable');
    }
}
