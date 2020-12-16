<?php

namespace App\Http\Controllers;

use App\Traits\PaymentGateway;
use Illuminate\Http\Request;

class BankDetailsController extends Controller
{
    use PaymentGateway;

    public function resolveAccountName(Request $request)
    {
        //get data passed
        $bankcode = $request->bankcode;
        $acctno = $request->acctno;

        $data = [
            "account_number" => $acctno,
            "account_bank" => $bankcode
        ];

        $result = $this->accountResolve($data);

        return $result;

    }
}
