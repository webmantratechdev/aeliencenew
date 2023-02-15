<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BinanceController extends Controller
{
    //

    private $apiKey;

    private $apiSecret;

    private $baseUrl;

    public function __construct()
    {
        $this->apiKey = 'IcX3RqiDn0sa51ss0RmlF4wsWGWgAGk8avwkt7ztN4J5eN4t71uSIZP6T6LczWTt';
        $this->apiSecret = 'gEOodAqqds72QZd20E28clyhwOqVaq08GdgFsL1ZQpANEDZoBwVMDqqupCrRsoCR';
        $this->baseUrl = 'https://api.binance.com/';
    }


    public function  signature($query_string, $secret)
    {
        return hash_hmac('sha256', $query_string, $secret);
    }

    public function sendRequest($method, $path)
    {

        $url = $this->baseUrl . $path;

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => ($method == 'POST')?'POST':'GET',
            CURLOPT_HTTPHEADER => array(
                'X-MBX-APIKEY: '.$this->apiKey
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response);
    }

    public function buildQuery(array $params)
    {
        $query_array = array();
        foreach ($params as $key => $value) {
            if (is_array($value)) {
                $query_array = array_merge($query_array, array_map(function ($v) use ($key) {
                    return urlencode($key) . '=' . urlencode($v);
                }, $value));
            } else {
                $query_array[] = urlencode($key) . '=' . urlencode($value);
            }
        }
        return implode('&', $query_array);
    }


    public function signedRequest($method, $path, $parameters = [])
    {
        $parameters['timestamp'] = round(microtime(true) * 1000);
        $query = $this->buildQuery($parameters);
        $signature = $this->signature($query, $this->apiSecret);
        return $this->sendRequest($method, $path . "?$query&signature=$signature");
    }

    public function getAllCoin()
    {
        $response = $this->signedRequest('GET', 'sapi/v1/capital/config/getall', [
            'recvWindow' => 5000,
        ]);
        return response()->json($response);
    }

    public function getorderbook($pair){

        $response = $this->sendRequest('GET', 'api/v3/depth?symbol='.$pair.'&limit=11');
        echo json_encode($response);

    }

}
