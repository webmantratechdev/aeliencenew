<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

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
Route::post('/userauthgoogle', 'App\Http\Controllers\Api\UserController@userauthgoogle');
Route::post('/usergoogleotpverify', 'App\Http\Controllers\Api\UserController@usergoogleotpverify');


Route::get('/getAllcountry', 'App\Http\Controllers\Api\UserController@getAllcountry');
Route::get('/getallStatebycountry/{countrycode}', 'App\Http\Controllers\Api\UserController@getallStatebycountry');
Route::get('/getallCitybystate/{stateid}', 'App\Http\Controllers\Api\UserController@getallCitybystate');


Route::post('/updateprofilebyadmin', 'App\Http\Controllers\Api\UserController@updateprofilebyadmin');

// binance
Route::get('/getAllCoin', 'App\Http\Controllers\Api\BinanceController@getAllCoin');
Route::get('/getorderbook/{pair}', 'App\Http\Controllers\Api\BinanceController@getorderbook');


// tatum ->generateTronWallet->createVirtualAccount->createDepositaddress
Route::get('/getdepositeaddress/{coin}/{network}/{userid}', 'App\Http\Controllers\Api\TatumController@getdepositeaddress');
Route::get('/getWalletHistory/{userid}', 'App\Http\Controllers\Api\TatumController@getWalletHistory');
Route::get('/getrecentdepositHistory/{coin}/{userid}', 'App\Http\Controllers\Api\TatumController@getrecentdepositHistory');
Route::get('/getaccountidbycontin/{userid}/{symbold}', 'App\Http\Controllers\Api\TatumController@getaccountidbycontin');

// network controller

Route::get('/getAllnetwork', 'App\Http\Controllers\Api\NetworkController@getAllnetwork');

// token controller
Route::get('/getAllToken', 'App\Http\Controllers\Api\TokenController@getAllToken');
Route::get('/get_custom_tokens', 'App\Http\Controllers\Api\TokenController@get_custom_tokens');


// stacking controller
Route::get('/get_staking_currencies', 'App\Http\Controllers\Api\StackingController@get_staking_currencies');
Route::post('/add_staking_currencies', 'App\Http\Controllers\Api\StackingController@add_staking_currencies');
Route::get('/get_single_staking_currencies/{stackid}', 'App\Http\Controllers\Api\StackingController@get_single_staking_currencies');
Route::post('/update_staking_currencies', 'App\Http\Controllers\Api\StackingController@update_staking_currencies');
Route::get('/update_stacking_status/{stackid}', 'App\Http\Controllers\Api\StackingController@update_stacking_status');
Route::post('/createstackinglog', 'App\Http\Controllers\Api\StackingController@createstackinglog');
Route::get('/getStackingLog', 'App\Http\Controllers\Api\StackingController@getStackingLog');



// mail
// Route::get('/sendmail', function() {
    
//     $data = array('name'=>"Virat Gandhi", 'email' => 'dheeraj.webmantra@gmail.com');

//     Mail::send('emails.otp', $data, function($message) use ($data){

//         $message->to($data['email'], 'Aelince')->subject('Aelince Verification OTP');
//         $message->from('support@aelince.com','Aelince');

//     });

// });