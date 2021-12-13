<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trainer;
use App\Models\News;
class HomeController extends Controller
{
    public function index(){
        $trainers = Trainer::all();
        $news = News::latest()->limit(3)->get();
        return view('home', compact('trainers', 'news'));
    }
    public function faq(){
        return view('faq');
    }
    public function championship(){
        return view('championship');
    }
    public function trainings($age){
        return view('trainings' . $age);
    }

    public function mango()
    {
        $api_key = env("MANGO_API_KEY"); // вставить свой ключ
        $api_salt = env("MANGO_API_SALT"); // вставить свою подпись
        $url = 'https://app.mango-office.ru/vpbx/stats/request';
        $data = array(
            "date_from" => "1481630491",
            "date_to" => "1481734491",
            "from" => array(
                "extension" => "",
                "number" => ""
            ) ,
            "to" => array(
                "extension" => "",
                "number" => ""
            ),
            "fields" => "records,start,finish,answer,from_extension,from_number,to_extension,to_number,disconnect_reason,line_number,location,entry_id"
        );
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
        $response = json_decode (curl_exec($ch));
        curl_close($ch);

        $url_result = 'https://app.mango-office.ru/vpbx/stats/result';
        $data_result = $response;
        $json_result = json_encode($data_result);
        $sign_result = hash('sha256', $api_key . $json_result . $api_salt);
        $post_data_result =array(
            'vpbx_api_key' => $api_key,
            'sign' => $sign_result,
            'json' => $json_result
        );

        $post_result = http_build_query($post_data_result);
        $ch_result = curl_init($url_result);
        curl_setopt($ch_result, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch_result, CURLOPT_POST, 1);
        curl_setopt($ch_result, CURLOPT_POSTFIELDS, $post_result);
        $history_data = curl_exec($ch_result);
        curl_close($ch_result);

        dd($history_data);
        $history_data; // вывести полученную историю
    }

}
