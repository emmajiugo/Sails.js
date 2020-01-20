<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Traits\SchoolBase;
use App\Traits\PaymentGateway;

//Bring in Models
use App\School;
use App\Session;
use App\Feetype;
use App\Feesetup;
use App\Feesbreakdown;

class SetupFeesController extends Controller
{
    use SchoolBase; use PaymentGateway;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:school');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get school_detail_id & user relationship
        $id = auth()->user()->id;
        $school = $this->getSchoolInUsed($id);

        if($school) {
            // get schools tied to the account & banks list
            $schools = $this->getSchoolsForTheAccount($id);
            $banknames = $this->getListOfBanks();

            //get the verification status
            $verifyStatus = $school->verifystatus;

            //get all academic sessions
            $sessiondetails = $this->getSessionDetails();

            //get fees collected by the school
            $fees = Feetype::where([
                ['school_detail_id', '=', $school->id],
                ['del_status', '=', 0],
            ])->get();

            //set in array
            $data = array(
                'schools' => $schools,
                'banknames' => $banknames,
                'sessiondetails' => $sessiondetails,
                'fees' => $fees,
                'verify_status' => $verifyStatus,
            );

            //return the view setup-fees.blade.php
            return view('school.setup-fees')->with($data);

        } else {
            return redirect(route('school.dashboard'));
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //for fees collected by schools
        if ($request->formtype == 'fees collected')
        {
            //get user
            $id = auth()->user()->id;

            //validate data
            $this->validate($request, [
                'feetype.*' => 'required',
            ]);

            //get input values
            $feetypes = $request->feetype;

            //loop through fee types
            foreach ($feetypes as $feetype) {

                //insert into feetypes table
                $this->insertFeeTypes($feetype, $id);
            }

            return back()->with('success', 'Fees collected was successfully saved.');
        }

        //for fee setup
        if ($request->formtype == 'setup fees')
        {
            //validate data
            $this->validate($request, [
                'section' => 'required',
                'session' => 'required',
                'term' => 'required',
                'feename' => 'required',
                'description.*' => 'required',
                'amount.*' => 'required',
                'classes' => 'required',
            ]);

            //get input values
            $section_name = $request->input('section');
            $session_name = $request->input('session');
            $termname = $request->input('term');
            $feename = $request->input('feename');
            $classes = $request->input('classes');
            $descriptions = $request->input('description');
            $amounts = $request->input('amount');

            //make sure at least one class is checked
            if (!empty($classes)) {

                //get school_detail_id
                $id = auth()->user()->id;

                //loop through the classes
                foreach ($classes as $classname) {
                    //insert into feesetup table and return last inserted id
                    $feesetupid = $this->insertFeeSetup($id, $section_name, $session_name, $termname, $classname, $feename);

                    //loop throup the breakdown fees for each class
                    foreach ($descriptions as $key => $desc) {
                        $descriptiontitle = $desc;
                        $amountvalue = $amounts[$key];

                        //insert into fee_breadown tbl
                        $this->insertFeeBreakdown($feesetupid, $descriptiontitle, $amountvalue);
                    }

                }

                return redirect('/school/setup-fees')->with('success', 'Fees created successfully for each classes.');

            } else {
                return redirect('/school/setup-fees')->with('error', 'You need to select at least one class that has the fee structure!');
            }
        }
    }

    /**
     * Other functions performing some activities
     * this is to keep the code clean
     */

    //get the sessions from the session tbl
    public function getSessionDetails()
    {

        $session = Session::all();
        return $session;
    }

    //class table
    public function insertFeeSetup($id, $section_name, $session_name, $termname, $classname, $feename)
    {
        //insert
        $fees = new Feesetup;
        $fees->school_detail_id = $id;
        $fees->section = $section_name;
        $fees->session = $session_name;
        $fees->term = $termname;
        $fees->class = $classname;
        $fees->feetype_id = $feename;
        $fees->save();

        return $fees->id;
    }

    //fee_breadown tbl
    public function insertFeeBreakdown($feesetupid, $descriptiontitle, $amountvalue)
    {
        //insert
        $this->insertFeeBreakdownTrait($feesetupid, $descriptiontitle, $amountvalue);
    }

    //fee type ie fees collected by the school
    public function insertFeeTypes($feetype, $id)
    {
        //insert
        $fees = new Feetype;
        $fees->school_detail_id = $id;
        $fees->feename = $feetype;
        $fees->save();
    }
}
