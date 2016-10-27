<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Http\Requests;

define('APPLICATION_NAME', 'MeetDocPlus');
define('CREDENTIALS_PATH', base_path('.credentials/gmail_credential.json'));
define('CLIENT_SECRET_PATH', base_path('gmail_secret.json'));
define('SCOPES', implode(' ', array(\Google_Service_Gmail::GMAIL_SEND)));

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
        $client = new \Google_Client();
        $client->setApplicationName(APPLICATION_NAME);
        $client->setScopes(SCOPES);
        $client->setAuthConfig(CLIENT_SECRET_PATH);
        $client->setAccessType('offline');

        // Load previously authorized credentials from a file.
        $credentialsPath = CREDENTIALS_PATH;
        if (file_exists($credentialsPath)) {
            $accessToken = json_decode(file_get_contents($credentialsPath), true);
        } else {
            echo "Please load the credential file from /gmail_credential.php";
            return;
        }
        $client->setAccessToken($accessToken);
        // Refresh the token if it's expired.
        if ($client->isAccessTokenExpired()) {
            $refreshToken = $client->getRefreshToken();
            $client->refreshToken($refreshToken);
            $newAccessToken = $client->getAccessToken();
            $newAccessToken['refresh_token'] = $refreshToken;
            file_put_contents($credentialsPath, json_encode($newAccessToken));
        }
        $service = new \Google_Service_Gmail($client);
        $user = 'me';

        $message_object = new \Google_Service_Gmail_Message();

        $mail = new \PHPMailer();
        $mail->CharSet = "UTF-8";
        $mail->setFrom('meetdocplus@gmail.com','MeetDocPlus');
        $mail->addAddress($request->email, 'Name Surname');
        $mail->Subject = $request->subject;
        $mail->Body = "<h2>".$request->message."</h2>";
        $mail->AltBody = $request->message; // Must have to send html mail.
        $mail->preSend();

        function urlsafe_b64encode($string) {
            $data = base64_encode($string);
            $data = str_replace(array('+','/','=') , array('-','_','') , $data);
            return $data;
        }

        $message_object->setRaw(urlsafe_b64encode($mail->getSentMIMEMessage()));
        try {
            var_dump($service->users_messages->send("me", $message_object));
        } catch (Exception $e) {
            print 'An error occurred: ' . $e->getMessage();
        }
    }
}
