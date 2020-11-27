<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public $webSettings;

    public function __construct() {
        $this->middleware(function ($request, $next) {
            $this->webSettings = \App\WebSettings::find(1);

            return $next($request);
        });
    }

    // return the index age
    public function index()
    {
        return view('index')->with('webSettings', $this->webSettings);
    }

    //return the pricing page
    public function pricing()
    {
        return view('pricing')->with('webSettings', $this->webSettings);
    }

    //return the contact page
    public function contact()
    {
        return view('contact')->with('webSettings', $this->webSettings);
    }
}
