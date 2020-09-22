<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::group([ 'prefix' => 'auth' ], function () {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});
Route::post('register', 'RegisterationController@store');
Route::resource('categories','CategoryController');
Route::middleware('auth:api')->get('auth/user', function (Request $request) {
    return $request->user();
});


Route::get('categories/transaction/{id}','CategoryController@getCategory');
Route::resource('accounts','AccountController');
Route::resource('transactions','TransactionController');
Route::get('transactions/type/{id}','TransactionController@transactionType');