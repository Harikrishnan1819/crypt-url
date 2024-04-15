<?php

namespace App\Providers;

use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Request;
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

        $queryString = request()->all();
        // dd($queryString['encdata']);
        // $encryptedValue = $encryptedValues[0];
        // $queryString = (request()->query());
        // dd($queryString);
        // $encryptedValue = Crypt::encrypt("hari");
        // dd($encryptedValue);
        $decryptedValue = Crypt::decrypt($queryString['encdata']);
        dd($decryptedValue);
        // $decryptedArray = json_decode($decryptedValue, true);
        // return $decryptedArray; 



        $this->app->resolving(UrlGenerator::class, function (UrlGenerator $generator) {
            // dd(345678);
            $route = request()->route();
            // dd($route);
            $params = array_map(fn ($value) => encrypt($value), $route->parameters);
            dd($params,$route);

            $generator->route($route->uri, $params, true);
        });

        // {
        //     // parent::boot();
        
        //     $this->app['router']->aliasMiddleware('encryptParams', \App\Http\Middleware\EncryptQueryParams::class);
        //     $this->app['router']->aliasMiddleware('decryptParams', \App\Http\Middleware\DecryptQueryParams::class);
        // }

       
        // $encryptedParam = request()->query('key');
        // // dd($encryptedParam);
        // $decrypted = Crypt::decryptString($encryptedParam);
        // dd($decrypted);
    }
}