<?php

namespace App\Providers;

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
        // $encryptedParam = request()->query('key');
        // // dd($encryptedParam);
        // $decrypted = Crypt::decryptString($encryptedParam);
        // dd($decrypted);
    }
}