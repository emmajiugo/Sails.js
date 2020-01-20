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

class ViewSetupsController extends Controller
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
     * The section (ie secondary, primary, nursery or creche is being passed also)
     *
     * @return \Illuminate\Http\Response
     */
    public function index($section)
    {

        //get school_id & user
        $id = auth()->user()->id;
        $school = $this->getSchoolInUsed($id);

        if($school) {
            // get schools tied to the account & banks list
            $schools = $this->getSchoolsForTheAccount($id);
            $banknames = $this->getListOfBanks();

            //get all academic sessions
            $sessiondetails = $this->getSessionDetails();

            //get fees collected by the user
            // $fees = $user->feetype;
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
                'section' => $section
            );

            return view('school.view-setup')->with($data);
        } else {
            return redirect(route('school.dashboard'));
        }
    }

    /**
     * searches for the given fields and
     * populates for viewing and editting
     */
    public function search(Request $request)
    {
        //validate data
        $this->validate($request, [
            'section' => 'required',
            'session' => 'required',
            'term' => 'required',
            'feename' => 'required',
            'classes' => 'required',
        ]);

        //get school_id
        $id = auth()->user()->id;
        $school = $this->getSchoolInUsed($id);

        //initialize input
        $sectionname = $request->input('section');
        $sessioname = $request->input('session');
        $termname = $request->input('term');
        $feename = $request->input('feename');
        $classes = $request->input('classes');

        //query
        $feesetup = Feesetup::where([
            'school_detail_id' => $school->id,
            'section' => $sectionname,
            'session' => $sessioname,
            'term' => $termname,
            'class' => $classes,
            'feetype_id' => $feename
        ])->first();

        if ($feesetup) {
            //get the breakdown for that fee section
            $feesetupid = $feesetup->id;
            $feebreakdown = Feesbreakdown::where('feesetup_id', $feesetupid)->get();

            //initialize an array
            $data = array(
                'feesetup' => $feesetup,
                'feebreakdown' => $feebreakdown
            );

            return redirect('/school/view-setup/'.strtolower($sectionname))->withInput()->with(['feesetup' => $feesetup, 'feebreakdown' => $feebreakdown]);
        } else {
            return back()->withInput()->with('error', 'No data found for the search index!');
        }
    }

    /**
     * update the table
     */
    public function update(Request $request, $id)
    {
        //check if the update passed is for feesetup
        if($request->input('type') == 'feesetup') {
            //validate data
            $this->validate($request, [
                'section' => 'required',
                'session' => 'required',
                'term' => 'required',
                'feename' => 'required',
                'classes' => 'required',
            ]);

            //update this
            $fees = Feesetup::find($id);
            $fees->section = $request->input('section');
            $fees->session = $request->input('session');
            $fees->term = $request->input('term');
            $fees->class = $request->input('classes');
            $fees->feetype_id = $request->input('feename');
            $fees->save();

            return redirect()->back()->withInput()->with('success', 'Updated successfully.');
        }

        //check if the update passed is for feesbreakdown
        if($request->input('type') == 'feesbreakdown') {
            //validate data
            $this->validate($request, [
                'description' => 'required',
                'amount' => 'required',
            ]);

            //update this
            $fees = Feesbreakdown::find($id);
            $fees->description = $request->input('description');
            $fees->amount = $request->input('amount');
            $fees->save();

            return redirect()->back()->with('success', 'Updated successfully.');
        }
    }

    /**
     * add fees breakdown to the matching feesetup field
     */
    public function addbreakdown(Request $request)
    {
        //validate data
        $this->validate($request, [
            'description.*' => 'required',
            'amount.*' => 'required',
        ]);

        //initialize values
        $feesetupid = $request->input('feesetup');
        $descriptions = $request->input('description');
        $amounts = $request->input('amount');

        //loop throup the breakdown fees for each class
        foreach ($descriptions as $key => $desc) {
            $descriptiontitle = $desc;
            $amountvalue = $amounts[$key];

            //insert into fee_breadown tbl from the method in SetupFeesController
            $this->insertFeeBreakdownTrait($feesetupid, $descriptiontitle, $amountvalue);
        }

        return redirect()->back()->with('success', 'Record added successfully.');

        //$some_return_value = General::insertFeeBreakdown($feesetupid, $descriptiontitle, $amountvalue);
    }

    /**
     * Remove record from the feesbreakdowns table
     */
    public function destroy($id)
    {
        //delete this
        $feesbreakdown = Feesbreakdown::find($id);
        $feesbreakdown->delete();

        return redirect()->back()->with('success', 'Record Removed!.');
    }

    //get the sessions from the session tbl
    public function getSessionDetails()
    {

        $session = Session::all();
        return $session;
    }
}
