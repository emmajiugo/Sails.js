<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WebSettings;

class FrontEndController extends Controller
{

    /**
     * NOTE: Data sent to the front pages are coming form App\Http\ViewComposers
     */

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
