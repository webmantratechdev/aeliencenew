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
        } elseif ($network == 'BSC') {

            $curl = curl_init();

            curl_setopt_array($curl, [
                CURLOPT_HTTPHEADER => [
                    "x-api-key: faa062a1-7d7b-4021-8ea4-f8995c608eda"
                ],
                CURLOPT_URL => "https://api.tatum.io/v3/bsc/account/balance/" . $address,
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

            exit;
        }

        $array = [
            'ETH' => 'ethereum',
            'TRON' => 'tron',
            'BSC' => 'bsc',
            'BTC' => 'bitcoin',
            'AEL' => 'tron',
            'Aelince' => 'tron'
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

        $tokens = DB::table('mainnet_tokens')
            ->leftJoin('staking_currencies', 'mainnet_tokens.symbol', 'staking_currencies.symbol')
            ->select('mainnet_tokens.*', 'staking_currencies.status')
            ->where('mainnet_tokens.status', 1)
            ->orderBy('id', 'DESC')
            ->get(['symbol', 'chain']);

        $data = [];


        foreach ($tokens as $token) {

            $exitWallet = DB::table('wallets')->where(['user_id' => @$_GET['userid'], 'symbol' => $token->symbol])->get(['symbol', 'address'])->first();


            if (is_object($exitWallet)) {

                $balance = $this->getwalletbalanceblockchain($token->chain, $exitWallet->address);

                if ($exitWallet->symbol == 'AEL') {

                    $conarray = isset($balance->trc20[0]) ? $balance->trc20[0] : '';

                    $object = (array)$conarray;

                    $customtoke = DB::table('custom_tokens')->where('symbol', $exitWallet->symbol)->get(['address'])->first();


                    $data[] = [
                        'symbol' => $token->symbol,
                        'all' => isset($object[$customtoke->address]) ? $object[$customtoke->address] / 100000000 : 0,
                        'available' => isset($object[$customtoke->address]) ? $object[$customtoke->address] / 100000000 : 0,
                        'inorder' => 0,
                        'btn_equity_value' => 0,
                        'status' => $token->status,
                    ];
                } elseif ($exitWallet->symbol == 'USDT') {

                    $conarray = isset($balance->trc20[0]) ? $balance->trc20[0] : '';
                    $object = (array)$conarray;

                    $data[] = [
                        'symbol' => $token->symbol,
                        'all' => isset($object['TR7NHqjeKQxGTCi8q8ZY4pL8otSzgjLj6t']) ? $object['TR7NHqjeKQxGTCi8q8ZY4pL8otSzgjLj6t'] / 1000000 : 0,
                        'available' => isset($object['TR7NHqjeKQxGTCi8q8ZY4pL8otSzgjLj6t']) ? $object['TR7NHqjeKQxGTCi8q8ZY4pL8otSzgjLj6t'] / 1000000 : 0,
                        'inorder' => 0,
                        'btn_equity_value' => 0,
                        'status' => $token->status,
                    ];
                } else {

                    if ($token->chain == 'BSC') {
                        $data[] = [
                            'symbol' => $token->symbol,
                            'all' => isset($balance->balance) ? $balance->balance  / 1000000000000000000 : 0,
                            'available' => isset($balance->balance) ? $balance->balance  / 1000000000000000000 : 0,
                            'inorder' => 0,
                            'btn_equity_value' => 0,
                            'status' => $token->status,
                        ];
                    } else {
                        $data[] = [
                            'symbol' => $token->symbol,
                            'all' => isset($balance->balance) ? $balance->balance  / 100000000 : 0,
                            'available' => isset($balance->balance) ? $balance->balance  / 100000000 : 0,
                            'inorder' => 0,
                            'btn_equity_value' => 0,
                            'status' => $token->status,
                        ];
                    }
                }
            } else {
                $data[] = [
                    'symbol' => $token->symbol,
                    'all' => 0,
                    'available' => 0,
                    'inorder' => 0,
                    'btn_equity_value' => 0,
                    'status' => $token->status,
                ];
            }
        }

        return response()->json($data);
    }



    public function addcustomtoken(Request $request)
    {

        // $exist = DB::table('custom_tokens')
        //     ->where(['chain' => $request->get('chain'), 'symbol' => $request->get('symbol')])
        //     ->get(['chain', 'symbol', 'name'])->first();

        // if ($exist) {
        //     return response()->json(['status' => 401, 'message' => 'Token already registered']);
        //     exit;
        // }

        $data = [
            'chain' => $request->get('chain'),
            'symbol' => $request->get('symbol'),
            'name' => $request->get('name'),
            'account_id' => $request->get('account_id'),
            'address' => $request->get('address'),
            'holder_address' => $request->get('holder_address'),
            'cap' => $request->get('cap'),
            'supply' => $request->get('supply'),
            'hash' => $request->get('hash'),
            'decimals' => $request->get('decimals'),
            'testnet' => $request->get('testnet'),
            'base_pair' => $request->get('base_pair'),
            'type' => $request->get('type'),
            'status' => $request->get('status'),
            'actions' => $request->get('actions'),
            'withdraw_fee' => $request->get('withdraw_fee'),
            'withdraw_min' => $request->get('withdraw_min'),
            'withdraw_max' => $request->get('withdraw_max'),
            'has_memo' => $request->get('has_memo'),
            'balance' => $request->get('balance'),
            'receiving_wallet_address' => $request->get('receiving_wallet_address'),
            'memonic' => $request->get('memonic'),
            'xpub' => $request->get('xpub'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $insert =  DB::table('custom_tokens')->insert($data);
        if ($insert) {

            $wallet = generateBlockchainWallet($request->get('chain'));

            $walletaddress = generateBlockchainAddress($wallet->xpub,  $request->get('chain'));

            if ($request->get('chain') == 'TRON') {

                $payload = array(
                    "symbol" => $data['symbol'],
                    "supply" => $data['supply'],
                    "decimals" => $data['decimals'],
                    "type" => $data['type'],
                    "description" => $data['name'],
                    "address" => $request->get('address'),
                    "basePair" => "USDT"
                );

                $apijson = tron_token_register_api($payload);

                $updatedata = [
                    'account_id' =>  isset($apijson->accountId)?$apijson->accountId:'',
                    'holder_address' =>  $walletaddress->address,
                    'memonic' =>  $wallet->mnemonic,
                    'xpub' =>  $wallet->xpub,
                ];

                DB::table('custom_tokens')->where(['chain' => $request->get('chain'), 'symbol' => $request->get('symbol')])->update($updatedata);
            }
            return response()->json(['status' => 200, 'message' => 'Token has been registered']);
        }
    }

    public function diploycustomtokenNetowrk($tokenid)
    {

        $custom_tokens = DB::table('custom_tokens')->where('id', $tokenid)->get()->first();

        $action = ($custom_tokens->actions == 1) ? 0 : 1;

        DB::table('custom_tokens')->where('id', $tokenid)->update(['actions' => $action]);


        $mainnet_tokenExit = DB::table('mainnet_tokens')
        ->where(['symbol' => $custom_tokens->symbol, 'chain' => $custom_tokens->chain, 'network' => $custom_tokens->type])
        ->get()->first();

        if(!$mainnet_tokenExit){
            $addmainToken = [
                'symbol' => $custom_tokens->symbol,
                'postfix' => '_'.$custom_tokens->chain,
                'name' => $custom_tokens->name,
                'chain' => $custom_tokens->chain,
                'network' => $custom_tokens->type,
                'status' => 1,
                'withdraw_fee' => $custom_tokens->withdraw_fee,
                'withdraw_max' => $custom_tokens->withdraw_max,
                'withdraw_min' => $custom_tokens->withdraw_min,
            ];
            DB::table('mainnet_tokens')->insert($addmainToken);
        }


        if ($action == 1) {

            $privatekey = generateBlockchainPrivateKey($custom_tokens->memonic, $custom_tokens->chain);

            if ($custom_tokens->chain == 'TRON') {

                $payload = array(
                    "symbol" => $custom_tokens->symbol,
                    "supply" => $custom_tokens->supply,
                    "decimals" => $custom_tokens->decimals,
                    "type" => $custom_tokens->type,
                    "description" => $custom_tokens->name,
                    "address" => $custom_tokens->address,
                    "privateKey" => $privatekey->key,
                    "basePair" => "USDT"
                );

               $ressiis = tron_token_deploy_api($payload);
              
            }
        }

       
    }


    public function get_custom_tokens()
    {

        $custom_tokens = DB::table('custom_tokens')->get(['id', 'holder_address', 'chain']);

        foreach ($custom_tokens as $token) {

            $return = $this->getmasterwalletbalance($token->holder_address, $token->chain);


            if (isset($return->balance)) {

                if ($token->chain == 'BSC') {
                    $balance = $return->balance;
                } else {
                    $balance = $return->balance / 1000000;
                }

                DB::table('custom_tokens')->where('id', $token->id)->update(['balance' => $balance]);
            }
        }

        $customtokens = DB::table('custom_tokens')->paginate(10);

        return response()->json($customtokens);
    }
}
