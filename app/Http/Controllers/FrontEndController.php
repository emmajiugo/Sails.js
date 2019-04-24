<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    // return the index age
    public function index()
    {
        return view('index');
    }

    //return the pricing page
    public function pricing()
    {
        return view('pricing');
    }

    //return the contact page
    public function contact()
    {
        return view('contact');
    }
}
