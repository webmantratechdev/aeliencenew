<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class TokenBuyController extends Controller
{
    //

    public function getAccountbalance($address)
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

    public function getAllbuytoken()
    {

        $usgetAllbuytokeners =  DB::table('buy_token')->paginate(10);

        foreach ($usgetAllbuytokeners as $buy) {

            $balance = $this->getAccountbalance($buy->holder_address);

            $tokenbalance = 0;
            foreach ($balance->trc20 as $tokens) {
                $arrya = (array)$tokens;
                if (isset($arrya[$buy->token_contract])) {
                    $tokenbalance = $arrya[$buy->token_contract] / 1000000;
                }
            }
            $gascharge = $balance->balance / 1000000;
            DB::table('buy_token')->where('id', $buy->id)->update(['token_balance' => $tokenbalance, 'gas_charge' => $gascharge]);
        }

        return response()->json($usgetAllbuytokeners);
    }


    public function getsellingtoken()
    {
        $usgetAllbuytokeners =  DB::table('buy_token')->get();

        return response()->json($usgetAllbuytokeners);
    }


    public function getUsdtbalance($userid)
    {


        $wallet = DB::table('wallets')->where(['user_id' => $userid, 'symbol' => 'USDT', 'network' => 'TRON'])->get()->first();

        if ($wallet) {


            $balance = $this->getAccountbalance($wallet->address);


            $usgetAllbuytokeners =  DB::table('buy_token')->where(['symbol' => 'AEL', 'network' => 'TRON'])->get()->first();

            $tokenbalance = 0;
            if (isset($balance->trc20)) {
                foreach ($balance->trc20 as $tokens) {
                    $arrya = (array)$tokens;
                    if (isset($arrya[$usgetAllbuytokeners->usdt_contract])) {
                        $tokenbalance = $arrya[$usgetAllbuytokeners->usdt_contract] / 1000000;
                    }
                }
            }

            return response()->json(['balance' => $tokenbalance]);
        } else {
            return response()->json(['balance' => 0]);
        }
    }


    function sendTRXtoaTRONaccount($payload)
    {

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_HTTPHEADER => [
                "Content-Type: application/json",
                "x-api-key: " . tatumauth('key')
            ],
            CURLOPT_POSTFIELDS => json_encode($payload),
            CURLOPT_URL => tatumauth('url') . "tron/transaction",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "POST",
        ]);

        $response = curl_exec($curl);
        $error = curl_error($curl);

        curl_close($curl);

        $respon = json_decode($response);

        return $respon;
    }

    public function buytokensellingtoken(Request $request)
    {
        $wallet = DB::table('wallets')->where(['user_id' => $request->get('userid'), 'symbol' => 'USDT', 'network' => 'TRON'])->get()->first();

        $ledger_accounts = DB::table('ledger_accounts')->where(['wallet_id' => $wallet->id])->get()->first();

        $buy_token = DB::table('buy_token')->where(['symbol' => 'AEL', 'network' => 'TRON'])->get()->first();

        // send trx gas charge
        $balance = $this->getAccountbalance($wallet->address);

        $converprice = $balance->balance / 1000000;


        if ($converprice < 30) {

            $trxprivatek = generateBlockchainPrivateKey($buy_token->memonic, $ledger_accounts->network);

            $payload = array(
                "fromPrivateKey" => $trxprivatek->key,
                "to" => $wallet->address,
                "amount" => "30"
            );

            $this->sendTRXtoaTRONaccount($payload);
        }


        $balance1 = $this->getAccountbalance($wallet->address);

        $converprice1 = $balance1->balance / 1000000;

        if ($converprice1 > 30) {

            // send usdt
            $deductAmt = $request->get('usdtprice');

            $senderprivatekey = generateBlockchainPrivateKey($ledger_accounts->memonic, $ledger_accounts->network);

            $curl = curl_init();

            $payload = array(
                "fromPrivateKey" => $senderprivatekey->key,
                "to" => $buy_token->usdt_receiver_address,
                "tokenAddress" => "TR7NHqjeKQxGTCi8q8ZY4pL8otSzgjLj6t",
                "feeLimit" => 30,
                "amount" => "$deductAmt"
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

            if (isset(json_decode($response)->txId)) {

                $transaction = [
                    'userid' => $request->get('userid'),
                    'name' => 'Aelince Token',
                    'symbol' => 'Aelince',
                    'cost' => $request->get('aelprice'),
                    'amount' => $request->get('usdtprice'),
                    'token_txtid' => '',
                    'usdt_txtid' => json_decode($response)->txId,
                ];

                DB::table('buy_token_transaction')->insert($transaction);

                $customtoke = DB::table('custom_tokens')->where('symbol', 'Aelince')->get()->first();

                $wallet = DB::table('wallets')->where(['user_id' => $request->get('userid'), 'symbol' => 'Aelince', 'network' => 'BSC'])->get()->first();

                $purchaseAmt = $request->get('aelprice');

                $privatekey = generateBlockchainPrivateKey($customtoke->memonic, $customtoke->chain);

                $curl = curl_init();

                $payload = array(
                    "chain" => "BSC",
                    "to" => $wallet->address,
                    "contractAddress" => $customtoke->address,
                    "amount" => "$purchaseAmt",
                    "digits" => 18,
                    "fromPrivateKey" => $privatekey->key
                );

                curl_setopt_array($curl, [
                    CURLOPT_HTTPHEADER => [
                        "Content-Type: application/json",
                        "x-api-key: faa062a1-7d7b-4021-8ea4-f8995c608eda"
                    ],
                    CURLOPT_POSTFIELDS => json_encode($payload),
                    CURLOPT_URL => "https://api.tatum.io/v3/blockchain/token/transaction",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_CUSTOMREQUEST => "POST",
                ]);

                $response1 = curl_exec($curl);
                $error = curl_error($curl);

                curl_close($curl);

                $datasd = json_decode($response1);

                if (isset($datasd->txId)) {
                    $transactions = [
                        'token_txtid' => $datasd->txId,
                    ];
                    DB::table('buy_token_transaction')->where(['usdt_txtid' => json_decode($response)->txId])->update($transactions);
                    return response()->json(['code' => 200, 'message' => 'transaction Complete']);
                } else {
                    return response()->json(['code' => 401, 'message' => 'Something went wrong']);
                }
            } else {

                return response()->json(['code' => 401, 'message' => 'Something went wrong']);
            }
        } else {
            return response()->json(['code' => 401, 'message' => 'Something went wrong']);
        }
    }


    public function getAllbuytokenHistory() {


        $history = DB::table('buy_token_transaction')->orderBy('id', 'DESC')->paginate(10);
        return response()->json($history);

    }
}
