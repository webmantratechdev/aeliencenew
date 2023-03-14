<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class WalletController extends Controller
{
    //

    public function getmasterwalletbalance($address, $network)
    {

        
        if ($network == 'BSC') {


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

    
        }elseif ($network == 'ETH') {

            $curl = curl_init();

            curl_setopt_array($curl, [
                CURLOPT_HTTPHEADER => [
                    "x-api-key: faa062a1-7d7b-4021-8ea4-f8995c608eda"
                ],
                CURLOPT_URL => "https://api.tatum.io/v3/ethereum/account/balance/" . $address,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_CUSTOMREQUEST => "GET",
            ]);

            $response = curl_exec($curl);
            $error = curl_error($curl);

            curl_close($curl);

            return json_decode($response);
        } else {

            $curl = curl_init();

            curl_setopt_array($curl, [
                CURLOPT_HTTPHEADER => [
                    "x-api-key: faa062a1-7d7b-4021-8ea4-f8995c608eda"
                ],
                CURLOPT_URL => "https://api.tatum.io/v3/tron/account/" . $address,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_CUSTOMREQUEST => "GET",
            ]);

            $response = curl_exec($curl);
            $error = curl_error($curl);

            curl_close($curl);

            return json_decode($response);
        }
    }

    public function getAllWallet()
    {

        $keyword = @$_GET['keyword'];

        $wallets = DB::table('wallets')->join('users', 'wallets.user_id', '=', 'users.id')
            ->select('wallets.*', 'users.phone', 'users.name', 'users.email')
            ->where('users.phone', 'like', '%' . $keyword . '%')
            ->orWhere('users.email', 'like', '%' . $keyword . '%')
            ->orWhere('wallets.address', 'like', '%' . $keyword . '%')
            ->orderBy('id', 'DESC')->paginate(10);

        foreach ($wallets as $wallet) {

            $balance = $this->getmasterwalletbalance($wallet->address, $wallet->network);

            if ($wallet->network == 'BSC') {
                $finalleBalance = $balance->balance / 1000000000000000000;
            }elseif ($wallet->network == 'TRON') {

                $customtoke = DB::table('custom_tokens')->where(['symbol'=> $wallet->symbol, 'chain' => $wallet->network])->get(['address'])->first();
                
                $finalleBalance = 0;
                if (isset($balance->trc20[0])) {
                    $erc20 = (array)$balance->trc20[0];
                    $finalleBalance = isset($erc20[$customtoke->address])?$erc20[$customtoke->address] / 100000000:0;
                }
                DB::table('wallets')->where('address', $wallet->address)->update(['balance' => $finalleBalance]);

            }

            
        }
        return response()->json($wallets);
    }

    public function getTotalWalletadddress()
    {
        $wallets = DB::table('wallets')->paginate(10);
        return response()->json($wallets);
    }

    public function pendingstacking()
    {
        $keyword = @$_GET['keyword'];
        
        $wallets = '';
        if(!empty($keyword)){
             $wallets = DB::table('wallets')
            ->join('users', 'wallets.user_id', '=', 'users.id')
            ->join('staking_currencies', 'wallets.symbol', '=', 'staking_currencies.symbol')
            ->select('wallets.*', 'staking_currencies.id', 'users.phone', 'users.name', 'users.email')
            ->where('balance', '>', '1')
            ->where('users.phone', 'like', '%' . $keyword . '%')
            ->orWhere('users.email', 'like', '%' . $keyword . '%')
            ->orWhere('wallets.address', 'like', '%' . $keyword . '%')
            ->paginate(10);
        }else{
             $wallets = DB::table('wallets')
            ->join('users', 'wallets.user_id', '=', 'users.id')
            ->join('staking_currencies', 'wallets.symbol', '=', 'staking_currencies.symbol')
            ->select('wallets.*', 'staking_currencies.id', 'users.phone', 'users.name', 'users.email')
            ->where('balance', '>', '1')
            ->paginate(10);
        }

        return response()->json($wallets);
    }


    public function updatewalletamountAfterstack($txtid)
    {

        $staking_logs = DB::table('staking_logs')->where('trxtid', $txtid)->get(['user_id', 'symbol', 'cost'])->first();

        $wallets = DB::table('wallets')->where(['user_id' => $staking_logs->user_id, 'symbol' => $staking_logs->symbol])->get()->first();


        $finalAmount = $wallets->balance - $staking_logs->cost;

        return DB::table('wallets')->where(['user_id' => $staking_logs->user_id, 'symbol' => $staking_logs->symbol])->update(['balance' => $finalAmount]);
    }
}
