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

    private $userId;
    private $schoolActivated;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:school');

        //get school_detail_id & user relationship
        $this->middleware(function ($request, $next) {
            $this->userId = auth()->user()->id;
            $this->schoolActivated = $this->getSchoolInUsed($this->userId);

            return $next($request);
        });

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if($this->schoolActivated) {

            // get schools tied to the account & banks list
            $feesetup = Feesetup::orderBy('created_at', 'desc')->where('school_detail_id', $this->schoolActivated->id)->paginate(10);

            // return schools tied to this account
            $schools = $this->getSchoolsForTheAccount($this->userId);
            // get list of banks
            $banknames = $this->getListOfBanks();

            return view('school.advance-view')->with(['feesetup'=>$feesetup, 'schools'=>$schools, 'banknames' => $banknames]);

        } else {
            return redirect(route('school.dashboard'));
        }

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
