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


    public function get_staking_currencies_front()
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



    public function createstackinglog(Request $request)
    {


        $stackCoin = DB::table('staking_currencies')->where('id', $request->get('coin_id'))->get()->first();

        $ledger_accounts = DB::table('ledger_accounts')->where(['user_id' => $request->userid, 'currency' => $stackCoin->symbol])->get(['account_id', 'wallet_id', 'memonic', 'xpub'])->first();

        $getwallet =  DB::table('wallets')->where(['id' => $ledger_accounts->wallet_id])->get()->first();

        $userprivatekey = $this->getBlockchainPrivateKey($ledger_accounts->memonic, $stackCoin->symbol);

        $transfer = $this->transfertowallet($getwallet->address, $request->deductAmt, $userprivatekey->key, $stackCoin->symbol);

        if (isset($transfer->txId)) {

            $data = [
                'coin_id' => $request->coin_id,
                'user_id' => $request->userid,
                'symbol' => $stackCoin->symbol,
                'cost' => $request->deductAmt,
                'staked' => $request->deductAmt * 2,
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addDays($stackCoin->period),
                'last_stake_date' => Carbon::now()->addDays(1),
                'stacketype' => 'prestacke',
                'trxtid' => $transfer->txId,
                'status' => 1
            ];

            $insert = DB::table('staking_logs')->insert($data);
        }

        return response()->json($transfer);
    }



    public function getwalletbalance($address)
    {

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



    public function transfertowallet($address, $amount, $fromPrivateKey, $symbol)
    {

        $customtoke = DB::table('custom_tokens')->where('symbol', $symbol)->get()->first();

        if ($customtoke) {

            $account = $this->getwalletbalance($address);

            $balance =  $account->balance / 1000000;

            $respon = (object)array();

            if ($balance < 10) {

                $privatekey = $this->getBlockchainPrivateKey($customtoke->memonic, $symbol);

                $curl = curl_init();

                $payload = array(
                    "to" => $address,
                    "amount" => "12",
                    "fromPrivateKey" => $privatekey->key,
                );

                curl_setopt_array($curl, [
                    CURLOPT_HTTPHEADER => [
                        "Content-Type: application/json",
                        "x-api-key: faa062a1-7d7b-4021-8ea4-f8995c608eda"
                    ],
                    CURLOPT_POSTFIELDS => json_encode($payload),
                    CURLOPT_URL => "https://api.tatum.io/v3/tron/transaction",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_CUSTOMREQUEST => "POST",
                ]);

                $response = curl_exec($curl);
                $error = curl_error($curl);

                curl_close($curl);

                $respon = json_decode($response);
            } else {
                $respon->txId = '234dsfsaf4sadfa345defasdf';
            }

            if (isset($respon->txId)) {

                $curl = curl_init();

                $payload = array(
                    "fromPrivateKey" => $fromPrivateKey,
                    "to" => $customtoke->receiving_wallet_address,
                    "tokenAddress" => $customtoke->address,
                    "feeLimit" => 12,
                    "amount" => $amount
                );


                curl_setopt_array($curl, [
                    CURLOPT_HTTPHEADER => [
                        "Content-Type: application/json",
                        "x-api-key: faa062a1-7d7b-4021-8ea4-f8995c608eda"
                    ],
                    CURLOPT_POSTFIELDS => json_encode($payload),
                    CURLOPT_URL => "https://api.tatum.io/v3/tron/trc20/transaction",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_CUSTOMREQUEST => "POST",
                ]);

                $response = curl_exec($curl);
                $error = curl_error($curl);

                curl_close($curl);

                return json_decode($response);
            }
        }
    }


    public function getStackingLog()
    {
        $staking_logs = DB::table('staking_logs')->join('users', 'staking_logs.user_id', '=', 'users.id')->select('staking_logs.*', 'users.phone', 'users.name')->orderBy('id', 'DESC')->paginate(10);

        foreach ($staking_logs as $log) {


            $log->withdrawal = DB::table('staking_transaction')->where('stackid', $log->id)->sum('release_amount');


            $start = $log->start_date;
            $date = Carbon::parse($start);
            $now = Carbon::now();
            $diff = $date->diffInDays($now);

            // total stacking day
            $enddate = Carbon::parse($log->end_date);
            $endday = $date->diffInDays($enddate);

            if ($diff < $endday) {

                $dailyprofit = ($log->staked / $endday) * $diff;

                DB::table('staking_logs')->where('id', $log->id)->update(['total_profit' => $dailyprofit]);

                if (date('d') == 01) {

                    $data = [
                        'stackid' => $log->id,
                        'userid' => $log->user_id,
                        'release_amount' => $dailyprofit,
                        'from_deposit' => '',
                        'to_deposit' => '',
                        'txtid' => '',
                        'status' => 0
                    ];

                    DB::table('staking_transaction')->insert($data);
                }
            }
        }

        return response()->json($staking_logs);
    }



    public function stakingtransaction($hid){

        $stakingtransaction = DB::table('staking_transaction')->where('stackid', $hid)->orderBy('id', 'DESC')->paginate(10);

        return response()->json($stakingtransaction);
    }


    public function getTotalStackAmount()
    {
        $staking_logs = DB::table('staking_logs')->sum('cost');
        return $staking_logs;
    }


    public function get_staking_log_front()
    {

        $staking_logs = DB::table('staking_logs')->where('user_id', @$_GET['userid'])->orderBy('id', 'DESC')->paginate(10);

        return response()->json($staking_logs);
    }
}
