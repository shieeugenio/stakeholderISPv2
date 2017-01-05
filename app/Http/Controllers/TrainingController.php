<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Training;
use App\Http\Requests;
use App\Models\Advisory_Council;
use App\Models\Police_Training;


class TrainingController extends Controller
{
    public function index()
    {
    	$info= DB::table('Training')->get();
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
		    	$training = new Training();
		    	$training->trainingname = $req->tname[$i];
		    	$training->startdate = $req->startdate[$i];
		    	$training->enddate = $req->enddate[$i];
		    	$training->location = $req->location[$i];
		    	$training->organizer = $req->organizer[$i];
		    	$training->starttime = $req->starttime[$i];
		    	$training->endtime = $req->endtime[$i];
		    	$training->trainingtype = $req->trainingtype[$i];
		    	$training->save();

		    	$ptraining = DB::table('Training')->select('ID')->orderBy('ID', 'desc')->first();
		    	$this->addPersonTraining($adviserid,$ptraining);
	    	}
	    	}

	    	

    	}
    	
    	if($callId==2)
    	{
    		$adviserid = $req->adviserid;
    		$select = DB::table('Advisory_Council')
    				 ->join('PersonTraining','PersonTraining.adviser_id','=','Advisory_Council.ID')
    				 ->join('Training','Training.ID','=','Police_Training.training_id')
    				 ->select('Training.ID','Training.trainingname','Training.startdate','Training.enddate','Training.location','Training.organizer','Training.starttime','Training.endtime','Training.trainingtype')
    				 ->where('Advisory_Council.ID','=',$adviserid)
    				 ->get();
	    	return $select;
    	}

    	if($callId==3)
    	{
    		$count = count($req->tname);
    		for ($i=0 ; $i<$count ; $i++){
	    		$training = Training::find($req->id[$i]);
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
    	
    	$persontraining = new Police_Training();
    	$persontraining->adviser_id = $adviserid;
    	$persontraining->training_id = $ptraining;
    	$persontraining->save();
    		
    }



}
