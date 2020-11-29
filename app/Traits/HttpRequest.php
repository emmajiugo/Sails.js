<?php
namespace App\Traits;

trait HttpRequest
{
    public function get($url)
    {
        $secretKey = env('FLUTTERWAVE_SECRET_KEY');

        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', $url, [
            'headers' => [
                'Content-Type'  => 'application/json',
                'Authorization' => 'Bearer ' . $secretKey
            ]
        ]);

        return $res->getBody();
    }

    public function post($url, $payload)
    {
        $secretKey = env('FLUTTERWAVE_SECRET_KEY');

        $client = new \GuzzleHttp\Client();
        $res = $client->request('POST', $url, [
            'headers' => [
                'Content-Type'  => 'application/json',
                'Authorization' => 'Bearer ' . $secretKey
            ],
            'json' => $payload
        ]);

        return $res->getBody();
    }
}
