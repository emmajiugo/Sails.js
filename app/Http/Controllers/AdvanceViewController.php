<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\SchoolBase;
use App\Traits\PaymentGateway;

//Bring in Models
use App\User;
use App\Session;
use App\Feetype;
use App\Feesetup;
use App\Feesbreakdown;

class AdvanceViewController extends Controller
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
        //get user_id & user
        $id = auth()->user()->id;
        $feesetup = Feesetup::orderBy('class', 'desc')->where('school_detail_id', $id)->get();

        // return schools tied to this account
        $schools = $this->getSchoolsForTheAccount($id);
        // get list of banks
        $banknames = $this->getListOfBanks();

        return view('school.advance-view')->with(['feesetup'=>$feesetup, 'schools'=>$schools, 'banknames' => $banknames]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete feesbreakdown associated with this id
        Feesbreakdown::where('feesetup_id', $id)->delete();

        //delete this
        $feesetup = Feesetup::find($id);
        $feesetup->delete();

        return redirect()->back()->with('success', 'Record Removed!.');
    }
}
