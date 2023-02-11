<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

// login & register
Route::middleware(['admin_auth'])->group(function () {
    Route::Redirect('/', 'loginPage');
    Route::get('loginPage', [AuthController::class, 'loginPage'])->name('auth#loginPage');
    Route::get('registerPage', [AuthController::class, 'registerPage'])->name('auth#registerPage');

});

Route::middleware(['auth'])->group(function () {

    Route::get('dashboard', [AuthController::class, 'dashboard'])->name('auth#dashboard');

    // admin
    Route::middleware(['admin_auth'])->group(function () {
        // category list
        Route::group(['prefix' => 'category'], function () {
            Route::get('list', [CategoryController::class, 'list'])->name('category#list');
            Route::get('createPage', [CategoryController::class, 'createPage'])->name('category#createPage');
            Route::post('create', [CategoryController::class, 'create'])->name('category#create');
            Route::get('delete/{id}', [CategoryController::class, 'delete'])->name('category#delete');
            Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('category#edit');
            Route::post('update', [CategoryController::class, 'update'])->name('category#update');
        });

        // admin
        Route::group(['prefix' => 'admin'], function () {
            // password
            Route::prefix('password')->group(function () {
                Route::get('change/page', [AdminController::class, 'passwordChangePage'])->name('admin#passwordChangePage');
                Route::get('change', [AdminController::class, 'passwordChange'])->name('admin#passwordChange');
            });

            //Profile
            Route::get('detail', [AdminController::class, 'details'])->name('admin#details');
            Route::get('edit', [AdminController::class, 'edit'])->name('admin#edit');
            Route::get('update', [AdminController::class, 'update'])->name('admin#update');
            Route::post('upload/{id}', [AdminController::class, 'upload'])->name('admin#upload');

            // Admin list
            Route::get('list/page', [AdminController::class, 'listPage'])->name('admin#listPage');
            Route::get('delete/{id}', [AdminController::class, 'delete'])->name('admin#delete');
            Route::get('remove/page/{id}', [AdminController::class, 'removePage'])->name('admin#removePage');
            Route::get('remove', [AdminController::class, 'remove'])->name('admin#remove');
        });


        // product
        Route::group(['prefix' => 'products'], function() {
            Route::get('list', [ProductController::class, 'list'])->name('product#list');
            Route::get('create/page', [ProductController::class, 'createPage'])->name('product#createPage');
            Route::post('create', [ProductController::class, 'create'])->name('product#create');
            Route::get('delete/{id}', [ProductController::class, 'delete'])->name('product#delete');
            Route::get('edit/page/{id}', [ProductController::class, 'editPage'])->name('product#editPage');
            Route::get('update', [ProductController::class, 'update'])->name('product#update');
            Route::post('upload/{id}', [ProductController::class, 'upload'])->name('product#upload');
        });

        // order
        Route::group(['prefix' => 'order'], function() {
            Route::get('list/page', [OrderController::class, 'listPage'])->name('order#listPage');
            Route::get('status/sorting', [OrderController::class, 'sortingStatus'])->name('order#sortingStatus');
            Route::get('ajax/change/status', [OrderController::class, 'ajaxChangeStatus'])->name('order#ajaxChangeStatus');
            Route::get('detail/{orderCode}', [OrderController::class, 'detail'])->name('order#detail');
        });

        // user
        Route::prefix('user')->group(function() {
            Route::get('list', [UserController::class, 'userList'])->name('admin#userList');
            Route::get('role/change', [UserController::class, 'userRoleChange'])->name('ajax#userRoleChange');
        });

        // customer message
        Route::get('customer/message', [UserController::class, 'userMessage'])->name('user#message');
        Route::get('customer/message/delete', [AjaxController::class, 'userMessageDelete'])->name('ajax#userMessageDelete');


    });

    // user
    Route::middleware(['user_auth'])->group(function () {
        Route::group(['prefix' => 'user'], function () {
            // home page
            Route::get('/homePage', [UserController::class, 'homePage'])->name('user#homePage');
            Route::get('filter/{id}', [UserController::class, 'filter'])->name('user#filter');
            Route::get('order/history', [UserController::class, 'orderHistory'])->name('user#orderHistory');

            // account
            Route::prefix('account')->group(function() {
                Route::get('detail/page', [UserController::class, 'detailPage'])->name('user#detailPage');
                Route::get('edit/page', [UserController::class, 'editPage'])->name('user#editPage');
                Route::get('update', [UserController::class, 'update'])->name('user#update');
                Route::post('upload/{id}', [UserController::class, 'upload'])->name('user#upload');
                Route::get('password/change/page', [UserController::class, 'changePasswordPage'])->name('user#changePasswordPage');
                Route::get('password/change', [UserController::class, 'passwordChange'])->name('user#passwordChange');
            });

            // pizza detail
            Route::prefix('pizza')->group(function() {
                Route::get('detail/page/{id}', [UserController::class, 'pizzaDetailPage'])->name('pizza#detailPage');
            });

            // cart
            Route::get('cart/page', [CartController::class, 'cartPage'])->name('user#cartPage');

            // contact
            Route::prefix('contact')->group(function() {
                Route::get('contact/page', [ContactController::class, 'contactPage'])->name('user#contactPage');
                Route::post('send/mail', [ContactController::class, 'sendMail'])->name('user#sendMail');
            });

            // ajax
            Route::prefix('ajax')->group(function() {
                Route::get('paginate', [AjaxController::class, 'paginate'])->name('ajax#paginate');
                Route::get('pizza/list', [AjaxController::class, 'pizzaList'])->name('ajax#pizzaList');
                Route::get('addToCart', [AjaxController::class, 'addToCart'])->name('ajax#addToCart');
                Route::get('order', [AjaxController::class, 'order'])->name('ajax#order');
                Route::get('remove/product', [AjaxController::class, 'removeProduct'])->name('ajax#removeProduct');
                Route::get('remove/all/product', [AjaxController::class, 'removeAllProduct'])->name('ajax#removeAllProduct');
                Route::get('increase/viewCount', [AjaxController::class, 'increaseViewCount'])->name('ajax#increaseViewCount');
            });
        });
    });

});
