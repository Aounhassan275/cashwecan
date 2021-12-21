<?php

namespace App\Helpers;


use GuzzleHttp\Client;

class Message
{
    public  static function send($to, $message){
        $client = new Client();
        
        $form_params = [
            'api_token' => '7afe0a191f7fec047682a6c972f6fbaace31522621',
            'api_secret' => 'shafiqahmed91',
            'to' => $to,
            'from' => 'SMS Alert',
            'message' => $message
        ];

        $url = 'https://lifetimesms.com/plain';

        $result = $client->get($url, ['query' => $form_params]);
        $data = $result->getBody();
        echo  $data;

    }


}
