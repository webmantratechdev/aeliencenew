<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class TatumController extends Controller
{
    //
    public function generateTronWallet()
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_HTTPHEADER => [
                "x-api-key: faa062a1-7d7b-4021-8ea4-f8995c608eda"
            ],
            CURLOPT_URL => "https://api.tatum.io/v3/tron/wallet",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "GET",
        ]);

        $response = curl_exec($curl);
        $error = curl_error($curl);

        curl_close($curl);


        return json_decode($response);
    }


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


    public function createDepositaddress($accountid)
    {
        $id = $accountid;
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_HTTPHEADER => [
                "x-api-key: faa062a1-7d7b-4021-8ea4-f8995c608eda"
            ],
            CURLOPT_URL => "https://api.tatum.io/v3/offchain/account/" . $id . "/address",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "POST",
        ]);

        $response = curl_exec($curl);
        $error = curl_error($curl);

        curl_close($curl);
        return json_decode($response);
    }


    public function getvertualAcountBalance($accountid)
    {


        $id = $accountid;
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_HTTPHEADER => [
                "x-api-key: faa062a1-7d7b-4021-8ea4-f8995c608eda"
            ],
            CURLOPT_URL => "https://api.tatum.io/v3/ledger/account/" . $id . "/balance",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "GET",
        ]);

        $response = curl_exec($curl);
        $error = curl_error($curl);

        curl_close($curl);

        return  json_decode($response);
    }






    public function getvertualAcountTransaction($accountid)
    {

        $curl = curl_init();

        $payload = array(
            "id" => $accountid,
        );

        curl_setopt_array($curl, [
            CURLOPT_HTTPHEADER => [
                "Content-Type: application/json",
                "x-api-key: faa062a1-7d7b-4021-8ea4-f8995c608eda"
            ],
            CURLOPT_POSTFIELDS => json_encode($payload),
            CURLOPT_URL => "https://api.tatum.io/v3/ledger/transaction/account?pageSize=10",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "POST",
        ]);

        $response = curl_exec($curl);
        $error = curl_error($curl);

        curl_close($curl);

        return json_decode($response);
      
    }


    public function getWalletHistory($userid)
    {

        $accounts = DB::table('ledger_accounts')->where(['user_id' => $userid])->get(['network', 'wallet_id', 'account_id']);

        $account = [];

        foreach ($accounts as $ad) {
            foreach($this->getvertualAcountTransaction($ad->account_id) as $acssdf){

                $data = [
                    'userid' => $userid, 
                    'amount' => $acssdf->amount, 
                    'operationType' => $acssdf->operationType, 
                    'currency' => $acssdf->currency, 
                    'network' => $ad->network,
                    'transactionType' => $acssdf->transactionType, 
                    'accountId' => $acssdf->accountId, 
                    'anonymous' => $acssdf->anonymous, 
                    'reference'  => $acssdf->reference, 
                    'txId' => $acssdf->txId, 
                    'address' => $acssdf->address, 
                    'location' => $acssdf->location, 
                    'created_at' => date('Y-m-d H:i:s'), 
                    'updated_at'   => date('Y-m-d H:i:s')
                ];

                $existxt = DB::table('wallet_history')->where('txId', $acssdf->txId)->get(['txId'])->first();

                if(empty($existxt)){
                    DB::table('wallet_history')->insert($data);
                }

            }
        }

       $exasdf =  DB::table('wallet_history')->where(['userid'=> $userid])->paginate(10);

       return response()->json($exasdf);
        
    }

    public function getrecentdepositHistory ($coin, $userid)
    {

        $accounts = DB::table('ledger_accounts')->where(['user_id' => $userid])->get(['network', 'wallet_id', 'account_id']);

        $account = [];

        foreach ($accounts as $ad) {
            foreach($this->getvertualAcountTransaction($ad->account_id) as $acssdf){

                $data = [
                    'userid' => $userid, 
                    'amount' => $acssdf->amount, 
                    'operationType' => $acssdf->operationType, 
                    'currency' => $acssdf->currency, 
                    'network' => $ad->network,
                    'transactionType' => $acssdf->transactionType, 
                    'accountId' => $acssdf->accountId, 
                    'anonymous' => $acssdf->anonymous, 
                    'reference'  => $acssdf->reference, 
                    'txId' => $acssdf->txId, 
                    'address' => $acssdf->address, 
                    'location' => $acssdf->location, 
                    'created_at' => date('Y-m-d H:i:s'), 
                    'updated_at'   => date('Y-m-d H:i:s')
                ];

                $existxt = DB::table('wallet_history')->where('txId', $acssdf->txId)->get(['txId'])->first();

                if(empty($existxt)){
                    DB::table('wallet_history')->insert($data);
                }

            }
        }

       $exasdf =  DB::table('wallet_history')->where(['userid'=> $userid, 'currency' => $coin, 'operationType' => 'DEPOSIT'])->paginate(10);

       return response()->json($exasdf);
        
    }


    public function getdepositeaddress($coin, $network, $userid)
    {

        $getWalletaddress = DB::table('wallets')->where(['user_id' => $userid, 'network' => $network,  'symbol' => $coin,])->get()->first();

        if ($getWalletaddress) {

            return $getWalletaddress->address;
        } else {

            $wallet = $this->generateTronWallet();

            $account = $this->createVirtualAccount($coin, $wallet->xpub);

            if (!isset($account->id)) {
                exit;
            }

            $deposignadres = $this->createDepositaddress($account->id);

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
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ];

                DB::table('ledger_accounts')->insert($data);

                return $deposignadres->address;
            }
        }
    }


    public function getaccountidbycontin($userid,  $symbold){

        $ledger_accounts = DB::table('ledger_accounts')->where(['user_id' => $userid, 'currency' => $symbold])->get(['account_id'])->first();

    
        $retursn = $this->getvertualAcountBalance($ledger_accounts->account_id);

        $data = [
            'stackDate' => date('Y-m-d H:i:s'),
            'valueDate' => date('Y-m-d H:i:s', time() + 86400 ),
            'distributionDate' => date('Y-m-d H:i:s', time() + 86400),
            'account' => $retursn,
        ];

        return response()->json($data);
    }
}
