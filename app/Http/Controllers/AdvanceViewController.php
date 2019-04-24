<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Bring in Models
use App\User;
use App\Session;
use App\Feetype;
use App\Feesetup;
use App\Feesbreakdown;

class AdvanceViewController extends Controller
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
        //get user_id & user
        $userid = auth()->user()->id;
        $feesetup = Feesetup::orderBy('class', 'desc')->where('user_id', $userid)->get();
        
        return view('dashboard.advance-view')->with('feesetup', $feesetup);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete feesbreakdown associated with this id
        Feesbreakdown::where('feesetup_id', $id)->delete();

        //delete this
        $feesetup = Feesetup::find($id);
        $feesetup->delete();

        return redirect()->back()->with('success', 'Record Removed!.');
    }
}
