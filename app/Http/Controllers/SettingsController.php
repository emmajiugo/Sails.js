<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Traits\SchoolBase;
use App\Traits\PaymentGateway;

use App\Feetype;

class SettingsController extends Controller
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
        //get school details
        $id = auth()->user()->id;
        $school = $this->getSchoolInUsed($id);

        if($school) {
            // get schools tied to the account & banks list
            $schools = $this->getSchoolsForTheAccount($id);
            $banknames = $this->getListOfBanks();

            //get fees collected
            $fees = Feetype::where([
                ['school_detail_id', '=', $id],
                ['del_status', '=', 0],
            ])->get();

            return view('school.settings')->with(['school' => $school, 'fees' => $fees, 'schools' => $schools, 'banknames' => $banknames]);

        } else {
            return redirect(route('school.dashboard'));
        }
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
        //update for profile
        if ($request->input == 'profile') {
            //validate input
            $this->validate($request, [
                'schooladdr' => 'required',
                'schoolphone' => 'required',
                'schoolemail' => 'required',
            ]);

            //update
            $school = User::find($id);
            $school->schooladdr = $request->schooladdr;
            $school->schoolphone = $request->schoolphone;
            $school->schoolemail = $request->schoolemail;
            $school->save();

            return back()->with('success', 'Updated successfully');
        }

        //update for changing password
        if ($request->input == 'password') {
            //validate input
            $this->validate($request, [
                'newpassword' => 'required|string|min:6',
                'cnewpassword' => 'required',
            ]);

            if ($request->newpassword != $request->cnewpassword) {
                return back()->with('error', 'Passwords do not match.');
            } else {

                //update
                $school = User::find($id);
                $school->password = Hash::make($request->newpassword);
                $school->save();

                return back()->with('success', 'Updated successfully');
            }
        }

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

            return back()->with('success', 'Updated successfully');
        }

        //update to change del_status column to 1
        if ($request->input == 'delete') {
            //update
            $fee = Feetype::find($id);
            $fee->del_status = '1';
            $fee->save();

            return back()->with('success', 'Record Deleted');
        }
    }
}
