<?php

namespace App\Http\Controllers;

use App\Wallet;

use App\SchoolDetail;
use App\Traits\SchoolBase;
use Illuminate\Http\Request;
use JD\Cloudder\Facades\Cloudder;

class SchoolDetailsController extends Controller
{
    use SchoolBase;

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
            'bankcode' => 'required',
            'acctname' => 'required',
            'acctno' => 'required',
            'govtdoc' => 'required|image|max:1999',
        ]);

        // generate school number
        $schoolNumber = $this->schoolNumber();

        //handle file uploads to Cloudinary
        if ($request->hasFile('govtdoc')) {

            $image_path = $request->file('govtdoc')->getRealPath();
            Cloudder::upload($image_path, $schoolNumber, array("folder" => env('CLOUDINARY_UPLOAD_FOLDER'), "overwrite" => TRUE, "resource_type" => "image"));

            $uploadedUrl = Cloudder::getResult()['url'];
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
        $schoolDetails->school_number = $schoolNumber;
        $schoolDetails->schoolname = $request->schoolname;
        $schoolDetails->schooladdress = $request->schooladdr;;
        $schoolDetails->schoolphone = $request->schoolphone;;
        $schoolDetails->schoolemail = $request->schoolemail;;
        $schoolDetails->registeredby = $request->registeredby;;
        $schoolDetails->registrarstatus = $request->registrarstatus;
        $schoolDetails->corporate_acctname = $request->acctname;
        $schoolDetails->corporate_acctno = $request->acctno;
        $schoolDetails->bankname = strtoupper($request->bankname);
        $schoolDetails->bankcode = $request->bankcode;
        $schoolDetails->govt_doc = $uploadedUrl;
        $schoolDetails->is_used = 1;
        $schoolDetails->save();

        if ($schoolDetails->id) {

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
