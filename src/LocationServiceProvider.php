<?php

namespace Elbrahms\NigerLocation;

use Illuminate\Support\ServiceProvider;
use Elbrahms\NigerLocation\Seeders\LocationDatabaseSeeder;
class LocationServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Elbrahms\NigerLocation\Http\Controllers\LocationController');
        $this->app->make('Elbrahms\NigerLocation\Database\Seeders\LocationDatabaseSeeder');
        $this->mergeConfigFrom(__DIR__ . "/../publishable/config/location.php", 'niger-location');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');

        if ($this->app->runningInConsole()) {
            $this->publishConfigs();
        }
    }

    protected function publishConfigs()
    {
        $this->publishes([
            __DIR__ . "/../publishable/config/location.php" => config_path('location.php'),
        ], 'niger-location');
    }
}

