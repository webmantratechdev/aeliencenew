<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Mail;

class WithdrawalController extends Controller
{
    //


    public function withdrawalendotp(Request $request) {

        $users = DB::table('users')->where('id', $request->userid)->get()->first();
      
        $opt1 = mt_rand(1111, 9999);

        $data = [
            'name' => $users->name,
            'email' => $users->email,
            'phone' => $users->phone,
            'otp' => $opt1,
            'status' => 200,
        ];

        Mail::send('emails.otp', $data, function($message) use ($data) {
            $message->to($data['email'], 'Aelince')->subject('Aelince Verification OTP : '.$data['otp']);
            $message->from('support@aelince.com','Aelince');
        });

        $opt2 = mt_rand(1111, 9999);

        sendoptsms($users->phone, $opt2);

        return response()->json(['email' => $opt1, 'phone' => $opt2]);
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


    public function withdrawal(Request $request)
    {

        $ledger_accounts = DB::table('ledger_accounts')->where(['user_id' => $request->userid, 'currency' => $request->conin])->get(['account_id', 'wallet_id', 'memonic', 'xpub'])->first();
        
        $privateKey = generateBlockchainPrivateKey($ledger_accounts->memonic, $request->networks);

        $walletAddress = DB::table('wallets')->where(['id' => $ledger_accounts->wallet_id])->get()->first();

        $custom_tokens = DB::table('custom_tokens')->where(['chain' => $request->networks, 'symbol' => $request->conin])->get(['address', 'holder_address', 'balance'])->first();

        $account = $this->getwalletbalance($walletAddress->address);

        $balance = $account->balance / 100000;

        if ($balance > 10) {

            if ($walletAddress->symbol == 'AEL') {

                $payload = array(
                    "fromPrivateKey" => $privateKey->key,
                    "to" => $request->withdrawalAddress,
                    "tokenAddress" => $custom_tokens->address,
                    "feeLimit" => 12,
                    "amount" => $request->withdrawalAmount
                );

                $curl = curl_init();

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

                $resp = json_decode($response);

                if(isset($resp->txId)){

                    $users = DB::table('users')->where('id', $request->userid)->get()->first();

                    $data = [
                        'name' => $users->name,
                        'email' => $users->email,
                        'phone' => $users->phone,
                        'amount' => $request->withdrawalAmount,
                        'symbol' => $request->conin,
                        'txId' => $resp->txId,
                        'address' => $request->withdrawalAddress,
                    ];
            
                    Mail::send('emails.withdrawal', $data, function ($message) use ($data) {
                        $message->to($data['email'], $data['name'])->subject('withdrawal Confirmed');
                        $message->from('support@aelince.com', 'Aelince');
                    });

                }

               return $response;
            }
        }
    }
}
