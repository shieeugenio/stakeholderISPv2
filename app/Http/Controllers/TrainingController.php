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


    public function store(Request $req)
    {
    	$training = new Trainings();
    	$training->trainingname = $req->tname;
    	$training->startdate = $req->startdate;
    	$training->enddate = $req->enddate;
    	$training->location = $req->location;
    	$training->organizer = $req->organizer;
    	$training->starttime = $req->starttime;
    	$training->endtime = $req->endtime;
    	$training->trainingtype = $req->ttype;
    	$training->save();

    	$info= DB::table('Trainings')->get();
    	return view('maintenance/trainingsample')->with('info', $info);
    }
}
