<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\DB;

class NetworkController extends Controller
{
    //
     public function getAllnetwork() {

        $newtworkd = DB::table('networks')->orderBy('id', 'DESC')->get();

        return response()->json($newtworkd);

     }


     public function getneworkbycoin($coin) {
        $mainnet_tokens = DB::table('mainnet_tokens')->where('symbol', $coin)->get(['chain'])->first();
        return response()->json($mainnet_tokens);
     }
}
