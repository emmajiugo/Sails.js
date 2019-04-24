<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\BankDetail;

class BankDetailsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate
        $this->validate($request, [
            'bankname' => 'required',
            'acctname' => 'required',
            'acctno' => 'required',
            'govtdoc' => 'required|image|max:1999',
        ]);

        //handle file uploads
        if ($request->hasFile('govtdoc')) {
            $filenameWithExt = $request->file('govtdoc')->getClientOriginalName();
            //get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get filename with ext
            $extension = $request->file('govtdoc')->getClientOriginalExtension();
            //file to store
            $filenameToStore = $filename.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('govtdoc')->storeAs('public/govt_docs', $filenameToStore);
        }

        //get user_id
        $userid = auth()->user()->id;

        //insert
        $bank = new BankDetail;
        $bank->user_id = $userid;
        $bank->corporate_acctname = $request->acctname;
        $bank->corporate_acctno = $request->acctno;
        $bank->bankname = $request->bankname;
        $bank->govt_doc = $filenameToStore;
        $bank->save();

        return back()->with('success', 'Saved successfully. You will be contacted within 48hours on your verification status.');
        
    }

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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
