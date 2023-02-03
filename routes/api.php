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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/sendveryotp', 'App\Http\Controllers\Api\UserController@sendveryotp');
Route::post('/forgotpassword', 'App\Http\Controllers\Api\UserController@forgotpassword');


Route::post('/authcheck', 'App\Http\Controllers\Api\UserController@authcheck');
Route::post('/createaAccount', 'App\Http\Controllers\Api\UserController@createaAccount');
Route::post('/getProfile', 'App\Http\Controllers\Api\UserController@getProfile');
Route::post('/updatebasicinfo', 'App\Http\Controllers\Api\UserController@updatebasicinfo');
Route::post('/uploadDocument', 'App\Http\Controllers\Api\UserController@uploadDocument');
Route::post('/updatedocument', 'App\Http\Controllers\Api\UserController@updatedocument');
Route::post('/updateselfie', 'App\Http\Controllers\Api\UserController@updateselfie');
Route::get('/getAllUsers', 'App\Http\Controllers\Api\UserController@getAllUsers');
Route::post('/updateuserstatus', 'App\Http\Controllers\Api\UserController@updateuserstatus');
Route::post('/deleteuser', 'App\Http\Controllers\Api\UserController@deleteuser');
Route::post('/userchangepassowrd', 'App\Http\Controllers\Api\UserController@userchangepassowrd');


Route::get('/getAllcountry', 'App\Http\Controllers\Api\UserController@getAllcountry');
Route::get('/getallStatebycountry/{countrycode}', 'App\Http\Controllers\Api\UserController@getallStatebycountry');
Route::get('/getallCitybystate/{stateid}', 'App\Http\Controllers\Api\UserController@getallCitybystate');


Route::post('/updateprofilebyadmin', 'App\Http\Controllers\Api\UserController@updateprofilebyadmin');