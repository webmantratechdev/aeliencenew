<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class WithdrawalController extends Controller
{
    //

    public function getBlockchainPrivateKey($mnemonic, $symbol)
    {

        $array = [
            'ETH' => 'ethereum',
            'TRON' => 'tron',
            'BSC' => 'bsc',
            'BTC' => 'bitcoin',
            'AEL' => 'tron',
        ];

        $curl = curl_init();

        $payload = array(
            "index" => 1,
            "mnemonic" => $mnemonic
        );

        curl_setopt_array($curl, [
            CURLOPT_HTTPHEADER => [
                "Content-Type: application/json",
                "x-api-key: faa062a1-7d7b-4021-8ea4-f8995c608eda"
            ],
            CURLOPT_POSTFIELDS => json_encode($payload),
            CURLOPT_URL => "https://api.tatum.io/v3/" . $array[$symbol] . "/wallet/priv",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "POST",
        ]);

        $response = curl_exec($curl);
        $error = curl_error($curl);

        curl_close($curl);

        return json_decode($response);
    }


    public function withdrawal(Request $request) {
        
        $ledger_accounts = DB::table('ledger_accounts')->where(['user_id' => $request->userid, 'currency' => $request->conin])->get(['account_id', 'wallet_id', 'memonic', 'xpub'])->first();
        $privateKey = $this->getBlockchainPrivateKey($ledger_accounts->memonic, $request->conin);

        print_r($privateKey);

        // 

        $custom_tokens = DB::table('custom_tokens')->where(['chain' => $request->networks, 'symbol' => $request->conin])->get(['address', 'master_wallet_address', 'master_wallet_balance'])->first();


        print_r($custom_tokens);


    }
}
