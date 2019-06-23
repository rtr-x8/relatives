<?php

use Illuminate\Http\Request;

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

// passport/xxx
Route::group(['middleware' => ['json.response']], function () {
    Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
        //Auth::routes();
    });

    // public
    Route::post('/register', 'API\AuthController@register')
        ->name('register.api');
    Route::post('/login', 'API\AuthController@login')->name('login.api');

    // private
    Route::middleware('auth:api')->group(function () {
        Route::get('/logout', 'API\AuthController@logout')->name('logout');
    });
});

// v1/xxx
Route::group([
    'prefix' => 'v1',
    'middleware' => 'json.response'
], function () {
    // public
    Route::resource('assertions', 'API\AssertionController', [
        'only' => ['index', 'store', 'show', 'update', 'destroy']
    ]);
});
