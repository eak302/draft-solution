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

Auth::routes();
Route::get('admin', function () {
    return view('backend/layouts/main');
});

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');


Route::resource('admin/customer', 'Customer\\CustomerController');
Route::resource('admin/technology', 'Technology\\TechnologyController');
Route::resource('admin/equipment', 'Equipment\\EquipmentController');
Route::resource('admin/service', 'Service\\ServiceController');
Route::resource('admin/draft', 'Draft\\DraftController');