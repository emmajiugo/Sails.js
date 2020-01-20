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
}


