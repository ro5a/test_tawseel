<?php


use App\Http\Controllers\Admin\Auth\UsersController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


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



Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
], function () {

    Route::group(['middleware' => 'auth'], function () {

        // Admin Manage Users
        Route::controller(UsersController::class)->group(function () {
            Route::get('/users', 'get')->name('users');
            Route::post('/add_user', 'add')->name('add_user');
            Route::post('/update_user/{id}', 'update')->name('update_user');
            Route::get('/delete_user/{id}', 'delete')->name('delete_user');
        });


        // Admin Manage Categories
            Route::controller(CategoryController::class)->group(function () {
                Route::get('/categories', 'show')->name('categories');
                Route::post('/add_category', 'add')->name('add_category');
                Route::post('/update_category/{id}', 'update')->name('update_category');
                Route::get('/delete_category/{id}', 'delete')->name('delete_category');
            });


            // Admin Manage products
            Route::controller(ProductController::class)->group(function () {
                Route::get('/products/{id?}', 'show')->name('products');
                Route::post('/add_product', 'add')->name('add_product');
                Route::get('/products/table', 'getProducts');

                Route::post('/update_product/{id}', 'update')->name('update_product');
                Route::get('/delete_product/{id}', 'delete')->name('delete_product');
            });


        // Admin Manage Order
            Route::controller(OrderController::class)->group(function () {
                Route::get('/orders', 'get')->name('orders');
                Route::post('/add_order', 'add')->name('add_order');

            });
        });
    });



Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
