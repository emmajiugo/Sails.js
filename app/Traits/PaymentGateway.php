<?php
namespace App\Traits;

trait PaymentGateway
{
    private $baseUrl = "https://api.flutterwave.com/v3/";

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
        try {
            $url = $this->baseUrl . "payments";
            $secretKey = env('FLUTTERWAVE_SECRET_KEY');

            //set reference passed
            if($data->type == "multiple") {
                $reference = implode("_", unserialize($data->invoice_reference));
            } else {
                $reference = $data->invoice_reference;
            }

            $client = new \GuzzleHttp\Client();
            $res = $client->request('POST', $url, [
                'headers' => [
                    'Content-Type'  => 'application/json',
                    'Authorization' => 'Bearer ' . $secretKey
                ],
                'json' => [
                    "tx_ref" => $reference,
                    "amount" => $data->grand_total,
                    "currency" => "NGN",
                    "redirect_url" => request()->root()."/home/callback",
                    "payment_options" => "card",
                    "customer" => [
                        "email" => $email,
                        "phonenumber" => $data->user_phone,
                        "name" => $data->user_name
                    ],
                    "customizations" => [
                        "title" => $data->school,
                        "description" => "Tuition Fee Payment",
                    ]
                ]
            ]);
            $response = $res->getBody();

            return json_decode($response, true);

        } catch (\Throwable $th) {
            return ["status"=>"error", "message"=>"An error occurred. Please contact support."];
        }
    }

    public function flutterwaveVerifyTransaction($transferId)
    {
        try {
            $secretKey = env('FLUTTERWAVE_SECRET_KEY');

            $url = $this->baseUrl . "transactions/" .$transferId. "/verify";

            $client = new \GuzzleHttp\Client();
            $res = $client->request('GET', $url, [
                'headers' => [
                    'Content-Type'  => 'application/json',
                    'Authorization' => 'Bearer ' . $secretKey
                ]
            ]);
            $response = $res->getBody();

            return json_decode($response, true);

        } catch (\Throwable $th) {
            return ["status"=>"error", "message"=>"An error occurred. Please contact support."];
        }
    }

    public function flutterwaveTransfer(array $data) {
        try {
            $url = $this->baseUrl . "transfers";

            $secretKey = env('FLUTTERWAVE_SECRET_KEY');

            $client = new \GuzzleHttp\Client();
            $res = $client->request('POST', $url, [
                'headers' => [
                    'Content-Type'  => 'application/json',
                    'Authorization' => 'Bearer ' . $secretKey
                ],
                'json' => $data
            ]);
            $response = $res->getBody();

            return json_decode($response, true);

        } catch (\Throwable $th) {
            return ["status"=>"error", "message"=>"Transfer creation failed"];
        }
    }
}


