<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

use App\School;

class SchoolRegisterController extends Controller
{

    // register the school
    public function register(Request $request)
    {

        // validate the request
        $this->validate($request, [
            'email' => 'required|string|email|max:255|unique:schools',
            'password' => 'required|string|min:6|confirmed'
        ]);

        // insert record into tbl
        $school = new School;
        $school->email = $request->email;
        $school->password = Hash::make($request->password);
        $school->save();

        return redirect(route('auth.schools'))->with('success', 'Registration successful. Please login.');

    }
}
