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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', 'AuthController@login')->name('login');
Route::post('/register', 'AuthController@register');

Route::middleware('auth:api')->post('/logout', 'AuthController@logout');

Route::middleware('auth:api')->group(function (){

    Route::middleware('can:User')->group(function (){
        Route::get('/userTest', function (Request $request) {
            return 'User';
        });
    });

    Route::middleware('can:Admin')->group(function (){
        Route::get('/adminTest', function (Request $request) {
            return 'Admin';
        });
    });

    Route::middleware('can:SuperAdmin')->group(function (){
        Route::get('/superadminTest', function (Request $request) {
            return 'Superadmin';
        });
    });

});