<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class MLMController extends Controller
{
    //


    public function getMLMLevel(){

        $level = DB::table('mlm_level')->paginate(10);
        return response()->json($level);

    }

    public function getaccountreferral($userid)
    {

        $activeuser = DB::table('users')->where('id', $userid)->get()->first();

        $lavel = @$_GET['lavels'];

        if ($lavel == 1) {

            $findChild1 =  DB::table('users')->where('refferal_code', $activeuser->share_refferal_code)->paginate(10);
            return response()->json($findChild1);
        } elseif ($lavel == 2) {


            $fetchFrom2 = DB::table('users')->where('refferal_code', $activeuser->share_refferal_code)->get();

            $query = DB::table('users');

            foreach ($fetchFrom2 as $kye => $child) {

                if ($kye == 0) {
                    $query->where('refferal_code', $child->share_refferal_code);
                } else {
                    $query->orWhere('refferal_code', $child->share_refferal_code);
                }
            }

            $return = $query->paginate(10);

            return response()->json($return);
        } elseif ($lavel == 3) {

            $fetchFrom2 = DB::table('users')->where('refferal_code', $activeuser->share_refferal_code)->get();
            $query = DB::table('users');

            foreach ($fetchFrom2 as $kye => $child) {

                if ($kye == 0) {
                    $query->where('refferal_code', $child->share_refferal_code);
                } else {
                    $query->orWhere('refferal_code', $child->share_refferal_code);
                }
            }

            $return1 = $query->get();

            // -------------------------------------------------------------------------------// 

            $query1 = DB::table('users');

            foreach ($return1 as $kye => $child) {

                if ($kye == 0) {
                    $query1->where('refferal_code', $child->share_refferal_code);
                } else {
                    $query1->orWhere('refferal_code', $child->share_refferal_code);
                }
            }

            $return2 = $query1->paginate(10);

            return response()->json($return2);
        } else {
            $findChild1 =  DB::table('users')->where('refferal_code', 1)->paginate(10);
            return response()->json($findChild1);
        }
    }
}
