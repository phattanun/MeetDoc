<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Http\Requests;
use Mockery\CountValidator\Exception;

define('APPLICATION_NAME', 'MeetDocPlus');
define('CREDENTIALS_PATH', base_path('.credentials/gmail_credential.json'));
define('CLIENT_SECRET_PATH', base_path('gmail_secret.json'));
define('SCOPES', implode(' ', array(\Google_Service_Gmail::GMAIL_SEND)));

class MessageController extends Controller
{
//    public function send_sms(Request $request)
//    {
//
//
//        $SMS = \Config::get('app.SMS');
//
//        $fields = array(
//            'key' => $SMS['sms_api_key'],
//            'secret' => $SMS['sms_api_secret'],
//            'phone' => $request->receive_phone_number,
//            'message' => $request->sms_text
//        );
//
//        $postvars = '';
//        $sep = '';
//
//        foreach ($fields as $key => $value) {
//            $postvars .= $sep . urlencode($key) . '=' . urlencode($value);
//            $sep = '&';
//        }
//
//        try {
//            $ch = curl_init();
//            curl_setopt($ch, CURLOPT_URL, $SMS['sms_url']);
//            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
//            curl_setopt($ch, CURLOPT_POST, count($fields));
//            curl_setopt($ch, CURLOPT_POSTFIELDS, $postvars);
//            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//
//            $result = json_decode(curl_exec($ch), true);
//
//            if (array_key_exists('error', $result)) {
//                return false;
//            }
//
//            return true;
//
//        } catch (Exception $e) {
//            trigger_error(sprintf(
//                'Curl failed with error #%d: %s',
//                $e->getCode(), $e->getMessage()),
//                E_USER_ERROR);
//        }
//    }

    private static function send_sms($phone_number, $text)
    {

        $SMS = \Config::get('app.SMS');

        $fields = array(
            'key' => $SMS['sms_api_key'],
            'secret' => $SMS['sms_api_secret'],
            'phone' => $phone_number,
            'message' => $text
        );

        $postvars = '';
        $sep = '';

        foreach ($fields as $key => $value) {
            $postvars .= $sep . urlencode($key) . '=' . urlencode($value);
            $sep = '&';
        }

        try {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $SMS['sms_url']);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
            curl_setopt($ch, CURLOPT_POST, count($fields));
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postvars);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $result = json_decode(curl_exec($ch), true);

//            if (array_key_exists('error', $result)) {
//                return false;
//            }

            return true;

        } catch (Exception $e) {
            trigger_error(sprintf(
                'Curl failed with error #%d: %s',
                $e->getCode(), $e->getMessage()),
                E_USER_ERROR);
        }
    }

    public static function send_account_sms($patient_name, $patient_surname, $url, $phone_number, $type)
    {
        $activity_text = '';
        $except_text = '';
        $hospital = \Config::get('app.HOSPITAL');
        $link = url($url);
        switch ($type)
        {
            case 'register':
                $activity_text = 'ชื่อผู้ใช้งานระบบของท่านคือหมายเลขบัตรประจำตัวประชาชนของท่าน';
                $except_text = 'หากท่านไม่ได้ต้องการลงทะเบียน';
                break;
            case 'password':
                $activity_text = 'ท่านได้เลือกการตั้งค่ารหัสผ่านใหม่จากบัญชีผู้ใช้งานของท่าน';
                $except_text = 'หากท่านไม่ได้ต้องการตั้งค่ารหัสผ่านใหม่';
                break;
            case 'edit_profile':
                $activity_text = 'ท่านได้แก้ไขข้อมูลส่วนตัวจากบัญชีผู้ใช้งานของท่าน';
                $except_text = 'หากท่านไม่ต้องการแก้ไขข้อมูลส่วนตัว';
                break;
        }
        $sending_text = 'ส่งมาจาก: ' . $hospital['hospital_phone_number'] . PHP_EOL . PHP_EOL .
            'เรียนคุณ: ' . $patient_name . ' ' . $patient_surname . PHP_EOL . PHP_EOL .
            'ตามที่ท่านได้ลงทะเบียนข้อมูลกับโรงพยาบาล' . $hospital['hospital_name']. PHP_EOL . PHP_EOL .
             $activity_text . PHP_EOL . PHP_EOL .
            'กรุณากดลิงก์นี้ภายใน 1 วัน เพื่อยืนยันการลงทะเบียน' . PHP_EOL . PHP_EOL .
            $link . PHP_EOL . PHP_EOL .
            $except_text . ' ท่านไม่จำเป็นต้องสนใจข้อความใน SMS นี้' . PHP_EOL . PHP_EOL .
            'ขอบคุณที่ลงทะเบียนข้อมูลกับทางโรงพยาบาลค่ะ'. PHP_EOL . PHP_EOL .
            'โรงพยาบาล ' . $hospital['hospital_name'] . ' ' . $hospital['hospital_phone_number'];

//        dd($sending_text);
        self::send_sms($phone_number, $sending_text);
    }

    public static function send_appointment_sms($patient_name, $patient_surname, $appointment_id, $doctor_name, $doctor_surname, $department, $symptom, $time, $url, $phone_number, $type)
    {
        $notify = '';
        $activity_text = '';
        $except_text = '';
        $hospital = \Config::get('app.HOSPITAL');
        $link = url($url);
        switch($type)
        {
            case 'create':
                $activity_text = 'นัดหมาย';
                $except_text = 'ยืนยันการนัดหมาย';
                break;
            case 'patient_edit':
                $activity_text = 'แก้ไขนัดหมาย';
                $except_text = 'ยืนยันการแก้ไช';
                break;
            case 'cancel':
                $activity_text = 'ยกเลิกนัดหมาย';
                $except_text = 'ยกเลิกการนัดหมาย';
                break;
            case 'notify':
                $notify = 'ตามที่';
                $activity_text = 'นัดหมาย';
                $except_text = '';
                break;
            case 'doctor_edit':
                $notify = 'ตามที่';
                $activity_text = 'นัดหมาย';
                break;
        }

        $sending_text = 'ส่งมาจาก: ' . $hospital['hospital_phone_number'] . PHP_EOL . PHP_EOL .
            'เรียนคุณ: ' . $patient_name . ' ' . $patient_surname . PHP_EOL . PHP_EOL;

        if($type == 'notify' || $type == 'doctor_edit')
        {
            $sending_text = $sending_text . 'ตามที่ท่านได้ทำการ' . $activity_text . 'กับทางโรงพยาบาล ' . $hospital['hospital_name'] . PHP_EOL . PHP_EOL;
        }
        else if($type == 'create' || $type == 'patient_edit' || $type == 'cancel')
        {
            $sending_text = $sending_text . 'ท่านได้ทำการ' . $activity_text . 'กับทางโรงพยาบาล ' . $hospital['hospital_name'] . ' ดังนี้ ' . PHP_EOL . PHP_EOL;
        }

        if($type == 'doctor_edit')
        {
            $sending_text = $sending_text .
                'เนื่องจากแพทย์ยกเลิกการออกตรวจในวัน-เวลาดังกล่าว' . PHP_EOL . PHP_EOL .
                'การนัดหมายของท่านถูกเลื่อนเวลาออกไปเป็นดังนี้ค่ะ' . PHP_EOL . PHP_EOL;
        }
        else if($type == 'notify')
        {
            $sending_text = $sending_text .
                'การนัดหมายของท่านกำลังจะมาถึงในอีก 1 วันค่ะ' . PHP_EOL;
        }

        $sending_text = $sending_text .
            'หมายเลขการนัดหมาย: ' . $appointment_id . PHP_EOL . PHP_EOL .
            'ชื่อผู้ป่วย: ' . $patient_name . ' ' . $patient_surname . PHP_EOL . PHP_EOL .
            'แพทย์: ' . $doctor_name . ' ' . $doctor_surname . PHP_EOL . PHP_EOL .
            'แผนก: ' . $department . PHP_EOL . PHP_EOL .
            'วัน-เวลา: ' . $time . PHP_EOL . PHP_EOL .
            'อาการ: ' . $symptom . PHP_EOL . PHP_EOL;

        if ($type == 'create' || $type == 'patient_edit' || $type == 'cancel') {
            $sending_text = $sending_text .
                'กรุณากดลิงก์นี้ภายใน 1 วัน เพื่อยืนยันการลงทะเบียน' . PHP_EOL . PHP_EOL .
            $link . PHP_EOL . PHP_EOL .
            'หากท่านไม่ต้องการ' . $except_text . ' ท่านไม่จำเป็นต้องสนใจข้อความใน SMS นี้' . PHP_EOL . PHP_EOL;
        }
        else if($type == 'doctor_edit')
        {
            $sending_text = $sending_text . 'หากท่านไม่สะดวก สามารถแก้ไขข้อมูลการนัดหมายได้ที่' . PHP_EOL . PHP_EOL .
                $url . PHP_EOL . PHP_EOL;
        }
        else if($type == 'notify')
        {
            $sending_text = $sending_text . 'ท่านสามารถแก้ไขข้อมูลการนัดหมายได้ที่' . PHP_EOL . PHP_EOL .
                $url . PHP_EOL . PHP_EOL;
        }

        $sending_text = $sending_text . 'ขอบคุณที่ลงทะเบียนข้อมูลกับทางโรงพยาบาลค่ะ' . PHP_EOL . PHP_EOL .
            'โรงพยาบาล ' . $hospital['hospital_name'] . ' ' . $hospital['hospital_phone_number'];

//        dd($sending_text);
        self::send_sms($phone_number, $sending_text);
    }

    private static function sendEmail($email, $subject, $message_html, $message_text) {
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
        $mail->addAddress($email, 'Name Surname');
        $mail->Subject = $subject;
        $mail->Body = $message_html;
        $mail->AltBody = $message_text; // Must have to send html mail.
        $mail->preSend();

        function urlsafe_b64encode($string)
        {
            $data = base64_encode($string);
            $data = str_replace(array('+', '/', '='), array('-', '_', ''), $data);
            return $data;
        }

        $message_object->setRaw(urlsafe_b64encode($mail->getSentMIMEMessage()));
        try {
            $service->users_messages->send("me", $message_object);
        } catch (Exception $e) {
            print 'An error occurred: ' . $e->getMessage();
        }
    }

    private static $hospital="แห่งหนึ่ง";
    private static $hospital_phone="02-xxx-xxxx";

    public static function sendRegister($res) {
        $subject = "[MeetDoc⁺] กรุณายืนยันการลงทะเบียน ระบบโรงพยาบาล".self::$hospital;
        $message =
            "<b>เรียนคุณ ".$res['name']." ".$res['surname']."</b><br>
            <br>
            ตามที่ท่านได้ลงทะเบียนข้อมูลกับโรงพยาบาล".self::$hospital."<br>
            ชื่อผู้ใช้งานระบบของท่านคือ หมายเลขบัตรประจำตัวประชาชนของท่าน <br>
            <b>กรุณากดลิงก์นี้ภายใน 1 วัน เพื่อยืนยันการลงทะเบียน</b><br>
            <br>
            <a href='".url($res['link'])."'>คลิกเพื่อยืนยันการลงทะเบียน</a><br>
            <br>
            หากท่านไม่ได้ต้องการลงทะเบียน ท่านไม่จำเป็นต้องสนใจข้อความในอีเมลนี้<br>
            <br>
            ขอบคุณที่ลงทะเบียนข้อมูลกับทางโรงพยาบาลค่ะ<br>
            โรงพยาบาล".self::$hospital." ".self::$hospital_phone;
        self::sendEmail($res['email'], $subject, $message, $message);
        if(\Config::get('app.sms_enable')) {
            self::send_account_sms($res['name'], $res['surname'], $res['link'], $res['phone_number'], 'register');
        }
    }

    public static function sendForget($res) {
        $subject = "[MeetDoc⁺] กรุณายืนยันการตั้งค่ารหัสผ่านใหม่ ระบบโรงพยาบาล".self::$hospital;
        $message =
            "<b>เรียนคุณ ".$res['name']." ".$res['surname']."</b><br>
            <br>
            ตามที่ท่านได้ลงทะเบียนข้อมูลกับโรงพยาบาล".self::$hospital."<br>
            ท่านได้เลือกการตั้งค่ารหัสผ่านใหม่จากบัญชีผู้ใช้งานของท่าน<br>
            <b>กรุณากดลิงก์นี้ภายใน 1 วัน เพื่อยืนยันการตั้งค่ารหัสผ่านใหม่</b><br>
            <br>
            <a href='".url($res['link'])."'>คลิกเพื่อยืนยันการตั้งค่ารหัสผ่านใหม่</a><br>
            <br>
            หากท่านไม่ได้ต้องการตั้งค่ารหัสผ่านใหม่ ท่านไม่จำเป็นต้องสนใจข้อความในอีเมลนี้<br>
            <br>
            ขอบคุณที่ใช้บริการระบบของโรงพยาบาลค่ะ<br>
            โรงพยาบาล".self::$hospital." ".self::$hospital_phone;
        self::sendEmail($res['email'], $subject, $message, $message);
        if(\Config::get('app.sms_enable')) {
            self::send_account_sms($res['name'], $res['surname'], $res['link'], $res['phone_number'], 'password');
        }
    }

    public static function sendCreateAppoinment($res) {
        $subject = "[MeetDoc⁺] กรุณายืนยันการนัดหมาย ระบบโรงพยาบาล".self::$hospital;
        $message =
            "<b>เรียนคุณ ".$res['p_name']." ".$res['p_surname']."</b><br>
            <br>
            ท่านได้ทำการนัดหมายกับทางโรงพยาบาล".self::$hospital." ดังนี้<br>
            หมายเลขการนัดหมาย: ".$res['app_id']."<br>
            ชื่อผู้ป่วย: ".$res['p_name']." ".$res['p_surname']."<br>
            แพทย์: ".$res['d_name']." ".$res['d_surname']."<br>
            <b>แผนก: ".$res['dept']."</b><br>
            <b>วัน-เวลา: ".$res['date']." ".$res['time']."</b><br>
            อาการ: ".$res['symptom']."<br>
            <b>กรุณากดลิงก์นี้ภายใน 1 วัน เพื่อยืนยันการนัดหมาย</b><br>
            <a href='".url($res['link'])."'>คลิกเพื่อยืนยันการนัดหมาย</a><br>
            <br>
            หากท่านไม่ได้ต้องการยืนยันการนัดหมาย ท่านไม่จำเป็นต้องสนใจข้อความในอีเมลนี้<br>
            <br>
            ขอบคุณที่ใช้บริการระบบของโรงพยาบาลค่ะ<br>
            โรงพยาบาล".self::$hospital." ".self::$hospital_phone;
        self::sendEmail($res['email'], $subject, $message, $message);
        if(\Config::get('app.sms_enable')) {
            self::send_appointment_sms($res['p_name'], $res['p_surname'], $res['app_id'], $res['d_name'], $res['d_surname'], $res['dept'], $res['symptom'], $res['time'], $res['link'], $res['phone_number'], 'create');
        }
    }

    public static function sendCancelAppoinment($res) {
        $subject = "[MeetDoc⁺] กรุณายืนยันการยกเลิกการนัดหมาย ระบบโรงพยาบาล".self::$hospital;
        $message =
            "<b>เรียนคุณ ".$res['p_name']." ".$res['p_surname']."</b><br>
            <br>
            ท่านได้ทำการยกเลิกนัดหมายกับทางโรงพยาบาล".self::$hospital." ดังนี้<br>
            หมายเลขการนัดหมาย: ".$res['app_id']."<br>
            ชื่อผู้ป่วย: ".$res['p_name']." ".$res['p_surname']."<br>
            แพทย์: ".$res['d_name']." ".$res['d_surname']."<br>
            <b>แผนก: ".$res['dept']."</b><br>
            <b>วัน-เวลา: ".$res['date']." ".$res['time']."</b><br>
            อาการ: ".$res['symptom']."<br>
            <b>กรุณากดลิงก์นี้ภายใน 1 วัน เพื่อยืนยันการยกเลิกการนัดหมาย</b><br>
            <a href='".url($res['link'])."'>คลิกเพื่อยืนยันการยกเลิกการนัดหมาย</a><br>
            <br>
            หากท่านไม่ต้องการยกเลิกการนัดหมาย ท่านไม่จำเป็นต้องสนใจข้อความในอีเมลนี้<br>
            <br>
            ขอบคุณที่ใช้บริการระบบของโรงพยาบาลค่ะ<br>
            โรงพยาบาล".self::$hospital." ".self::$hospital_phone;
        self::sendEmail($res['email'], $subject, $message, $message);
        if(\Config::get('app.sms_enable')) {
            self::send_appointment_sms($res['p_name'], $res['p_surname'], $res['app_id'], $res['d_name'], $res['d_surname'], $res['dept'], $res['symptom'], $res['time'], $res['link'], $res['phone_number'], 'cancel');
        }
    }

    public static function sendEditProfile($res) {
        $subject = "[MeetDoc⁺] กรุณายืนยันการแก้ไขข้อมูลส่วนตัว ระบบโรงพยาบาล".self::$hospital;
        $message =
            "<b>เรียนคุณ ".$res['name']." ".$res['surname']."</b><br>
            <br>
            ตามที่ท่านได้ลงทะเบียนข้อมูลกับโรงพยาบาล".self::$hospital."<br>
            ท่านได้แก้ไขข้อมูลส่วนตัวจากบัญชีผู้ใช้งานของท่าน<br>
            <b>เมื่อเวลา: ".$res['time']."</b><br>
            <b>กรุณากดลิงก์นี้ภายใน 1 วัน เพื่อยืนยันการแก้ไขข้อมูลส่วนตัว</b><br>
            <a href='".url($res['link'])."'>คลิกเพื่อยืนยันการแก้ไขข้อมูลส่วนตัว</a><br>
            <br>
            หากท่านไม่ต้องการแก้ไขข้อมูลส่วนตัว ท่านไม่จำเป็นต้องสนใจข้อความในอีเมลนี้<br>
            <br>
            ขอบคุณที่ใช้บริการระบบของโรงพยาบาลค่ะ<br>
            โรงพยาบาล".self::$hospital." ".self::$hospital_phone;
        self::sendEmail($res['email'], $subject, $message, $message);
        if(\Config::get('app.sms_enable')) {
            self::send_account_sms($res['name'], $res['surname'], $res['link'], $res['phone_number'], 'edit_profile');
        }
    }

    public static function sendEditAppointment($res) {
        $subject = "[MeetDoc⁺] กรุณายืนยันการแก้ไขการนัดหมาย ระบบโรงพยาบาล".self::$hospital;
        $message =
            "<b>เรียนคุณ ".$res['p_name']." ".$res['p_surname']."</b><br>
            <br>
            ท่านได้ทำการแก้ไขการนัดหมายกับทางโรงพยาบาล".self::$hospital." ดังนี้<br>
            หมายเลขการนัดหมาย: ".$res['app_id']."<br>
            ชื่อผู้ป่วย: ".$res['p_name']." ".$res['p_surname']."<br>
            แพทย์: ".$res['d_name']." ".$res['d_surname']."<br>
            <b>แผนก: ".$res['dept']."</b><br>
            <b>วัน-เวลา: ".$res['date']." ".$res['time']."</b><br>
            อาการ: ".$res['symptom']."<br>
            <b>กรุณากดลิงก์นี้ภายใน 1 วัน เพื่อยืนยันการแก้ไขการนัดหมาย</b><br>
            <a href='".url($res['link'])."'>คลิกเพื่อยืนยันการแก้ไขการนัดหมาย</a><br>
            <br>
            หากท่านไม่ต้องการยืนยันการแก้ไข ท่านไม่จำเป็นต้องสนใจข้อความในอีเมลนี้<br>
            <br>
            ขอบคุณที่ใช้บริการระบบของโรงพยาบาลค่ะ<br>
            โรงพยาบาล".self::$hospital." ".self::$hospital_phone;
        self::sendEmail($res['email'], $subject, $message, $message);
        if(\Config::get('app.sms_enable')) {
            self::send_appointment_sms($res['p_name'], $res['p_surname'], $res['app_id'], $res['d_name'], $res['d_surname'], $res['dept'], $res['symptom'], $res['time'], $res['link'], $res['phone_number'], 'patient_edit');
        }
    }
}
