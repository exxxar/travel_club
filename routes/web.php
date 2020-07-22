<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Jenssegers\Agent\Facades\Agent;
use sletatru\JsonGate;
use sletatru\XmlGate;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/test",function (){
    $response = Http::get('https://module.sletat.ru/Main.svc/GetCountries');

    dd($response->json()["GetCountriesResult"]["Data"]);
});

Route::get("/", function (){
    if (Agent::isMobile())
        return redirect()->route("mobile.index");
    return view('desktop');
})->name("mobile.desktop");

Route::prefix('m')->group(function () {
    Route::view("/", "mobile.pages.index")->name("mobile.index");
    Route::view("/restorans","mobile.pages.restorans")->name("mobile.restorans");
    Route::view("/tags-cloud", "mobile.pages.tags-cloud")->name("mobile.tags-cloud");
    Route::view("/profile", "mobile.pages.restorans")->name("mobile.profile");
    Route::view("/rules", "mobile.pages.rules")->name("mobile.rules");
    Route::view("/contacts", "mobile.pages.contacts")->name("mobile.contacts");
    Route::view("/about", "mobile.pages.about")->name("mobile.about");
    Route::view("/promotions", "mobile.pages.restorans")->name("mobile.promotions");
    Route::view("/cart", "mobile.pages.cart")->name("mobile.cart");
    Route::view("/status", "mobile.pages.status")->name("mobile.status");
    Route::view("/history", "mobile.pages.history")->name("mobile.history");
    Route::view("/phone-order", "mobile.pages.phone-order")->name("mobile.phone-order");
    Route::view("/product-order", "mobile.pages.product-order")->name("mobile.product-order");
    Route::view("/flowers-order", "mobile.pages.flowers-order")->name("mobile.flowers-order");
    Route::view("/calcs", "mobile.pages.calcs")->name("mobile.calcs");
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
