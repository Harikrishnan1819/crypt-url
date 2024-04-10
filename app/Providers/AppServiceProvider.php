<?php

namespace App\Providers;

use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        {
            // parent::boot();
        
            $this->app['router']->aliasMiddleware('encryptParams', \App\Http\Middleware\EncryptQueryParams::class);
            $this->app['router']->aliasMiddleware('decryptParams', \App\Http\Middleware\DecryptQueryParams::class);
        }

        // $this->app->resolving(UrlGenerator::class, function (UrlGenerator $generator) {
        //     dd(345678);
        //     $route = request()->route();
        //     dd($route);
        //     $params = array_map(fn ($value) => encrypt($value), $route->parameters);
        //     $generator->route($route->uri, $params, true);
        // });
        // $encryptedParam = request()->query('key');
        // // dd($encryptedParam);
        // $decrypted = Crypt::decryptString($encryptedParam);
        // dd($decrypted);
    }
}