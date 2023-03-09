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

        $keyword = @$_GET['keyword'];

        $wallet_history =   DB::table('wallet_history')
            ->join('users', 'wallet_history.userid', '=', 'users.id')
            ->select('wallet_history.*', 'users.phone', 'users.name')
            ->where('currency', 'AEL')
            ->where('depositincurrencu', '!=', 'TRX')
            ->where('amount', '!=', '1.0E-6')
            ->where('wallet_history.owner_address', 'like', '%'.$keyword.'%')
            ->orWhere('wallet_history.to_address', 'like', '%'.$keyword.'%')
            ->orWhere('users.phone', 'like', '%'.$keyword.'%')
            ->orWhere('users.name', 'like', '%'.$keyword.'%')
            ->orderBy('id', 'DESC')->paginate(10);



        return response()->json($wallet_history);
    }

    public function getTotalDepositAmount()
    {
        return DB::table('wallet_history')
            ->where('currency', 'AEL')
            ->where('depositincurrencu', 'AEL')
            ->where('operationType', 'DEPOSIT')
            ->where('amount', '!=', '1.0E-6')->sum('amount');
    }


    public function stackingHistory()
    {
        $wallets = DB::table('wallets')->paginate(10);

        foreach ($wallets as $wallet) {

            $curl = curl_init();

            curl_setopt_array($curl, [
                CURLOPT_HTTPHEADER => [
                    "x-api-key: faa062a1-7d7b-4021-8ea4-f8995c608eda"
                ],
                CURLOPT_URL => "https://api.tatum.io/v3/tron/transaction/account/" . $wallet->address . "/trc20",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_CUSTOMREQUEST => "GET",
            ]);

            $response = curl_exec($curl);
            $error = curl_error($curl);

            curl_close($curl);

            if (isset(json_decode($response)->transactions)) {
                foreach (json_decode($response)->transactions as $walldf) {
                    if (isset($walldf->txID)) {
                        $exist = DB::table('wallet_history')->where('txId', $walldf->txID)->get(['txId'])->first();
                        if (!is_object($exist)) {

                            $optype = ($walldf->to == $wallet->address) ? 'DEPOSIT' : 'WITHDRAWAL';

                            $data = [
                                'userid' => $wallet->user_id,
                                'amount' => $walldf->value / 100000000,
                                'operationType' => $optype,
                                'currency' => $walldf->tokenInfo->symbol,
                                'network' => $wallet->network,
                                'txId' => $walldf->txID,
                                'owner_address' => $walldf->from,
                                'to_address' => $walldf->to,
                                'depositincurrencu' => $walldf->tokenInfo->symbol,
                                'created_at' => date('Y-m-d H:i:s'),
                                'updated_at' => date('Y-m-d H:i:s'),
                            ];

                            DB::table('wallet_history')->insert($data);
                        }
                    }
                }
            }
        }
    }
}
