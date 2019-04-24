<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

use App\School;

class SchoolRegisterController extends Controller
{
    // show the register form
    public function showRegisterForm()
    {
        return view('auth.school-register');
    }

    // register the school
    public function register(Request $request)
    {

        // validate the request
        $this->validate($request, [
            'email' => 'required|string|email|max:255|unique:schools',
            'password' => 'required|string|min:6|confirmed',
            'schoolname' => 'required',
            'schooladdr' => 'required',
            'schoolphone' => 'required',
            'schoolemail' => 'required',
            'registeredby' => 'required',
            'registrarstatus' => 'required',
        ]);

        // insert record into tbl
        $school = new School;
        $school->email = $request->email;
        $school->password = Hash::make($request->password);
        $school->schoolname = $request->schoolname;
        $school->schooladdr = $request->schooladdr;
        $school->schoolphone = $request->schoolphone;
        $school->schoolemail = $request->schoolemail;
        $school->registeredby = $request->registeredby;
        $school->registrarstatus = $request->registrarstatus;
        $school->save();

        return redirect(route('school.login'))->with('success', 'Your registration was successful. Please login with your details to get started.');

    }
}
