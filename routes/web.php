<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SubCategoryController;
use Illuminate\Support\Facades\Route;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group([
    'middleware' => 'auth',
    'prefix' => 'admin',
], function(){
    Route::controller(CustomerController::class)->prefix('customer')->name('admin.customer.')->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('update/{id}', 'update')->name('update');
        Route::get('delete/{id}', 'destroy')->name('destroy');
        Route::get('change-status/{id}/{status}', 'changeStatus')->name('change-status');
    });

    Route::controller(CategoryController::class)->prefix('category')->name('admin.category.')->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('update/{id}', 'update')->name('update');
        Route::get('delete/{id}', 'destroy')->name('destroy');
        Route::get('change-status/{id}/{status}', 'changeStatus')->name('change-status');
    });

    Route::controller(SubCategoryController::class)->prefix('sub-category')->name('admin.sub-category.')->group(function(){
        Route::get('/{id}', 'index')->name('index');
        Route::get('create/{id}', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('update/{id}', 'update')->name('update');
        Route::get('delete/{id}', 'destroy')->name('destroy');
        Route::get('change-status/{id}/{status}', 'changeStatus')->name('change-status');
    });
});
