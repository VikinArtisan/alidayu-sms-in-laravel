<?php

namespace Vikin\Alidayu\ServiceProvider;

use Illuminate\Support\ServiceProvider;
use Vikin\Alidayu\AlidayuMain;

class AlidayuServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot ()
    {
        $this->publishes([
            __DIR__.'/../../Config/alidayu.php' => config_path('alidayu.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register ()
    {
        $this->app->singleton('alidayu', function () {
            return new AlidayuMain();
        });
    }
}
