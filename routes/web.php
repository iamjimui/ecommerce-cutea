<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PdfFormController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('intro');
});

Route::get('/panier', function () {
    return view('panier');
});


/*
Route::get('/login', [SessionController::class, 'show'])
    ->name('login.show');

// Route::post('/login', [SessionController::class, 'login']);

Route::get('/home', [HomeController::class, 'index'])
 *   ->name('home');


Route::post('/home', function () {
    return view('home');
});
*/

Route::get('/generatePdf', function () {
    return view('pdf/generatePdf');
});


Route::group(['namespace' => 'App\Http\Controllers'], function()
{   
    
    /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');

        Route::get('/home', [ProductController::class, 'products'])->name('home.index');
        Route::post('/home', 'ProductController@store')->name('product.store');

        route::get('/panier','OrderController@showcart')->name('cart.showcart');
        

    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        Route::get('/inscription', 'RegisterController@show')->name('register.show');
        Route::post('/inscription', 'RegisterController@register')->name('register.perform');


    });

    Route::group(['middleware' => ['auth']], function() {
               /**
     * Home Routes
     */
    

     Route::post('/panier', [OrderController::class, 'store']);
     
     Route::patch('/home/{product}', 'ProductController@update')->name('product.update');
     Route::delete('/home/{product}', 'ProductController@destroy')->name('product.destroy');

     Route::get('/profilsidebar', 'UserController@index')->name('users.index');
     Route::patch('/profilsidebar/{user}', 'UserController@update')->name('users.update');

     Route::get('/changemdp', 'UserController@changePasswordIndex')->name('users.updatePasswordIndex');
     Route::patch('/changemdp/{user}', 'UserController@updatePassword')->name('users.updatePassword');
     Route::get('/listuser', 'UserController@show')->name('users.show');

     Route::post('/generatePdf', [PdfFormController::class, 'postForm']);
        
        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
    });

    Route::get('/commandes', [OrderController::class, 'getAllOrdersAndDetails'])->name('commandes.detail');
    
});

