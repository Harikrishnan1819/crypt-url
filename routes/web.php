<?php

use App\Http\Controllers\CryptController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/index', [CryptController::class,'index']);


