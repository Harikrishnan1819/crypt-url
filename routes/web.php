<?php

use App\Http\Controllers\CryptController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\YourController;

// Route::get('/encrypt/{name}', [CryptController::class, 'encryptParams'])->name('encrypt.params');
// Route::get('/decrypt', [CryptController::class, 'decryptParams'])->name('decrypt.params');

// Route::get('/url/{parameter}', [CryptController::class,'methodName']);

Route::get('encrypt', [CryptController::class,'encrypt']);
Route::get('decrypt', [CryptController::class,'decrypt']);

