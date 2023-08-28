<?php

namespace App\Traits;

trait ExternalRequests
{
    public function fetch(array $queryParams)
    {
        $baseUrl = 'https://postback-sms.com/api/';
        $url = $baseUrl
            .'?token='
            .$_ENV['POSTBACK_SMS_API']
            .'&'
            . http_build_query($queryParams);

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);

        if ($response === false) {
            // Handle cURL error
            $error = curl_error($ch);
        }

        curl_close($ch);

        return $response;
    }
}
