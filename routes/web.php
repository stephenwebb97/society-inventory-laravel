<?php

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


Route::get('/', function () {
    return view('welcome');
});

Route::prefix('wapi')->middleware("auth:web")->group(function (){
    require __DIR__.'/wapi.php';
});

Route::middleware("auth:web")->group(function (){
    Route::resources([
        'boardgames' => 'BoardGamesController'
    ]);
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
