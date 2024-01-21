<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\OrderController;

// home route
Route::controller(HomeController::class)->group(function () {
    Route::get("/", "index")->name("home.index");
    Route::match(["get", "post"], "/login", "login")->name("login");
    Route::match(["get", "post"], "/signup", "signup")->name("signup");
    Route::get("/logout", "logout")->name("logout");

    //google login Auth
    // Route::get('/google-login', 'redirectToGoogle')->name('login.google');
    // Route::get('/google-callback', 'handleGoogleCallback');

});

//order Section

Route::middleware("auth")->group(function(){

    Route::controller(OrderController::class)->group(function(){
        Route::get("/add-to-cart/{id}","addToCart")->name("addToCart");
        Route::get("/remove-from-cart/{id}","removeFromeCart")->name("removeFromeCart");
        Route::get("/cart","cart")->name("cart");
        Route::get("/my-order","myOrder")->name("myOrder");
        Route::match(["get","post"],"/checkout","checkout")->name("checkout");

        //paytm paymentgateway url
        Route::post('/payment/start', 'order')->name('pay.now');
        Route::post('/payment/status', 'paymentCallback')->name('status');

    });
});


// admin route  



Route::prefix('admin')->group(function () {



    Route::match(["get", "post"], "/admin/login", [AdminController::class, "login"])->name("adminlogin");
    Route::get("/admin/logout", [AdminController::class, "logout"])->name("adminlogout");

    Route::middleware('auth:admin')->group(function () {
        Route::get("/", [AdminController::class, "dashboard"])->name("admin.dashboard");


        Route::controller(CategoryController::class)->group(function () {
            Route::prefix('category')->group(function () {
                Route::match(["get", "post"], "/", "manageCategory")->name("admin.category");
                Route::post("/{id}/update", "updateCategory")->name("admin.category.update");
                Route::delete("/delete", "deleteCategory")->name("admin.category.delete");
            });
        });

        Route::controller(ProductController::class)->group(function () {
            Route::prefix("product")->group(function () {
                Route::get("/", "index")->name("admin.product.index");
                Route::get("/create", "insert")->name("admin.product.insert");
                Route::post("/create", "store")->name("admin.product.store");
                Route::get("/edit/{id}", "edit")->name("admin.product.edit");
                Route::post("/edit/{id}", "update")->name("admin.product.update");
                Route::post("/delete/{id}", "removeProduct")->name("admin.product.remove");
            });
        });

        Route::controller(OrderController::class)->group(function(){
            Route::prefix("cart")->group(function(){
                Route::get("/","manageCarts")->name("admin.cart.index");
            });
        });
    });
});
