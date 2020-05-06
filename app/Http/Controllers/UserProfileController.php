<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\User;

class UserProfileController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.profile');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $profile = User::findOrFail(auth()->user()->id);

        //profile update
        if ($request->type == 'profile') {
            //validate
            $this->validate($request, [
                'email' => 'required|email',
                'fullname' => 'required',
                'phone' => 'required|numeric',
            ]);

            //save
            try {

                $profile->fullname = $request->fullname;
                $profile->phone = $request->phone;
                $profile->save();

            } catch (\Throwable $th) {
                // return $th->getMessage();
                return back()->with('error', 'Phone number already exists in our record.');
            }

        }

        //password update
        if ($request->type == 'password') {
            //validate
            $this->validate($request, [
                'password' => 'required|min:6|confirmed'
            ]);

            //update
            $profile->password = Hash::make($request->password);
            $profile->save();
        }

        return back()->with('success', ucwords($request->type).' updated successfully.');
    }
}
