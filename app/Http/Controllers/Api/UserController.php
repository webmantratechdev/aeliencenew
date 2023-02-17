<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //

    public function authcheck(Request $request)
    {

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return response()->json(['status' => Auth::user()->id, 'role' => Auth::user()->role]);
        } else {
            return response()->json(['status' => 0]);
        }
    }


    public function userchangepassowrd(Request $request)
    {
        $passsord =  DB::table('users')->where('id', $request->get('profileid'))->update(['password' => Hash::make($request->get('password'))]);
        if ($passsord) {
            return $passsord;
        } else {
            return 0;
        }
    }

    public function forgotpassword(Request $request)
    {
        $opt = mt_rand(111111, 999999);
        $data = [
            'email' => trim($request->get('email')),
            'otp' => $opt
        ];

        $exist = DB::table('users')->where('email', $data['email'])->get()->first();

        if ($exist) {
            DB::table('users')->where('email', $data['email'])->update(['password' => Hash::make($data['otp'])]);

            $to = $data['email'];
            $subject = "Aelince Verification OTP: ".$data['otp'];

            $message = "Please use the verification code below on the Aelince website: ".$data['otp'];

            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            // More headers
            $headers .= 'From: <support@aelince.com>' . "\r\n";
            $headers .= 'Cc: no-reply@aelince.com' . "\r\n";

            mail($to,$subject,$message,$headers);

            return response()->json(['status' => 1, 'otp' => $data['otp']]);
        } else {
            return response()->json(['status' => 0]);
        }
    }

    public function sendveryotp(Request $request)
    {

        $opt = mt_rand(111111, 999999);

        $exist = DB::table('users')->where('email', trim($request->get('email')))->orWhere('phone', trim($request->get('phone')))->get()->first();

        if($exist){

            $data = [
                'name' => "Virat Gandhi",
                'email' => trim($request->get('email')),
                'phone' => trim($request->get('phone')),
                'otp' => $opt,
                'status' => 301,
            ];
            return response()->json($data);

        }else{

            $data = [
                'name' => "Virat Gandhi",
                'email' => trim($request->get('email')),
                'phone' => trim($request->get('phone')),
                'otp' => $opt,
                'status' => 200,
            ];
    
            $this->sendoptsms($data['phone'], $data['otp']);
            $this->sentotpmail($data['email'], $data['otp']);
    
            return response()->json($data);
        }

        
    }


    public function sentotpmail($email, $otp)
    {
        $to = $email;
        $subject = "Aelince Verification OTP: " . $otp;

        $message = "
        
        Confirm Your Registration<br>
        Welcome to Aelince!<br>
        Here is your account activation code:<br><br>
        
        <b> ".$otp." </b>
        <br><br>
        Security Tips:<br>
        * Never give your password to anyone.<br>
        * Never call any phone number for someone claiming to be Aelince Support.<br>
        * Never send any money to anyone claiming to be a member of Binance team.<br>
        * Enable Google Two Factor Authentication.<br>
        * Bookmark www.aelince.com to verify the domain you're visiting.<br><br>
        
        If you don't recognize this activity, please contact our customer support immediately at: https://www.aelince.com/en/contact.";

        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        $headers .= 'From: <support@aelince.com>' . "\r\n";
        $headers .= 'Cc: no-reply@aelince.com' . "\r\n";

        mail($to, $subject, $message, $headers);
    }

    public function sendoptsms($number, $otp)
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

    public function createaAccount(Request $request)
    {

        $data = [
            'first_name' => '',
            'last_name' => '',
            'name' => '',
            'username' => '',
            'email' => $request->get('email'),
            'phone' => trim($request->get('phone')),
            'address' => '',
            'city' => '',
            'country' => '',
            'zip' => '',
            'state' => '',
            'refferal_code' =>  $request->get('referral_code'),
            'share_refferal_code' => mt_rand(11111111, 99999999),
            'password' =>  Hash::make($request->get('password')),
            'deviceid' => '',
            'ipaddress' => '',
            'remember_token' => '',
            'role' => 'U',
            'status' => 'P'
        ];

        if (DB::table('users')->insert($data)) {
            $fetchdata = DB::table('users')->where('email', $request->get('email'))->get()->first();
            return response()->json($fetchdata);
        }
    }



    public function getProfile(Request $request)
    {

        $fetchdata = DB::table('users')->where('id', $request->get('profileid'))->get()->first();
        return response()->json($fetchdata);
    }


    public function updateprofilebyadmin(Request $request)
    {
        $country = DB::table('countries')->where('phonecode', $request->get('country'))->get(['name'])->first();
        $state = DB::table('states')->where('id', $request->get('state'))->get(['name'])->first();

        $data = [
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'address' => $request->get('address'),
            'city' => $request->get('city'),
            'country' => $country->name,
            'zip' => $request->get('zip'),
            'state' => $state->name,
            'aadhar_front' => $request->get('aadhar_front'),
            'aadhar_back' => $request->get('aadhar_back'),
            'profile' => $request->get('profile'),
            'status' => $request->get('status'),
        ];

        $update =  DB::table('users')->where('id', $request->get('userid'))->update($data);

        if ($update) {
            return $update;
        } else {
            return 0;
        }
    }

    public function updatebasicinfo(Request $request)
    {

        $country = DB::table('countries')->where('phonecode', $request->get('country'))->get(['name'])->first();
        $state = DB::table('states')->where('id', $request->get('state'))->get(['name'])->first();

        $data = [
            'first_name' => '',
            'last_name' => '',
            'name' => $request->get('fullname'),
            'username' => $request->get('fullname'),
            'address' => $request->get('addresss'),
            'city' => $request->get('city'),
            'country' => $country->name,
            'zip' => $request->get('pincode'),
            'state' => $state->name,
            'deviceid' => '',
            'ipaddress' => '',
            'remember_token' => '',
        ];

        $fetchdata = DB::table('users')->where('id', $request->get('profileid'))->update($data);

        if ($fetchdata) {
            return response()->json(['status' => 1]);
        } else {
            return response()->json(['status' => 0]);
        }
    }

    public function uploadDocument(Request $request)
    {


        $upload_path = public_path('upload');
        $file_name = $request->file->getClientOriginalName();
        $generated_new_name = time() . '.' . $request->file->getClientOriginalExtension();
        $request->file->move($upload_path, $generated_new_name);

        echo $generated_new_name;
    }

    public function updatedocument(Request $request)
    {
        $data = [

            'aadhar_front' => $request->get('front'),
            'aadhar_back' => $request->get('back'),
        ];


        $fetchdata = DB::table('users')->where('id', $request->get('profileid'))->update($data);

        if ($fetchdata) {
            return response()->json(['status' => 1]);
        } else {
            return response()->json(['status' => 0]);
        }
    }


    public function updateselfie(Request $request)
    {
        $data = [
            'profile' => $request->get('selfie'),
        ];
        $fetchdata = DB::table('users')->where('id', $request->get('profileid'))->update($data);

        if ($fetchdata) {
            return response()->json(['status' => 1]);
        } else {
            return response()->json(['status' => 0]);
        }
    }


    public function getAllUsers()
    {

        $filterby = @$_GET['kycstatus'];

        $users = '';
        if (!empty($filterby)) {
            $users =  DB::table('users')->where(['role' => 'U', 'status' => $filterby])->paginate(25);
        } else {
            $users =  DB::table('users')->where('role', 'U')->paginate(25);
        }




        return response()->json($users);
    }


    public function updateuserstatus(Request $request)
    {

        $update = DB::table('users')->where('id', $request->get('userid'))->update(['status' => $request->get('status')]);
        if ($update) {
            return  $update;
        } else {
            return 0;
        }
    }

    public function deleteuser(Request $request)
    {
        $update = DB::table('users')->where('id', $request->get('userid'))->delete();
        if ($update) {
            return  $update;
        } else {
            return 0;
        }
    }


    public function getAllcountry()
    {
        $countries = DB::table('countries')->get();
        return response()->json($countries);
    }


    public function getallStatebycountry($countrycode)
    {
        $states = DB::table('states')->where('country_id', $countrycode)->get();
        return response()->json($states);
    }

    public function getallCitybystate($stateid)
    {
        $cities = DB::table('cities')->where('state_id', $stateid)->get();
        return response()->json($cities);
    }

}
