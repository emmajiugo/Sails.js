<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\SchoolDetail;
use App\Wallet;

class SchoolDetailsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:school');
    }

    public function create(Request $request)
    {

        //validate input
        $this->validate($request, [
            'schoolname' => 'required',
            'schooladdr' => 'required',
            'schoolphone' => 'required',
            'schoolemail' => 'required',
            'registeredby' => 'required',
            'registrarstatus' => 'required',
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

        $schoolid = auth()->user()->id;

        //get the USED account and switch is_used=0
        $school = SchoolDetail::where([
            ['school_id', '=', $schoolid],
            ['is_used', '=', 1],
        ])->first();

        if ($school) {
            $school->is_used = 0;
            $school->save();
        }

        $schoolDetails = new SchoolDetail;
        $schoolDetails->school_id = $schoolid;
        $schoolDetails->schoolname = $request->schoolname;
        $schoolDetails->schooladdress = $request->schooladdr;;
        $schoolDetails->schoolphone = $request->schoolphone;;
        $schoolDetails->schoolemail = $request->schoolemail;;
        $schoolDetails->registeredby = $request->registeredby;;
        $schoolDetails->registrarstatus = $request->registrarstatus;
        $schoolDetails->corporate_acctname = $request->acctname;
        $schoolDetails->corporate_acctno = $request->acctno;
        $schoolDetails->bankname = $request->bankname;
        $schoolDetails->govt_doc = $filenameToStore;
        $schoolDetails->is_used = 1;
        $schoolDetails->save();

        if($schoolDetails->id) {

            // create new wallet for school
            $wallet = new Wallet;
            $wallet->school_detail_id = $schoolDetails->id;
            $wallet->save();

            return back()->with('success', 'Account created successfully');
        }
    }

    public function switch(Request $request)
    {
        //get the USED account and switch is_used=0
        $school = SchoolDetail::where([
            ['school_id', '=', $request->accountid],
            ['is_used', '=', 1],
        ])->first();
        $school->is_used = 0;
        $school->save();

        // switch to the new account
        $newSwitch = SchoolDetail::find($request->schooldetailsid);
        $newSwitch->is_used = 1;
        $newSwitch->save();

        if($newSwitch) {
            return back()->with('success', 'Account switched');
        }
    }
}
