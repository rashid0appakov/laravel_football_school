<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MangoController extends Controller
{

    public function sms(Request $request, $number){
        $text = $request->text;
        $data = [
            "command_id" => "ID" . rand(10000000,99999999),
            "from_extension" => "107",
            "text" => $text,
            "to_number" => $this->clearNumber($number),
            "sms_sender" => ""
        ];
        $res = $this->send('sms', $data);
    }
    public function call($number){
        $data = [
            "command_id" => "ID" . rand(10000000,99999999),
            "from" => [
                "extension" => "107"
            ],
            "to_number" => $this->clearNumber($number)
        ];
        $res = $this->send('callback', $data);
    }
    private function clearNumber($number){
        return str_replace([' ', '+', '(', ')', '-'], '', $number);
    }
    private function send($method, $data){
        $api_key = env('MANGO_KEY');
        $api_salt = env('MANGO_SALT');
        $url = "https://app.mango-office.ru/vpbx/commands/$method";
        $json = json_encode($data);
        $sign = hash('sha256', $api_key . $json . $api_salt);
        $postdata = array(
            'vpbx_api_key' => $api_key,
            'sign' => $sign,
            'json' => $json
        );
        $post = http_build_query($postdata);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        $response = curl_exec($ch);
        curl_close($ch);
        echo $response;
    }
}
