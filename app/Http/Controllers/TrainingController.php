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
    		$count = count($req->tname);
    		for($i=0;$i<$count;$i++){
		    	$training = new Trainings();
		    	$training->trainingname = $req->tname[$i];
		    	$training->startdate = $req->startdate[$i];
		    	$training->enddate = $req->enddate[$i];
		    	$training->location = $req->location[$i];
		    	$training->organizer = $req->organizer[$i];
		    	$training->starttime = $req->starttime[$i];
		    	$training->endtime = $req->endtime[$i];
		    	$training->trainingtype = $req->trainingtype[$i];
		    	$training->save();
	    	}
    	}
    	
    	if($callId==2)
    	{
	    	$id = $req->id;
	    	$training = Trainings::find($id);
	    	return $training;
    	}

    	if($callId==3)
    	{
    		$count = count($req->tname);
    		for($i=0;$i<$count;$i++){
	    		$training = Trainings::find($req->id[$i]);
		    	$training->trainingname = $req->tname[$i];
		    	$training->startdate = $req->startdate[$i];
		    	$training->enddate = $req->enddate[$i];
		    	$training->location = $req->location[$i];
		    	$training->organizer = $req->organizer[$i];
		    	$training->starttime = $req->starttime[$i];
		    	$training->endtime = $req->endtime[$i];
		    	$training->trainingtype = $req->trainingtype[$i];
		    	$training->save();
    		}
    	}

    }


}
