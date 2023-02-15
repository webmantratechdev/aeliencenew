<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\DB;

class NetworkController extends Controller
{
    //
     public function getAllnetwork() {

        $newtworkd = DB::table('networks')->get();

        return response()->json($newtworkd);

     }
}
