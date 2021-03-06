<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\Lecturer;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class LecturerController extends Controller
{
    //
    public function index()
    {
    	$lecturer = DB::table('Lecturer')->get();
    	return view('transaction/lecturer')->with('lecturer',$lecturer);
    }

    public function lectcrud(Request $Request)
    {
    	$callId = $req->callId;

    	if($callId==1)
    	{
    		for($i=0;$i<$req->lecturer.length();$i++){
	    		$lecturer = new Lecturer;
	    		$lecturer->lecturername = $req->lecturer;
	    		$lecturer->save();
    		}
    	}

    	if($callId==2)
    	{
    		$id = $req->id;
    		$speaker = Lecturer::find($id);
    		return $speaker;
    	}

    	if($callId==3)
    	{
    		$id = $req->id;
    		$lecturer = Lecturer::find($id);
    		$lecturer->lecturername = $req->lecturer;
    		$lecturer->save();	
    	}
    }
}
