<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Http\Requests;

class MessageController extends Controller
{
    public function send_sms($receive_phone_number, $sms_text){

        $SMS = \Config::get('app.SMS');

        $fields = array(
            'key' => $SMS['sms_api_key'],
            'secret' => $SMS['sms_api_secret'],
            'phone' => $receive_phone_number,
            'message' => $sms_text
        );

        $postvars='';
        $sep='';

        foreach($fields as $key => $value) {
            $postvars.= $sep.urlencode($key).'='.urlencode($value);
            $sep='&';
        }

        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$SMS['sms_url']);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch,CURLOPT_POST,count($fields));
        curl_setopt($ch,CURLOPT_POSTFIELDS,$postvars);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

        $result = json_decode(curl_exec($ch));
        if(array_key_exists('error', $result)){
            return false;
        }

        return true;

    }

    public static function sendEmail(Request $request) {
        var_dump($request->all());
        return Mail::to($request->receiver)->subject($request->subject)->send();
    }
}
