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


Route::get('/usernostacking', 'App\Http\Controllers\Api\UserController@usernostacking');





Route::get('/getAllcountry', 'App\Http\Controllers\Api\UserController@getAllcountry');
Route::get('/getallStatebycountry/{countrycode}', 'App\Http\Controllers\Api\UserController@getallStatebycountry');
Route::get('/getallCitybystate/{stateid}', 'App\Http\Controllers\Api\UserController@getallCitybystate');


Route::post('/updateprofilebyadmin', 'App\Http\Controllers\Api\UserController@updateprofilebyadmin');

// binance
Route::get('/getAllCoin', 'App\Http\Controllers\Api\BinanceController@getAllCoin');
Route::get('/getorderbook/{pair}', 'App\Http\Controllers\Api\BinanceController@getorderbook');


// tatum ->generateTronWallet->createVirtualAccount->createDepositaddress
Route::get('/getdepositeaddress/{coin}/{network}/{userid}', 'App\Http\Controllers\Api\TatumController@getdepositeaddress');
Route::get('/getWalletHistory/{userid}/{operationType}', 'App\Http\Controllers\Api\TatumController@getWalletHistory');
Route::get('/getrecentdepositHistory/{coin}/{userid}', 'App\Http\Controllers\Api\TatumController@getrecentdepositHistory');
Route::get('/getaccountidbycontin/{userid}/{symbold}/{network}', 'App\Http\Controllers\Api\TatumController@getaccountidbycontin');

// network controller

Route::get('/getAllnetwork', 'App\Http\Controllers\Api\NetworkController@getAllnetwork');
Route::get('/getneworkbycoin/{coin}', 'App\Http\Controllers\Api\NetworkController@getneworkbycoin');

// token controller
Route::get('/getAllToken', 'App\Http\Controllers\Api\TokenController@getAllToken');
Route::get('/get_custom_tokens', 'App\Http\Controllers\Api\TokenController@get_custom_tokens');
Route::post('/addcustomtoken', 'App\Http\Controllers\Api\TokenController@addcustomtoken');
Route::get('/getAllTokenspot', 'App\Http\Controllers\Api\TokenController@getAllTokenspot');


// stacking controller
Route::get('/get_staking_currencies', 'App\Http\Controllers\Api\StackingController@get_staking_currencies');
Route::post('/add_staking_currencies', 'App\Http\Controllers\Api\StackingController@add_staking_currencies');
Route::get('/get_single_staking_currencies/{stackid}', 'App\Http\Controllers\Api\StackingController@get_single_staking_currencies');
Route::post('/update_staking_currencies', 'App\Http\Controllers\Api\StackingController@update_staking_currencies');
Route::get('/update_stacking_status/{stackid}', 'App\Http\Controllers\Api\StackingController@update_stacking_status');
Route::post('/createstackinglog', 'App\Http\Controllers\Api\StackingController@createstackinglog');
Route::get('/getStackingLog', 'App\Http\Controllers\Api\StackingController@getStackingLog');
Route::get('/getTotalStackAmount', 'App\Http\Controllers\Api\StackingController@getTotalStackAmount');
Route::get('/stakingtransaction/{hid}', 'App\Http\Controllers\Api\StackingController@stakingtransaction');


Route::get('/get_staking_currencies_front', 'App\Http\Controllers\Api\StackingController@get_staking_currencies_front');
Route::get('/get_staking_log_front', 'App\Http\Controllers\Api\StackingController@get_staking_log_front');

// support

Route::get('/getAllTicket', 'App\Http\Controllers\Api\SupportController@getAllsupport');
Route::post('/deleteticket', 'App\Http\Controllers\Api\SupportController@deleteticket');
Route::get('/getsingleticket/{ticketid}', 'App\Http\Controllers\Api\SupportController@getsingleticket');
Route::post('/replyticket', 'App\Http\Controllers\Api\SupportController@replyticket');
Route::post('/addticket', 'App\Http\Controllers\Api\SupportController@addticket');


// withdrawal

Route::post('/withdrawalendotp', 'App\Http\Controllers\Api\WithdrawalController@withdrawalendotp');
Route::post('/withdrawal', 'App\Http\Controllers\Api\WithdrawalController@withdrawal');


// getAllDeposit
Route::get('/getAllDeposit', 'App\Http\Controllers\Api\depositController@getAllDeposit');
Route::get('/getTotalDepositAmount', 'App\Http\Controllers\Api\depositController@getTotalDepositAmount');
Route::get('/stackingHistory', 'App\Http\Controllers\Api\depositController@stackingHistory');


// MLM Controller
Route::get('/getMLMLevel', 'App\Http\Controllers\Api\MLMController@getMLMLevel');
Route::get('/getaccountreferral/{userid}', 'App\Http\Controllers\Api\MLMController@getaccountreferral');

// wallet
Route::get('/getAllWallet', 'App\Http\Controllers\Api\WalletController@getAllWallet');
Route::get('/pendingstacking', 'App\Http\Controllers\Api\WalletController@pendingstacking');
Route::get('/updatewalletamountAfterstack/{txtid}', 'App\Http\Controllers\Api\WalletController@updatewalletamountAfterstack');
Route::get('/getTotalWalletadddress', 'App\Http\Controllers\Api\WalletController@getTotalWalletadddress');
