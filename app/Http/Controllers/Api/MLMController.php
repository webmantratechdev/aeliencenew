<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\Staking_log as Stacking;


use Illuminate\Support\Carbon;

class MLMController extends Controller
{
    //
    public function getMLMLevel()
    {
        $level = DB::table('mlm_level')->paginate(10);
        return response()->json($level);
    }


    public function gemlmusers($userid)
    {
        $users = User::where('id', $userid)->with(['children'])->get();
        $data =  childarray($users);
        
        // print_r($data ); exit;
        return response()->json($data);
    }


    public function mlmgetcommision($userid)
    {

        $totalStack = DB::table('staking_logs')->where(['user_id' => $userid, 'stacketype' => 'poststacke'])->get();

        foreach ($totalStack as $stack) {

            if ($stack->cost > 0) {

                $commisn = 0;
                if ($stack->cost >= 100 || $stack->cost <= 5000) {

                    $commisn = ($stack->cost * 5) / 100;
                } elseif ($stack->cost > 5000) {

                    $commisn = ($stack->cost * 7) / 100;
                } else {
                    $commisn = 0;
                }

                $totalEntry = DB::table('mlm_personal_commission')->where([
                    'userid' => $stack->user_id,
                    'stackingid' => $stack->id,
                ])->count();

                if ($totalEntry != 12) {


                    $commisExsitthismonth = DB::table('mlm_personal_commission')->where([
                        'userid' => $stack->user_id,
                        'stackingid' => $stack->id,
                    ])
                        ->whereMonth('created_at', Carbon::now()->month)
                        ->get(['id'])->first();



                    if (!$commisExsitthismonth) {


                        if ($totalEntry == 11) {
                            $commisn = $stack->cost + $commisn;
                        }

                        $data = [
                            'userid' => $stack->user_id,
                            'stackingid' => $stack->id,
                            'stackamount' => $stack->cost,
                            'commission' => $commisn,
                        ];

                        DB::table('mlm_personal_commission')->insert($data);
                    }
                }
            }
        }
    }
}
