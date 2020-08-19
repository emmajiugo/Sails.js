<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Traits\SchoolBase;
use App\Traits\PaymentGateway;

use App\Feetype;
use App\School;
use App\SchoolDetail;

class FeesCollectedController extends Controller
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
            $schools = $this->getSchoolsForTheAccount($this->userId);
            $bankNames = $this->getListOfBanks();

            //get fees collected
            $fees = Feetype::where([
                ['school_detail_id', '=', $this->schoolActivated->id],
                ['del_status', '=', 0],
            ])->get();

            return view('school.fees-collected')->with(['fees' => $fees, 'schools' => $schools, 'banknames' => $bankNames]);

        } else {
            return redirect(route('school.dashboard'));
        }
    }

    public function update(Request $request, $id)
    {
        //update for fee type
        if ($request->input == 'fees') {
            //validate input
            $this->validate($request, [
                'feename' => 'required',
            ]);

            //update
            $fee = Feetype::find($id);
            $fee->feename = $request->feename;
            $fee->save();

            return back()->with('success', 'Fees updated successfully');
        }

        //update to change del_status column to 1
        if ($request->input == 'delete') {
            //update
            $fee = Feetype::find($id);
            $fee->del_status = '1';
            $fee->save();

            return back()->with('success', 'Record Deleted');
        }

        return back()->with('error', 'You be mumu oooh!!!');
    }
}
