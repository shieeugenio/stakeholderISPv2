<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Models;

class PoliceOfficeTwoController extends Controller
{
    public function index(){
    	$suboffice = App\Models\unit_office_secondaries::with('policeoffice')->get();
    	$office = App\Models\unit_offices::all();

    	return view('maintenancetable.policeoffice2_table')->with('offices', $office)->with('suboffices', $suboffice);
    }

    public function add(Request $request){
        if(isset($_POST['submit'])){
            $policeoffice = new App\Models\unit_office_secondaries;

    	    $policeoffice->police_office_id = $request->office;
    	    $policeoffice->officename = $request->name;
    	    $policeoffice->policeofficecode2 = $request->code;
    	    $policeoffice->desc = $request->desc;
    	    $policeoffice->street = $request->street;
    	    $policeoffice->barangay = $request->barangay;
    	    $policeoffice->city = $request->city;
    	    $policeoffice->province = $request->province;
    	    $policeoffice->contactno = $request->contact;
 
           	$policeoffice->save();

        }
    }

    public function find(Request $request){
        $police = $request->id;
    	$id = App\Models\unit_office_secondaries::find($police);
    	return $id;
    }

    public function edit(Request $request){
    	if(isset($_POST['submit']))
    	{

    		$id = App\Models\unit_office_secondaries::find($request->subID);
    		
    		$id->police_office_id = $request->office;
  		  	$id->officename = $request->name;
  		  	$id->policeofficecode2 = $request->code;
  		  	$id->desc = $request->desc;
    		$id->street = $request->street;
    		$id->barangay = $request->barangay;
    		$id->city = $request->city;
    		$id->province = $request->province;
    		$id->contactno = $request->contact;

    		$id->save();
    	}
    }

}
