<?php
namespace App\Traits;

trait PaymentGateway
{

    public function getListOfBanks()
    {
        //curl verification
        $result = array();
        //url to pull banks
        $url = 'https://api.paystack.co/bank';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt(
        $ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer sk_test_f6eb701b8147f37248dbd8c0a5e467ab66a551c0']
        );
        $request = curl_exec($ch);
        curl_close($ch);

        if ($request != null) {
            $result = json_decode($request, true);
            if($result['data']){
                //something came in
                return $result['data'];
            }
        } else {
            return array();
        }
    }

    public function flutterwaveCheckoutForm(object $data, $email)
    {
        $publicKey = env('FLUTTERWAVE_PUBLIC_KEY');

        //set reference passed
        if($data->type == "multiple") {
            $reference = implode("_", unserialize($data->invoice_reference));
        } else {
            $reference = $data->invoice_reference;
        }

        $url = "https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/hosted/pay";

        $client = new \GuzzleHttp\Client();
        $res = $client->request('POST', $url, [
            'headers' => [
                'Content-Type'  => 'application/json'
            ],
            'json' => [
                "PBFPubKey" => $publicKey,
                "currency" => "NGN",
                "payment_options" => "card",
                "txref" => $reference,
                "amount" => $data->grand_total,
                "redirect_url" => request()->root()."/home/callback",
                "customer_email" => $email,
                "customer_phone" => $data->user_phone,
                "customer_firstname" => $data->user_name,
                "custom_title" => $data->school,
            ]
        ]);
        $response = $res->getBody();

        return json_decode($response, true);
    }

    public function flutterwaveVerifyTransaction($txref)
    {
        $secretKey = env('FLUTTERWAVE_SECRET_KEY');

        $url = "https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/verify";

        $client = new \GuzzleHttp\Client();
        $res = $client->request('POST', $url, [
            'headers' => [
                'Content-Type'  => 'application/json'
            ],
            'json' => [
                "SECKEY" => $secretKey,
                "txref" => $txref,
            ]
        ]);
        $response = $res->getBody();

        return json_decode($response, true);
    }

    // $client = new \GuzzleHttp\Client();
    // $res = $client->request('GET', $url, ['headers' => [
    //     'Authorization' => strtoupper($hashValue),
    //     'email'         => $email
    // ]]);
    // $statusCode = $res->getStatusCode();
    // $response = $res->getBody();
}


