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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('auth')->group(function () {
    Route::post('register', 'API\AuthController@register');
    Route::post('login', 'API\AuthController@authenticate');
});

Route::prefix('advertisement')->group(function () {
    Route::post('store', 'API\PropertyController@store');
    Route::post('{property}/upload-image', 'API\PropertyController@UploadAdvertImage');
    Route::post('{property}/payment', 'API\PropertyController@ProcessAdvertPayment');
});

Route::get('/properties', function() {
    $properties = App\Property::all();
    return response()->json($properties);
});