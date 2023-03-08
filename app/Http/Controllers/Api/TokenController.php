<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\DB;

class TokenController extends Controller
{
    //


    public function getmasterwalletbalance($address, $network)
    {


        if ($network == 'ETH') {

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

    public function getAllToken()
    {

        $token = DB::table('mainnet_tokens')->orderBy('id', 'DESC')->get();

        return response()->json($token);
    }


    public function getwalletbalanceblockchain($network, $address)
    {

        $array = [
            'ETH' => 'ethereum',
            'TRON' => 'tron',
            'BSC' => 'bsc',
            'BTC' => 'bitcoin',
            'AEL' => 'tron'
        ];

        if (isset($array[$network])) {

            $curl = curl_init();

            curl_setopt_array($curl, [
                CURLOPT_HTTPHEADER => [
                    "x-api-key: faa062a1-7d7b-4021-8ea4-f8995c608eda"
                ],
                CURLOPT_URL => "https://api.tatum.io/v3/" . $array[$network] . "/account/" . $address,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_CUSTOMREQUEST => "GET",
            ]);

            $response = curl_exec($curl);
            $error = curl_error($curl);

            curl_close($curl);

            return json_decode($response);
        }
    }


    public function getAllTokenspot()
    {

        $tokens = DB::table('mainnet_tokens')->orderBy('id', 'DESC')->get(['symbol', 'chain']);

        $data = [];


        foreach ($tokens as $token) {

            $exitWallet = DB::table('wallets')->where(['user_id' => @$_GET['userid'], 'symbol' => $token->symbol])->get(['symbol', 'address'])->first();


            if (is_object($exitWallet)) {

                $balance = $this->getwalletbalanceblockchain($token->chain, $exitWallet->address);

                if ($exitWallet->symbol == 'AEL') {

                    $conarray = isset($balance->trc20[0]) ? $balance->trc20[0] : '';

                    $object = (array)$conarray;

                    $data[] = [
                        'symbol' => $token->symbol,
                        'all' => isset($object['TM4q3gujYR7JUaFrZpM8x1P7NbQd6hwJts']) ? $object['TM4q3gujYR7JUaFrZpM8x1P7NbQd6hwJts'] / 100000000 : 0,
                        'available' => isset($object['TM4q3gujYR7JUaFrZpM8x1P7NbQd6hwJts']) ? $object['TM4q3gujYR7JUaFrZpM8x1P7NbQd6hwJts'] / 100000000 : 0,
                        'inorder' => 0,
                        'btn_equity_value' => 0,
                    ];
                } else {
                    $data[] = [
                        'symbol' => $token->symbol,
                        'all' => isset($balance->balance) ? $balance->balance  / 100000000 : 0,
                        'available' => isset($balance->balance) ? $balance->balance  / 100000000 : 0,
                        'inorder' => 0,
                        'btn_equity_value' => 0,
                    ];
                }
            } else {
                $data[] = [
                    'symbol' => $token->symbol,
                    'all' => 0,
                    'available' => 0,
                    'inorder' => 0,
                    'btn_equity_value' => 0,
                ];
            }
        }

        return response()->json($data);
    }


    public function get_custom_tokens()
    {

        $custom_tokens = DB::table('custom_tokens')->get(['id', 'master_wallet_address', 'chain']);

        foreach ($custom_tokens as $token) {

            $return = $this->getmasterwalletbalance($token->master_wallet_address, $token->chain);


            if (isset($return->balance)) {

                $balance = $return->balance / 1000000;

                DB::table('custom_tokens')->where('id', $token->id)->update(['master_wallet_balance' => $balance]);
            }
        }

        $customtokens = DB::table('custom_tokens')->paginate(10);

        return response()->json($customtokens);
    }
}
