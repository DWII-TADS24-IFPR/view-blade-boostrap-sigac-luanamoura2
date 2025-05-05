<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NivelController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::resource('/nivels', NivelController::class);
