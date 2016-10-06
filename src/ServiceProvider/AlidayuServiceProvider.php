<?php

namespace Vikin\Alidayu;

use Illuminate\Support\ServiceProvider;

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
