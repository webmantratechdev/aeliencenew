<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Carbon;

class StackingController extends Controller
{
    //

    public function get_staking_currencies()
    {

        $staking_currencies = DB::table('staking_currencies')->paginate(10);

        return response()->json($staking_currencies);
    }

    public function get_single_staking_currencies($stackid)
    {
        $staking_currencies = DB::table('staking_currencies')->where('id', $stackid)->get()->first();

        return response()->json($staking_currencies);
    }

    public function update_stacking_status($stackid)
    {

        $staking_currencies = DB::table('staking_currencies')->where('id', $stackid)->get(['status'])->first();


        $status = ($staking_currencies->status == 1) ? 0 : 1;


        if (DB::table('staking_currencies')->where('id', $stackid)->update(['status' => $status])) {
            return response()->json(['status' => 1]);
        } else {
            return response()->json(['status' => 0]);
        }
    }


    public function add_staking_currencies(Request $request)
    {


        $array = [
            "title" => $request->get('title'),
            "symbol" => $request->get('symbol'),
            "network" => $request->get('network'),
            "period" => $request->get('period'),
            "profit" => $request->get('profit'),
            "amount" => $request->get('amount'),
            "min_stake" => $request->get('min_stake'),
            "max_stake" => $request->get('max_stake'),
            "staked" => $request->get('staked'),
            "apr" => $request->get('apr'),
            "profit_unit" => $request->get('profit_unit'),
            "daily_profit" => $request->get('daily_profit'),
            "status" => $request->get('status'),
            "method" => $request->get('method'),
            "price" => $request->get('price'),
            "icon" => $request->get('icon'),
        ];

        if (DB::table('staking_currencies')->insert($array)) {
            return response()->json(['status' => 1]);
        } else {
            return response()->json(['status' => 1]);
        }
    }


    public function update_staking_currencies(Request $request)
    {

        $array = [
            "title" => $request->get('title'),
            "symbol" => $request->get('symbol'),
            "network" => $request->get('network'),
            "period" => $request->get('period'),
            "profit" => $request->get('profit'),
            "amount" => $request->get('amount'),
            "min_stake" => $request->get('min_stake'),
            "max_stake" => $request->get('max_stake'),
            "staked" => $request->get('staked'),
            "apr" => $request->get('apr'),
            "profit_unit" => $request->get('profit_unit'),
            "daily_profit" => $request->get('daily_profit'),
            "status" => $request->get('status'),
            "method" => $request->get('method'),
            "price" => $request->get('price'),
            "icon" => $request->get('icon'),
        ];

        if (DB::table('staking_currencies')->where('id', $request->get('id'))->update($array)) {
            return response()->json(['status' => 1]);
        } else {
            return response()->json(['status' => 1]);
        }
    }


    public function getCoinRate($coinId)
    {
        if ($coinId != 'USDT') {
            try {
                $url = 'https://api.binance.com/api/v3/ticker/price?symbol=' . strtoUpper($coinId) . 'USDT';
                $crypto = file_get_contents($url);
                $usd = json_decode($crypto, true);
                $cryptoRate = $usd['price'];
            } catch (\Throwable $th) {
                $cryptoRate = '1';
            }
            return $cryptoRate;
        } else {
            $cryptoRate = '1';
            return $cryptoRate;
        }
    }



    public function createstackinglog(Request $request)
    {

        $stackCoin = DB::table('staking_currencies')->where('id', $request->get('coin_id'))->get()->first();


        $price = $this->getCoinRate($request->get('symbol'));

        $data = [
            'coin_id' => $request->coin_id,
            'user_id' => $request->get('userid'),
            'symbol' => $request->symbol,
            'cost' => $request->get('amount') * $price,
            'staked' => $request->get('amount'),
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addDays($stackCoin->period),
            'last_stake_date' => Carbon::now()->addDays(1),
            'status' => 1
        ];

        $insert = DB::table('staking_logs')->insert($data);

        if( $insert){

            $ledger_accounts = DB::table('ledger_accounts')->where(['user_id' => $request->get('userid'), 'currency' => $request->symbol])->get(['account_id'])->first();

            
            $datasdf = $this->transfertowallet($ledger_accounts->account_id, '63e7840d72c112999fa40b06', $request->get('amount'));

            print_r($datasdf);
            exit;
        }
    
    }


    public function transfertowallet($senderAccount, $recipientAccountId, $amount)
    {
        $curl = curl_init();

        $payload = array(
            "senderAccountId" => $senderAccount,
            "recipientAccountId" => $recipientAccountId,
            "amount" => $amount
        );

        curl_setopt_array($curl, [
            CURLOPT_HTTPHEADER => [
                "Content-Type: application/json",
                "x-api-key: faa062a1-7d7b-4021-8ea4-f8995c608eda"
            ],
            CURLOPT_POSTFIELDS => json_encode($payload),
            CURLOPT_URL => "https://api.tatum.io/v3/ledger/transaction",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "POST",
        ]);

        $response = curl_exec($curl);
        $error = curl_error($curl);

        curl_close($curl);

        if ($error) {
            echo "cURL Error #:" . $error;
        } else {
            echo $response;
        }
    }
}
