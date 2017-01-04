<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Trainings;
use App\Http\Requests;
use App\Models\Advisers;
use App\Models\PersonTraining;


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
    		for($i=0 ; $i<$count ; $i++){
    		$adviserid = $req->adviserid;
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

		    	$ptraining = DB::table('Trainings')->select('ID')->orderBy('ID', 'desc')->first();
		    	$this->addPersonTraining($adviserid,$ptraining);
	    	}
	    	}

	    	

    	}
    	
    	if($callId==2)
    	{
    		$adviserid = $req->adviserid;
    		$select = DB::table('Advisers')
    				 ->join('PersonTraining','PersonTraining.adviser_id','=','Advisers.ID')
    				 ->join('Trainings','Trainings.ID','=','PersonTraining.training_id')
    				 ->select('Trainings.ID','Trainings.trainingname','Trainings.startdate','Trainings.enddate','Trainings.location','Trainings.organizer','Trainings.starttime','Trainings.endtime','Trainings.trainingtype')
    				 ->where('Advisers.ID','=',$adviserid)
    				 ->get();
	    	return $select;
    	}

    	if($callId==3)
    	{
    		$count = count($req->tname);
    		for ($i=0 ; $i<$count ; $i++){
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

    public function addPersonTraining($adviserid,$ptraining)
    {
    	
    	$persontraining = new PersonTraining();
    	$persontraining->adviser_id = $adviserid;
    	$persontraining->training_id = $ptraining;
    	$persontraining->save();
    		
    }



}
