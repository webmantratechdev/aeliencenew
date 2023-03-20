<?php

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

    // $payload = array(
    //     "symbol" => "MY_TOKEN",
    //     "supply" => "10000000",
    //     "description" => "My Public Token",
    //     "address" => "0x687422eEA2cB73B5d3e242bA5456b782919AFc85",
    //     "privateKey" => "0x05e150c73f1920ec14caa1e0b6aa09940899678051a78542840c2668ce5080c2",
    //     "basePair" => "AED"
    // );

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
