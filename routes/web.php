<?php

use App\Http\Controllers\UrlShortenerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(UrlShortenerController::class)->group(function() {
    Route::get('/','index')->name("urlShortener.index");
    Route::get('/{id}','show')->name("urlShortener.show");
    Route::post("/","store")->name("urlShortener.store");
    Route::post("/destroy","destroy")->name("urlShortener.destroy");
});
