<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthenticateController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\AccessoryController;
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
Route::group( ['prefix' => 'admin'], function(){
    Route::group(['middleware' => 'authisadmin'], function(){
        Route::get('/dashboard',[MainController::class,'dashboard']);
        Route::get('/categories',[MainController::class,'categories']);
        Route::post('/categories/delete',[CategoryController::class,'delete']);
        Route::post('/categories/create',[CategoryController::class,'create']);
        Route::post('/categories/update',[CategoryController::class,'update']);
        Route::get('/categories/{id}/createproduct',[ProductController::class,'showCreateProductFormFromCategory']);
        Route::post('/categories/{id}/createproduct',[ProductController::class,'create']);
        Route::get('/products',[ProductController::class,'products']);
        Route::get('/products/create',[ProductController::class,'showCreateProductForm']);
        Route::post('/products/create',[ProductController::class,'create']);
        Route::post('/products/delete',[ProductController::class,'delete']);
        Route::get('/products/{id}/update',[ProductController::class,'showUpdateForm']);
        Route::post('/products/update',[ProductController::class,'update']);
        Route::post('/products/getimages',[ProductController::class,'getImages']);








        Route::get('/extend/accessories',[AccessoryController::class,'showAccessories']);
        Route::post('/extend/accessories/create',[AccessoryController::class,'create']);
        Route::post('/extend/accessories/delete',[AccessoryController::class,'delete']);
        Route::post('/extend/accessories/update',[AccessoryController::class,'update']);


        Route::get('/information', [AuthenticateController::class, 'showInformation']);
        Route::post('/information', [AuthenticateController::class, 'updateInformation']);
        Route::get('/changepassword', [AuthenticateController::class, 'showChangePasswordForm']);
        Route::post('/changepassword', [AuthenticateController::class, 'changePassword']);
        Route::get('/logout', [AuthenticateController::class, 'logout']);
    });
    Route::get('/login', [AuthenticateController::class, 'showLoginForm'])->middleware('islogged');
    Route::post('/login', [AuthenticateController::class, 'login'])->middleware('islogged');
    Route::get('/forgotpassword', [AuthenticateController::class, 'showForgotPasswordForm']);
    Route::post('/forgotpassword', [AuthenticateController::class, 'forgotPassword']);
});
