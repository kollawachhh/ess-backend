<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\GoodsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//admin
Route::get('/admin/all-users', [AdminController::class, 'all_users']);
Route::post('/admin/create-user', [AdminController::class, 'create_user']);
Route::get('/admin/user/{id}', [AdminController::class, 'get_user']);
Route::post('/admin/ban-user/{id}', [AdminController::class, 'ban_user']);
Route::post('/admin/update-firstname/{id}', [AdminController::class, 'update_firstname']);
Route::post('/admin/update-surname/{id}', [AdminController::class, 'update_surname']);
Route::post('/admin/update-role/{id}', [AdminController::class, 'update_role']);
Route::post('/admin/remove-user/{id}', [AdminController::class, 'remove_user']);


//goods
Route::get('/goods/all-goods', [GoodsController::class, 'all_goods']);
Route::get('/goods/all-stock-in', [GoodsController::class, 'all_stock_in']);
Route::get('/goods/all-stock-out', [GoodsController::class, 'all_stock_out']);
Route::post('/goods/update-remain-form-stock/{id}', [GoodsController::class, 'update_remain_form_stock']);
Route::post('/goods/create-goods', [GoodsController::class, 'create_goods']);
Route::post('/goods/create-stock', [GoodsController::class, 'create_stock']);
Route::post('/goods/update-name/{id}', [GoodsController::class, 'update_name']);
Route::post('/goods/update-type/{id}', [GoodsController::class, 'update_type']);
Route::post('/goods/update-storage/{id}', [GoodsController::class, 'update_storage']);
Route::post('/goods/update-price/{id}', [GoodsController::class, 'update_price']);
Route::post('/goods/update-remain/{id}', [GoodsController::class, 'update_remain']);
Route::post('/goods/update-code/{id}', [GoodsController::class, 'update_code']);
Route::post('/goods/update-amount/{id}', [GoodsController::class, 'update_amount']);
Route::post('/goods/update-total-price/{id}', [GoodsController::class, 'update_total_price']);
Route::post('/goods/remove-goods/{id}', [GoodsController::class, 'delete_goods']);
Route::post('/goods/remove-stock/{id}', [GoodsController::class, 'delete_stock']);


// JWT-Auth
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', [LoginController::class, 'login']);
    Route::post('logout', [LoginController::class, 'logout']);
});
Route::post('/update-login-time/{id}', [LoginController::class, 'update_login_time']);