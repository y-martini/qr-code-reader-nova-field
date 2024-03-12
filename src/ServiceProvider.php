<?php

namespace YMartini\Nova\Fields\QRCodeReader;

use Illuminate\Support;
use Laravel\Nova;

class ServiceProvider extends Support\ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Nova\Nova::serving(function (Nova\Events\ServingNova $event) {
            Nova\Nova::script('qr-code-reader-field', __DIR__.'/../dist/js/field.js');
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
