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

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return redirect('admin');
    });

    Route::get('admin', function () {
        return view('backend/layouts/main');
    })->name('admin');

    Route::get('/admin/ajax-customer', 'Customer\\CustomerController@dataAjaxCustomer')->name('ajax-customer');
    Route::resource('admin/customer', 'Customer\\CustomerController', ['as' => 'customer']);

    Route::resource('admin/technology', 'Technology\\TechnologyController', ['as' => 'technology']);
    Route::resource('admin/equipment', 'Equipment\\EquipmentController', ['as' => 'equipment']);
    Route::resource('admin/service', 'Service\\ServiceController', ['as' => 'service']);
    Route::resource('admin/draft', 'Draft\\DraftController', ['as' => 'draft']);

    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
});