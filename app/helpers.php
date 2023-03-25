<?php

use App\Models\Staking_log as Stacking;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


function tatumauth($key)
{

    $data = [
        'key' => 'faa062a1-7d7b-4021-8ea4-f8995c608eda',
        'url' => 'https://api.tatum.io/v3/',
    ];

    if (isset($data[$key])) {
        return $data[$key];
    } else {
        return  'invalid key';
    }
}


function networkapicall($nework)
{
    $array = [
        'BCH' => 'bcash',
        'BNB' => 'bsc',
        'BSC' => 'bsc',
        'BTC' => 'bitcoin',
        'CELO' => 'celo',
        'DOGE' => 'dogecoin',
        'ETH' => 'ethereum',
        'LTC' => 'litecoin',
        'MATIC' => 'polygon',
        'SOL' => 'solana',
        'TRON' => 'tron',

    ];

    return  $array[$nework];
}


function generateBlockchainWallet($network)
{

    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_HTTPHEADER => [
            "x-api-key: " . tatumauth('key')
        ],
        CURLOPT_URL => tatumauth('url') . networkapicall($network) . "/wallet",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => "GET",
    ]);

    $response = curl_exec($curl);
    $error = curl_error($curl);

    curl_close($curl);

    return json_decode($response);
}



function generateBlockchainAddress($xpub, $network)
{
    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_HTTPHEADER => [
            "x-api-key: " . tatumauth('key')
        ],
        CURLOPT_URL => tatumauth('url') . networkapicall($network) . "/address/" . $xpub . "/1",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => "GET",
    ]);

    $response = curl_exec($curl);
    $error = curl_error($curl);
    curl_close($curl);
    return json_decode($response);
}

function generateVirtualAccount($coin, $xpub)
{
    $curl = curl_init();

    $payload = array(
        "currency" => $coin,
        "xpub" => $xpub
    );
    curl_setopt_array($curl, [
        CURLOPT_HTTPHEADER => [
            "Content-Type: application/json",
            "x-api-key: " . tatumauth('key')
        ],
        CURLOPT_POSTFIELDS => json_encode($payload),
        CURLOPT_URL => tatumauth('url') . "ledger/account",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => "POST",
    ]);

    $response = curl_exec($curl);
    $error = curl_error($curl);

    curl_close($curl);

    return json_decode($response);
}


function generateBlockchainPrivateKey($mnemonic, $network)
{

    $curl = curl_init();

    $payload = array(
        "index" => 1,
        "mnemonic" => $mnemonic
    );

    curl_setopt_array($curl, [
        CURLOPT_HTTPHEADER => [
            "Content-Type: application/json",
            "x-api-key: " . tatumauth('key')
        ],
        CURLOPT_POSTFIELDS => json_encode($payload),
        CURLOPT_URL => tatumauth('url') . networkapicall($network) . "/wallet/priv",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => "POST",
    ]);

    $response = curl_exec($curl);
    $error = curl_error($curl);

    curl_close($curl);

    return json_decode($response);
}



//  sms helper

function sendoptsms($number, $otp)
{

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://login.webpayservices.in/sms-panel/api/http/index.php?username=webmantratech&apikey=9C6E1-B02A6&apirequest=Text&sender=ARLTSM&mobile=' . $number . '&message=' . $otp . '%20is%20your%20OTP.%20It%20is%20valid%20for%2030%20minutes.%20ARLTSM&route=TRANS&TemplateID=1507164801741091376&format=JSON',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Cookie: websms=vp3bk5qcvpekvqsd2kkp5tppc5'
        ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);
}


//-----------------------------------------register-token-------------------------------------------//

function tron_token_register_api($payload)
{

    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_HTTPHEADER => [
            "Content-Type: application/json",
            "x-api-key: " . tatumauth('key')
        ],
        CURLOPT_POSTFIELDS => json_encode($payload),
        CURLOPT_URL => tatumauth('url') . "offchain/tron/trc",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => "POST",
    ]);

    $response = curl_exec($curl);
    $error = curl_error($curl);

    return json_decode($response);
}

function tron_token_deploy_api($payload)
{
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_HTTPHEADER => [
            "Content-Type: application/json",
            "x-api-key: " . tatumauth('key')
        ],
        CURLOPT_POSTFIELDS => json_encode($payload),
        CURLOPT_URL => tatumauth('url') . "offchain/tron/trc/deploy",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => "POST",
    ]);

    $response = curl_exec($curl);
    $error = curl_error($curl);
    curl_close($curl);

    return json_decode($response);
}



function etherium_token_register_api($payload)
{
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_HTTPHEADER => [
            "Content-Type: application/json",
            "x-api-key: " . tatumauth('key')
        ],
        CURLOPT_POSTFIELDS => json_encode($payload),
        CURLOPT_URL => "https://api.tatum.io/v3/offchain/ethereum/erc20/deploy",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => "POST",
    ]);

    $response = curl_exec($curl);
    $error = curl_error($curl);

    curl_close($curl);
}


function childarray($cdir)
{
    $result = [];
    foreach ($cdir as $value) {

        $childers = [];
        if (isset($value->children)) {
            $childers = childarray($value->children);

            foreach ($value->children as $staks) {

                $statking = Stacking::where(['user_id' => $staks->id, 'stacketype' => 'poststacke'])->get();
                foreach ($statking as $stack) {

                    $parentUser = DB::table('users')->where('share_refferal_code', $stack->refferal_code)->get(['id'])->first();
                    $parentstatking = Stacking::where(['user_id' => $parentUser->id, 'stacketype' => 'poststacke'])->sum('cost');

                    if ($parentstatking == 0) {

                        $owncommistion = ($stack->staked * 5) / 100;

                        // get today days in month
                        $totaldayInmonth = 30; //Carbon::now()->daysInMonth();

                        // calculate every day com
                        $perdaycomm = $owncommistion / $totaldayInmonth;



                        $data = [
                            'userid' => $parentUser->id,
                            'child' => $staks->id,
                            'stackingid' => $stack->id,
                            'commission' => $owncommistion,
                        ];
                    }
                }
            }
        }

        $result[] =
            [
                'id' =>  $value->id,
                'name' =>  $value->name,
                'title' => 'Amount - ' . Stacking::where(['user_id' => $value->id, 'stacketype' => 'poststacke'])->sum('staked'),
                'children' =>  $childers
            ];
    }
    return $result;
}
