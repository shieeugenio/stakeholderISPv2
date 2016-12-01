<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Trainings;
use App\Http\Requests;


class TrainingController extends Controller
{
    public function index()
    {
    	$info= DB::table('Trainings')->get();
    	return view('maintenance/trainingsample')->with('info', $info);
    }


    public function trainingcrud(Request $req)
    {
    	$callId = $req->callId;
    	
    	if($callId==1)
    	{
	    	$training = new Trainings();
	    	$training->trainingname = $req->tname;
	    	$training->startdate = $req->startdate;
	    	$training->enddate = $req->enddate;
	    	$training->location = $req->location;
	    	$training->organizer = $req->organizer;
	    	$training->starttime = $req->starttime;
	    	$training->endtime = $req->endtime;
	    	$training->trainingtype = $req->trainingtype;
	    	$training->save();
    	}
    	
    	if($callId==2)
    	{
	    	$id = $req->id;
	    	$training = Trainings::find($id);
	    	return $training;
    	}

    	if($callId==3)
    	{
    		$id = $req->id;
    		$training = Trainings::find($id);
	    	$training->trainingname = $req->tname;
	    	$training->startdate = $req->startdate;
	    	$training->enddate = $req->enddate;
	    	$training->location = $req->location;
	    	$training->organizer = $req->organizer;
	    	$training->starttime = $req->starttime;
	    	$training->endtime = $req->endtime;
	    	$training->trainingtype = $req->trainingtype;
	    	$training->save();
    	}

    }


}
