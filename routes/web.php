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
    return redirect('/package/home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/package/home', function(){
    return view('aws/index')->with(['packages' => json_encode(\App\Package::all())]);
});
Route::get('/package/create', 'PackageController@create');
Route::get('/package/fetch', 'PackageController@receive');
Route::post('/package/update', 'PackageController@update');
Route::post('/package/delete', 'PackageController@delete');
