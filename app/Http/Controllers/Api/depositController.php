<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class depositController extends Controller
{
    //

    public function getAllDeposit()
    {

        $phone = @$_GET['keyword'];

        $wallet_history = '';

        if(!empty($phone)){
            $wallet_history =   DB::table('wallet_history')
            ->join('users', 'wallet_history.userid', '=', 'users.id')
            ->select('wallet_history.*', 'users.phone', 'users.name')
            ->where('currency', 'AEL')
            ->where('depositincurrencu', '!=', 'TRX')
            ->where('amount', '!=', '1.0E-6')
            ->where('phone', $phone)
            ->orderBy('id', 'DESC')->paginate(15);
        }else{
            $wallet_history =   DB::table('wallet_history')
            ->join('users', 'wallet_history.userid', '=', 'users.id')
            ->select('wallet_history.*', 'users.phone', 'users.name')
            ->where('currency', 'AEL')
            ->where('depositincurrencu', '!=', 'TRX')
            ->where('amount', '!=', '1.0E-6')
            ->orderBy('id', 'DESC')->paginate(15);
        }
       

        return response()->json($wallet_history);
    }
}
