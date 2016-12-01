<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\Lecturers;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class LecturerController extends Controller
{
    //
    public function index()
    {
    	$lecturer = DB::table('Lecturers')->get();
    	return view('transaction/lecturer')->with('lecturer',$lecturer);
    }

    public function lectcrud(Request $Request)
    {
    	$callId = $req->callId;

    	if($callId==1)
    	{
    		for($i=0;$i<$req->lecturer.length();$i++){
	    		$lecturer = new Lecturers;
	    		$lecturer->lecturername = $req->lecturer;
	    		$lecturer->save();
    		}
    	}

    	if($callId==2)
    	{
    		$id = $req->id;
    		$speaker = Lecturers::find($id);
    		return $speaker;
    	}

    	if($callId==3)
    	{
    		$id = $req->id;
    		$lecturer = Lecturers::find($id);
    		$lecturer->lecturername = $req->lecturer;
    		$lecturer->save();	
    	}
    }
}
