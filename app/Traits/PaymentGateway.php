<?php
namespace App\Traits;

use App\Traits\HttpRequest;

trait PaymentGateway
{
    use HttpRequest;

    private $baseUrl = "https://api.flutterwave.com/v3/";

    public function getListOfBanks()
    {
        $result = array();

        try {
            $url = $this->baseUrl . 'banks/NG';

            $response = $this->get($url);

            $bankDetails = json_decode($response, true)['data'];

            $banks = array();

            foreach($bankDetails as $bank) {
                $banks[$bank['code']] = $bank['name'];
            }

            return $banks;

        } catch (\Throwable $th) {
            return array();
        }
    }

    public function accountResolve(array $data)
    {
        try {
            $url = $this->baseUrl . "accounts/resolve";

            $response = $this->post($url, $data);

            return json_decode($response, true);

        } catch (\Throwable $th) {
            return ["status" => "error", "message" => "Error: account number could not be validated.", "data" => null];
        }
    }

    public function flutterwaveCheckoutForm(array $data)
    {
        try {
            $url = $this->baseUrl . "payments";

            $payload = [
                "tx_ref" => $data['reference'],
                "amount" => $data['amount'],
                "currency" => "NGN",
                "redirect_url" => request()->root() . "/home/callback",
                "payment_options" => "card",
                "customer" => [
                    "email" => $data['email'],
                    "phonenumber" => $data['user_phone'],
                    "name" => $data['user_name']
                ],
                "customizations" => [
                    "title" => "Skooleo",
                    "description" => "Tuition Fee Payment",
                ]
            ];

            $response = $this->post($url, $payload);

            return json_decode($response, true);

        } catch (\Throwable $th) {
            return ["status"=>"error", "message"=>"An error occurred. Please contact support."];
        }
    }

    public function flutterwaveVerifyTransaction($transactionId)
    {
        try {
            $url = $this->baseUrl . "transactions/" .$transactionId. "/verify";

            $response = $this->get($url);

            return json_decode($response, true);

        } catch (\Throwable $th) {
            return ["status"=>"error", "message"=>"An error occurred. Please contact support."];
        }
    }

    public function flutterwaveTransfer(array $data) {
        try {
            $url = $this->baseUrl . "transfers";

            $response = $this->post($url, $data);

            return json_decode($response, true);

        } catch (\Throwable $th) {
            return ["status"=>"error", "message"=>"Transfer creation failed"];
        }
    }
}


