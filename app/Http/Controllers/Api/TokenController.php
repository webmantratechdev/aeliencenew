<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\DB;

class TokenController extends Controller
{
    //

    public function getAllToken() {
        
        $token = DB::table('mainnet_tokens')->get();

        return response()->json($token);

    }


    public function get_custom_tokens() {
        $custom_tokens = DB::table('custom_tokens')->paginate(10);

        return response()->json($custom_tokens);

    }


}
