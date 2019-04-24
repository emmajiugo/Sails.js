<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class SchoolLoginController extends Controller
{

    // specify middleware
    public function __construct()
    {
        $this->middleware('guest:school');
    }

    // show login form
    public function showLoginForm()
    {
        return view('auth.school-login');
    }

    // perform actual login
    public function login(Request $request)
    {
        // validate the form data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        // set credentials
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        // attempt to log user in
        if (Auth::guard('school')->attempt($credentials, $request->remember))
        {
            // if successful, then redirect to their intended location
            return redirect()->intended(route('school.dashboard'));
        }        

        // if unsuccessful, then redirect back to login with form data
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }
}
