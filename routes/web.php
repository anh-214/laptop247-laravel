<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\AuthenticateController;
use App\Http\Controllers\Web\MainController;
use App\Http\Controllers\Web\CategoryController;
use App\Http\Controllers\Web\ProductController;
use App\Http\Controllers\Web\CartController;

use Illuminate\Support\Facades\Auth;

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
Route::group( ['prefix' => 'user'], function(){
    Route::group(['middleware' => 'authisuser'], function(){
        Route::get('/changepassword', [AuthenticateController::class, 'showChangePasswordForm']);
        Route::get('/information', [AuthenticateController::class, 'showInformation']);
        Route::post('/information', [AuthenticateController::class, 'updateInformation']);

        Route::post('/changepassword', [AuthenticateController::class, 'changePassword']);
        Route::get('/logout', [AuthenticateController::class, 'logout']);

    });
    Route::get('/login', [AuthenticateController::class, 'showLoginForm']);
    Route::post('/login', [AuthenticateController::class, 'login']);
    Route::get('/register', [AuthenticateController::class, 'showRegisterForm']);
    Route::post('/register', [AuthenticateController::class, 'register']);
    Route::get('/forgotpassword', [AuthenticateController::class, 'showForgotPasswordForm']);
    Route::post('/forgotpassword', [AuthenticateController::class, 'forgotPassword']);


});
Route::get('/home',[MainController::class,'home']);
Route::get('/',function(){
    return redirect('home');
});

Route::get('/checkout',[CartController::class,'checkout']);
Route::get('/contact',[MainController::class,'contact']);
Route::get('/policy-support',[MainController::class,'policy_support']);
Route::get('/aboutus',[MainController::class,'aboutUs']);

Route::get('/category/{id}',[CategoryController::class,'index']);
Route::get('/category/{category_id}/product/{product_id}',[ProductController::class,'index']);

// cart
Route::get('cart', [CartController::class, 'cart']);
Route::post('add-to-cart', [CartController::class, 'addToCart']);
Route::post('update-cart', [CartController::class, 'update']);
Route::post('remove-from-cart', [CartController::class, 'remove']);

Route::post('/getdistricts',[CartController::class,'getDistricts']);
Route::post('/getwards',[CartController::class,'getWards']);