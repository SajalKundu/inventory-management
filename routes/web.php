<?php

use App\Http\Controllers\Admin\Report\CreditReportController;
use App\Http\Controllers\Admin\Report\DebitReportController;
use App\Http\Controllers\Admin\Report\SaleReportController;
use App\Http\Controllers\AdminSliderController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\CreditorsController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DebtorsController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\UserAdminController;
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

Route::get('/', [FrontendController::class, 'index'])->name('home');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('sub-category-list', [ProductController::class, 'getSubCategoryList'])->name('sub-category-list');


Route::group([
    'middleware' => 'auth',
    'prefix' => 'admin',
], function(){
    Route::controller(AdminSliderController::class)->prefix('slider')->name('a_slider.')->group(function () {

        Route::get('/', 'index')->name('index');
        Route::any('/add', 'Add')->name('Add');
        Route::post('store', 'store')->name('store');
        Route::any('/edit/{id}', 'edit')->name('edit');
        Route::post('update/{id}', 'update')->name('update');
        Route::get('/delete/{id}', 'destroy')->name('destroy');
        Route::get('/status/{id}/{value}/{status}', 'sliderStatus')->name('Status');

    });

    Route::controller(GalleryController::class)->prefix('gallery')->name('a_gallery.')->group(function () {

        Route::get('/', 'index')->name('index');
        Route::any('/add', 'Add')->name('Add');
        Route::post('store', 'store')->name('store');
        Route::any('/edit/{id}', 'edit')->name('edit');
        Route::post('update/{id}', 'update')->name('update');
        Route::get('/delete/{id}', 'destroy')->name('destroy');
        Route::get('/status/{id}/{value}/{status}', 'sliderStatus')->name('Status');

    });

    Route::controller(UserAdminController::class)->prefix('user')->group(function () {

        Route::get('/', 'userlist')->name('a_userlist');
        Route::any('/add', 'userAdd')->name('a_userAdd');
        Route::any('store/{id}', 'userEdit')->name('a_userEdit');
        Route::get('/delete/{id}', 'userDelete')->name('a_userDelete');
        Route::get('/status/{id}/{value}', 'userStatus')->name('a_userStatus');
        Route::any('password', 'userPassword')->name('a_userPassword');


    });

    Route::controller(CreditorsController::class)->prefix('creditors')->name('creditors.')->group(function () {

        Route::get('/', 'index')->name('index');
        Route::get('/add', 'Add')->name('Add');
        Route::post('store', 'store')->name('store');
        Route::get('/show/{id}', 'show')->name('show');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('update/{id}', 'update')->name('update');
        Route::get('/delete/{id}', 'destroy')->name('destroy');
        Route::get('/status/{id}/{value}/{status}', 'sliderStatus')->name('Status');

    });

    Route::prefix('contacts')->name('contacts.')->group(function(){

        Route::controller(ContactUsController::class)->prefix('contact-us')->name('contact-us.')->group(function(){

            Route::get('/', 'index')->name('index');
            Route::post('update/{id}', 'update')->name('update');

        });

        Route::controller(ContactUsController::class)->prefix('company-details')->name('company-details.')->group(function(){

            Route::get('/', 'companyIndex')->name('index');
            Route::post('update/{id}', 'companyUpdate')->name('update');

        });


    });

    Route::controller(DebtorsController::class)->prefix('debtors')->name('debtors.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/add', 'Add')->name('Add');
        Route::post('store', 'store')->name('store');
        Route::get('/show/{id}', 'show')->name('show');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('update/{id}', 'update')->name('update');
        Route::get('/delete/{id}', 'destroy')->name('destroy');

    });
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

    Route::controller(ProductController::class)->prefix('product')->name('admin.product.')->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('update/{id}', 'update')->name('update');
        Route::get('delete/{id}', 'destroy')->name('destroy');
        Route::get('change-status/{id}/{status}', 'changeStatus')->name('change-status');

        Route::post('add-stock', 'addStock')->name('add-stock');
        Route::post('sub-stock', 'subStock')->name('sub-stock');
        Route::get('view-stock/{id}', 'viewStock')->name('view-stock');
        Route::post('stock-report-download', 'stockReportDownload')->name('stock-report-download');
    });

    Route::controller(SaleController::class)->prefix('sale')->name('admin.sale.')->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('update/{id}', 'update')->name('update');
        Route::get('delete/{id}', 'destroy')->name('destroy');
        Route::get('change-status/{id}/{status}', 'changeStatus')->name('change-status');

        Route::get('show/{id}', 'show')->name('show');
        Route::get('print/{id}', 'print')->name('print');

        Route::post('customer-detail', [SaleController::class, 'customerDetail'])->name('customer-detail');
        Route::post('get-product-detail', [SaleController::class, 'productDetail'])->name('get-product-detail');
    });

    Route::prefix('report')->group(function(){
        Route::controller(SaleReportController::class)->prefix('sale')->name('admin.report.sale.')->group(function(){
            Route::get('/', 'index')->name('index');
            Route::post('sale-report-show', 'saleReportDataShow')->name('sale-report-show');
            Route::get('sale-report-download/{start_date}/{end_date}', 'saleReportDataDownload')->name('sale-report-download');
        });
        Route::controller(CreditReportController::class)->prefix('creditor')->name('admin.report.creditor.')->group(function(){
            Route::get('/', 'index')->name('index');
            Route::post('credit-report-show', 'creditReportDataShow')->name('creditor-report-show');
            Route::get('credit-report-download/{start_date}/{end_date}', 'creditReportDataDownload')->name('creditor-report-download');
        });
        Route::controller(DebitReportController::class)->prefix('debtor')->name('admin.report.debtor.')->group(function(){
            Route::get('/', 'index')->name('index');
            Route::post('debit-report-show', 'debitReportDataShow')->name('debtor-report-show');
            Route::get('debit-report-download/{start_date}/{end_date}', 'debitReportDataDownload')->name('debtor-report-download');
        });
    });
});
