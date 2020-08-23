<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Traits\SchoolBase;
use App\Traits\PaymentGateway;

use App\Feetype;
use App\School;
use App\SchoolDetail;

class SettingsController extends Controller
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

            return view('school.settings')->with(['school' => $this->schoolActivated, 'schools' => $schools, 'banknames' => $bankNames]);

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
            $school = SchoolDetail::find($id);
            $school->schooladdress = $request->schooladdr;
            $school->schoolphone = $request->schoolphone;
            $school->schoolemail = $request->schoolemail;
            $school->save();

            return back()->with('success', 'User profile updated successfully.');
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
                $school = School::find($this->userId);
                $school->password = Hash::make($request->newpassword);
                $school->save();

                return back()->with('success', 'Password updated successfully.');
            }
        }
    }
}
