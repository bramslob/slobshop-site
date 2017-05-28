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
    return redirect()->route('lists_overview');
})->name('home');

Route::group(['prefix' => '/lists'], function () {
    Route::get('/', 'ListsController@overview')->name('lists_overview');

    Route::get('/create', 'ListsController@create')->name('lists_create');
    Route::post('/create', 'ListsController@store')->name('lists_store');

    Route::group(['prefix' => '/{list_id}'], function() {

        Route::get('/', 'ItemsController@overview')->name('items_overview');
        Route::get('/create', 'ItemsController@create')->name('items_create');
        Route::post('/create', 'ItemsController@store')->name('items_store');
        Route::get('/{item_id}', 'ItemsController@view')->name('items_view');
        Route::post('/{item_id}', 'ItemsController@update')->name('items_update');
    });
});
