<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //


    public function aelinceholderbalannace($address) {

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_HTTPHEADER => [
                "x-api-key: faa062a1-7d7b-4021-8ea4-f8995c608eda"
            ],
            CURLOPT_URL => "https://api.tatum.io/v3/blockchain/token/balance/BSC/0x5061075F6F1d6eE59cAbCaa96a1aa8DE3059d60f/" . $address,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "GET",
        ]);

        $response = curl_exec($curl);
        $error = curl_error($curl);

        curl_close($curl);

        return json_decode($response);
    }

    public function getdahsbordoverview()
    {

        $pending = DB::table('users')->where(['role' => 'U', 'status' => 'P'])->count();
        $missing = DB::table('users')->where(['role' => 'U', 'status' => 'M'])->count();
        $approve = DB::table('users')->where(['role' => 'U', 'status' => 'A'])->count();

        $aeltotalstacking = DB::table('staking_logs')->where('symbol', 'AEL')->count();
        $aelstackingAmount = DB::table('staking_logs')->where('symbol', 'AEL')->sum('cost');




        $aeltotaldeposit = DB::table('wallet_history')
        ->where('currency', 'AEL')
        ->where('depositincurrencu', 'AEL')
        ->where('operationType', 'DEPOSIT')
        ->where('amount', '!=', '1.0E-6')
        ->count();

        $aeltotaldepositAmount = DB::table('wallet_history')
        ->where('currency', 'AEL')
        ->where('depositincurrencu', 'AEL')
        ->where('operationType', 'DEPOSIT')
        ->where('amount', '!=', '1.0E-6')
        ->sum('amount');



        $aelincetotalstacking = DB::table('staking_logs')->where('symbol', 'Aelince')->count();
        $aelincestackingAmount = DB::table('staking_logs')->where('symbol', 'Aelince')->sum('cost');

        $aelincetotaldeposit = DB::table('wallet_history')
        ->where('currency', 'Aelince')
        ->where('depositincurrencu', 'Aelince')
        ->where('operationType', 'DEPOSIT')
        ->where('amount', '!=', '1.0E-6')
        ->count();

        $aelincetotaldepositAmount = DB::table('wallet_history')
        ->where('currency', 'Aelince')
        ->where('depositincurrencu', 'Aelince')
        ->where('operationType', 'DEPOSIT')
        ->where('amount', '!=', '1.0E-6')
        ->sum('amount');


        $cost =  DB::table('buy_token_transaction')->sum('cost');

        $usdtamount =  DB::table('buy_token_transaction')->sum('amount');


        $data = [
            'users' => [
                'alluser' => $pending+$missing+$approve,
                'pending' => $pending,
                'missing' => $missing,
                'approve' => $approve,
            ],
            'ael' => [
                'aeltotalstacking' => $aeltotalstacking,
                'aelstackingAmount' => $aelstackingAmount,
                'aeltotaldeposit' => $aeltotaldeposit,
                'aeltotaldepositAmount' => $aeltotaldepositAmount,
            ],

            'aelince' => [
                'aelincetotalstacking' => $aelincetotalstacking,
                'aelincestackingAmount' => $aelincestackingAmount,
                'aelincetotaldeposit' => $aelincetotaldeposit,
                'aelincetotaldepositAmount' => $aelincetotaldepositAmount,
            ],
            'selling' => [
                'aelincewithdrawalAmount' =>  $cost,
                'aelincedepositusdtAmount' =>  $usdtamount,
                'aelincedepositholdAmount' =>  $this->aelinceholderbalannace('0xdeb9581231e62c30b66d0497b2e719f7651dc703')->balance / 1000000000000000000 ,
            ]
            
            

        ];

        return response()->json($data);
    }
}
