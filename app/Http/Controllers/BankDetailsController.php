<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BankDetailsController extends Controller
{

    //get account name  from paystack
    public function getAcctName(Request $request)
    {
        //get data passed
        $bankcode = $request->bankcode;
        $acctno = $request->acctno;

        //curl verification
        $result = array();
        //url to pull banks
        $url = 'https://api.paystack.co/bank/resolve?account_number='.$acctno.'&bank_code='.$bankcode;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt(
        $ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer sk_test_f6eb701b8147f37248dbd8c0a5e467ab66a551c0']
        );
        $request = curl_exec($ch);
        curl_close($ch);

        if ($request) {
            $result = json_decode($request, true);
            if($result['data']){
                //something came in
                return $result['data'];
            }
        }
    }
}
