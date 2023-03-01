<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Mail;

class TatumController extends Controller
{
    //
    public function generateBlockchainWallet($nework)
    {


        $array = [
            'ETH' => 'ethereum',
            'TRON' => 'tron',
            'BSC' => 'bsc',
            'BTC' => 'bitcoin',
        ];


        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_HTTPHEADER => [
                "x-api-key: faa062a1-7d7b-4021-8ea4-f8995c608eda"
            ],
            CURLOPT_URL => "https://api.tatum.io/v3/" . $array[$nework] . "/wallet",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "GET",
        ]);

        $response = curl_exec($curl);
        $error = curl_error($curl);

        curl_close($curl);


        return json_decode($response);
    }



    /**********************************************---------------------------------------------*********/

    public function generateBlockchainAddress($xpub, $network)
    {

        $array = [
            'ETH' => 'ethereum',
            'TRON' => 'tron',
            'BSC' => 'bsc',
            'BTC' => 'bitcoin',
        ];

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_HTTPHEADER => [
                "x-api-key: faa062a1-7d7b-4021-8ea4-f8995c608eda"
            ],
            CURLOPT_URL => "https://api.tatum.io/v3/" . $array[$network] . "/address/" . $xpub . "/1",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "GET",
        ]);

        $response = curl_exec($curl);
        $error = curl_error($curl);

        curl_close($curl);
        return json_decode($response);
    }


    /**********************************************---------------------------------------------*********/

    public function createVirtualAccount($coin, $xpub)
    {
        $curl = curl_init();

        $payload = array(
            "currency" => $coin,
            "xpub" => $xpub
        );

        curl_setopt_array($curl, [
            CURLOPT_HTTPHEADER => [
                "Content-Type: application/json",
                "x-api-key: faa062a1-7d7b-4021-8ea4-f8995c608eda"
            ],
            CURLOPT_POSTFIELDS => json_encode($payload),
            CURLOPT_URL => "https://api.tatum.io/v3/ledger/account",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "POST",
        ]);

        $response = curl_exec($curl);
        $error = curl_error($curl);

        curl_close($curl);

        return json_decode($response);
    }


    /**********************************************---------------------------------------------*********/


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


    /**********************************************---------------------------------------------*********/

    public function getdepositeaddress($coin, $network, $userid)
    {

        $getWalletaddress = DB::table('wallets')->where(['user_id' => $userid, 'network' => $network,  'symbol' => $coin,])->get()->first();

        if ($getWalletaddress) {

            return $getWalletaddress->address;
        } else {

            $wallets = $this->generateBlockchainWallet($network);


            $account = $this->createVirtualAccount($coin, $wallets->xpub);

            if (!isset($account->id)) {
                exit;
            }

            $deposignadres = $this->generateBlockchainAddress($wallets->xpub, $network);


            $wallet = [
                'user_id' => $userid,
                'address' => $deposignadres->address,
                'addresses' => '',
                'symbol' => $coin,
                'balance' => '0.00000000',
                'type' => 'funding',
                'network' => $network,
                'provider' => 'funding',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            if (DB::table('wallets')->insert($wallet)) {

                $new = DB::table('wallets')->where(['user_id' => $userid, 'network' => $network,  'symbol' => $coin,])->get(['id'])->first();

                $data = [
                    'user_id' => $userid,
                    'currency' => $coin,
                    'network' => $network,
                    'account_id' => $account->id,
                    'wallet_id' => $new->id,
                    'active' => $account->active,
                    'accountingCurrency' => $account->accountingCurrency,
                    'frozen'  => $account->frozen,
                    'memonic' => $wallets->mnemonic,
                    'xpub' => $wallets->xpub,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ];

                DB::table('ledger_accounts')->insert($data);

                if ($coin == 'AEL') {

                    $customtoke = DB::table('custom_tokens')->where('symbol', $coin)->get()->first();

                    $privatekey = $this->getBlockchainPrivateKey($customtoke->memonic, $coin);

                    $curl = curl_init();

                    $payload = array(
                        "to" => $deposignadres->address,
                        "amount" => "0.000001",
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
                }


                return $deposignadres->address;
            }
        }
    }



    /**********************************************---------------------------------------------*********/

    public function getblockchaintransation($address, $network)
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_HTTPHEADER => [
                "x-api-key: faa062a1-7d7b-4021-8ea4-f8995c608eda"
            ],
            CURLOPT_URL => "https://api.tatum.io/v3/" . $network . "/transaction/account/" . $address,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "GET",
        ]);

        $response = curl_exec($curl);
        $error = curl_error($curl);

        
        curl_close($curl);

        $res =  json_decode($response);



        // trc20 trans
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_HTTPHEADER => [
                "x-api-key: faa062a1-7d7b-4021-8ea4-f8995c608eda"
            ],
            CURLOPT_URL => "https://api.tatum.io/v3/tron/transaction/account/" . $address . "/trc20",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "GET",
        ]);

        $response = curl_exec($curl);
        $error = curl_error($curl);

        curl_close($curl);

        $trc20re = json_decode($response);

        $obj_merged = (object)[];


        $array1 = $array2 = [];

        if (isset($res->transactions)) {
            $array1 = (array) $res->transactions;
        }

        if (isset($trc20re->transactions)) {
            $array2 = (array) $trc20re->transactions;
        }

        $obj_merged->transactions = (object) array_merge($array1, $array2);

        return $obj_merged;
    }

    public function getWalletHistory($userid, $operationType)
    {

        $array = [
            'ETH' => 'ethereum',
            'TRON' => 'tron',
            'BSC' => 'bsc',
            'BTC' => 'bitcoin',
            'AEL' => 'tron'
        ];


        $getwallet = DB::table('wallets')->where(['user_id' => $userid])->get(['user_id', 'address', 'network', 'symbol']);

        foreach ($getwallet as $ws) {

            $return = $this->getblockchaintransation($ws->address, $array[$ws->network]);


            if (isset($return->transactions)) {

                if (is_object($return->transactions)) {

                    foreach ($return->transactions as $tr) {

                        if (isset($tr->ret[0]->contractRet) == 'SUCCESS') {



                            $operationTypes = 'WITHDRAWAL';
                            if (isset($tr->rawData->contract[0]->parameter->value->toAddressBase58) == $ws->address) {
                                $operationTypes = 'DEPOSIT';
                            }

                            if (isset($tr->rawData->contract[0]->parameter->value->amount)) {

                                $data = [
                                    'userid' => $userid,
                                    'amount' => isset($tr->rawData->contract[0]) ? $tr->rawData->contract[0]->parameter->value->amount / 1000000 : '',
                                    'operationType' => $operationTypes,
                                    'currency' => $ws->symbol,
                                    'network' => $ws->network,
                                    'txId' => $tr->txID,
                                    'owner_address' => $tr->rawData->contract[0]->parameter->value->ownerAddressBase58,
                                    'to_address' => $tr->rawData->contract[0]->parameter->value->toAddressBase58,
                                    'depositincurrencu' => ($ws->network == 'TRON') ? 'TRX' : $ws->network,
                                    'created_at' => date('Y-m-d H:i:s'),
                                    'updated_at'   => date('Y-m-d H:i:s')
                                ];


                                $existxt = DB::table('wallet_history')->where('txId', $tr->txID)->get(['txId'])->first();

                                if (empty($existxt)) {


                                    DB::table('wallet_history')->insert($data);

                                    if ($data['amount'] != '1.0E-6') {

                                        $getuser = DB::table('users')->where('id', $userid)->get(['name', 'email'])->first();

                                        $data = [
                                            'email' => $getuser->email,
                                            'name' => $getuser->name,
                                            'amount' => $data['amount'],
                                            'symbol' => $data['depositincurrencu']
                                        ];


                                        Mail::send('emails.deposit', $data, function ($message) use ($data) {
                                            $message->to($data['email'], $data['name'])->subject('Deposit Confirmed');
                                            $message->from('support@aelince.com', 'Aelince');
                                        });
                                    }
                                }
                            }
                        } else {

                            $operationTypes = 'WITHDRAWAL';
                            if (isset($tr->type) == 'Transfer') {
                                $operationTypes = 'DEPOSIT';
                            }

                            $data = [
                                'userid' => $userid,
                                'amount' => isset($tr->value) ? $tr->value / 100000000 : '',
                                'operationType' => $operationTypes,
                                'currency' => $ws->symbol,
                                'network' => $ws->network,
                                'txId' => $tr->txID,
                                'owner_address' => $tr->from,
                                'to_address' => $tr->to,
                                'depositincurrencu' => 'AEL',
                                'created_at' => date('Y-m-d H:i:s'),
                                'updated_at'   => date('Y-m-d H:i:s')
                            ];

                            $existxt = DB::table('wallet_history')->where('txId', $tr->txID)->get(['txId'])->first();

                            if (empty($existxt)) {
                                DB::table('wallet_history')->insert($data);

                                if ($data['txId'] != '1.0E-6') {

                                    $getuser = DB::table('users')->where('id', $userid)->get(['name', 'email'])->first();

                                    $data = [
                                        'email' => $getuser->email,
                                        'name' => $getuser->name,
                                        'amount' => $data['amount'],
                                        'symbol' => $data['depositincurrencu']
                                    ];

                                    Mail::send('emails.deposit', $data, function ($message) use ($data) {
                                        $message->to($data['email'], $data['name'])->subject('Deposit Confirmed');
                                        $message->from('support@aelince.com', 'Aelince');
                                    });
                                }
                            }
                        }
                    }
                }
            }
        }

        $exasdf =  DB::table('wallet_history')->where(['userid' => $userid, 'operationType' => $operationType])
            ->where('amount', '>=', '1')
            ->where('amount', '!=', '1.0E-6')
            ->orderBy('id', 'DESC')->paginate(10);

        return response()->json($exasdf);
    }


    /**********************************************---------------------------------------------*********/

    public function getrecentdepositHistory($coin, $userid)
    {

        $exasdf =  DB::table('wallet_history')->where(['userid' => $userid, 'currency' => $coin, 'operationType' => 'DEPOSIT'])
            ->where('amount', '>=', '1')
            ->where('amount', '!=', '1.0E-6')
            ->paginate(10);

        return response()->json($exasdf);
    }


    /**********************************************---------------------------------------------*********/

    public function getBlockchainBalance($address, $network, $symbol)
    {


        $array = [
            'ETH' => 'ethereum',
            'TRON' => 'tron',
            'BSC' => 'bsc',
            'BTC' => 'bitcoin',
            'AEL' => 'tron'
        ];


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

        $tronblalce = json_decode($response);

        if (isset($tronblalce->trc20[0])) {

            $wallet = DB::table('custom_tokens')->where(['chain' => $network, 'symbol' => $symbol])->get(['address'])->first();

            $trc20address = (array)$tronblalce->trc20[0];

            $array = [];
            $array['balance'] = $trc20address[$wallet->address];

            $object = (object) $array;

            return $object;
        } else {
            if ($network == 'TRON') {

                $curl = curl_init();

                curl_setopt_array($curl, [
                    CURLOPT_HTTPHEADER => [
                        "x-api-key: faa062a1-7d7b-4021-8ea4-f8995c608eda"
                    ],
                    CURLOPT_URL => "https://api.tatum.io/v3/tron/transaction/account/" . $address . "/trc20",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_CUSTOMREQUEST => "GET",
                ]);

                $response = curl_exec($curl);
                $error = curl_error($curl);

                curl_close($curl);

                $transaction  = json_decode($response);


                if (isset($transaction->transactions[0]->value)) {

                    $array = [];
                    $array['balance'] = $transaction->transactions[0]->value;

                    $object = (object) $array;

                    return $object;
                }
            }
        }
    }
    public function getaccountidbycontin($userid,  $symbold)
    {

        $wallet = DB::table('wallets')->where(['user_id' => $userid, 'symbol' => $symbold])->get()->first();

        $retursn = $this->getBlockchainBalance($wallet->address, $wallet->network, $symbold);

        $data = [
            'stackDate' => date('Y-m-d H:i:s'),
            'valueDate' => date('Y-m-d H:i:s', time() + 86400),
            'distributionDate' => date('Y-m-d H:i:s', time() + 86400),
            'balance' => isset($retursn->balance) ? $retursn->balance / 100000000 : "0.0000",
        ];

        return response()->json($data);
    }
}

/**********************************************---------------------------------------------*********/
