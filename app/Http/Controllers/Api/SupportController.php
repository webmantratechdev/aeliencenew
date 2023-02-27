<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Models\Support;

use Illuminate\Support\Facades\Mail;

class SupportController extends Controller
{
    //

    public function getAllsupport() {

        $status = @$_GET['status'];

        $fetch = '';
        if($status == 'all') {
            $fetch = Support::orderBy('id', 'DESC')->paginate(10);
        }else{
            $fetch = Support::where('status', $status)->orderBy('id', 'DESC')->paginate(10);
        }

        return response()->json($fetch);
    
    }


    public function deleteticket(Request $request) {

        $delete = Support::where('id', $request->ticketid)->delete();

        return $delete;

    }


    public function getsingleticket($ticketid) {
        $delete = Support::where('id', $ticketid)->get()->first();
        return response()->json($delete);
    }


    public function replyticket(Request $request) {

       $update =  Support::where('id', $request->ticketid)->update(['status' => $request->status]);
       
       
       if($update) {

            $tickets = Support::where('id', $request->ticketid)->get()->first();

            $maildata = [
                'subject' => $tickets->subject.'-reply',
                'messagesd' => htmlspecialchars_decode($request->message),
                'email' => $tickets->email,
                'name' => $tickets->name,
            ];

            Mail::send('emails.supportreply', $maildata, function($message) use ($maildata){
                $message->to($maildata['email'], $maildata['name'])->subject($maildata['subject']);
                $message->from('support@aelince.com','Aelince');
            });

            return 1;
        }
    }


    public function addticket(Request $request) {

        $support = new Support();

        $support->name = $request->name;
        $support->email = $request->email;
        $support->subject = $request->subject;
        $support->mesage = $request->message;
        $support->location = '';
        $support->ipaddress = $request->ip();
        $support->status = 'P';
        $support->save();
        return 1;
    }

}
