<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Models;

class PoliceOfficeTwoController extends Controller
{
    public function index(){
    	$suboffice = App\Models\PoliceOfficeSecond::with('policeoffice')->get();
    	$office = App\Models\PoliceOffices::all();

    	return view('maintenancetable.policeoffice2_table')->with('offices', $office)->with('suboffices', $suboffice);
    }

    public function add(Request $request){
        if(isset($_POST['submit'])){
            $policeoffice = new App\Models\PoliceOfficeSecond;

    	    $policeoffice->police_office_id = $request->input('office');
    	    $policeoffice->officename = $request->input('name');
    	    $policeoffice->policeofficecode2 = $request->input('secondcode');
    	    $policeoffice->desc = $request->input('desc');
    	    $policeoffice->street = $request->input('street');
    	    $policeoffice->barangay = $request->input('barangay');
    	    $policeoffice->city = $request->input('city');
    	    $policeoffice->province = $request->input('province');
    	    $policeoffice->contactno = $request->input('contact');
 
           	$policeoffice->save();

    	    return redirect('maintenance/policeoffice2');
        }
    }

    public function find(Request $request){
    	$office = App\Models\PoliceOffices::all();
        $police = $request->id;
    	$id = App\Models\PoliceOfficeSecond::find($police);
    	return $id;
    }

    public function edit(Request $request){
    	if(isset($_POST['submit']))
    	{

    		$id = App\Models\PoliceOfficeSecond::find($request->subID);
    		
    		$id->police_office_id = $request->office;
  		  	$id->officename = $request->name;
  		  	$id->policeofficecode2 = $request->secondcode;
  		  	$id->desc = $request->desc;
    		$id->street = $request->street;
    		$id->barangay = $request->barangay;
    		$id->city = $request->city;
    		$id->province = $request->province;
    		$id->contactno = $request->contact;

    		$id->save();

    		return redirect('maintenance/policeoffice2');
    	}
    }

}
