<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Models;

class PoliceOfficesController extends Controller
{
    public function index(){
    	$office = App\Models\PoliceOffices::all();

		return view('maintenancetable/policeoffice_table')->with('offices', $office);
	}

    public function confirmOffice(Request $request){
    	if(isset($_POST['addbtn'])){
    		return $this->insert($request);
    	}
    	
    }

    public function add(Request $request){
        if(isset($_POST['submit'])){
            $office = new App\Models\PoliceOffices;
            $office->policeofficecode = $request->input('code');
            $office->officename = $request->input('name');
            $office->policestaff = $request->input('staff');
    	    $office->desc = $request->input('desc');
    	    $office->police_address = $request->input('add');
    	    $office->contactno = $request->input('contact');

    	    $office->save();
        }
    }

    public function find(Request $request){
        $police=$request->id;
    	$id = App\Models\PoliceOffices::find($police);
    	return $id;
    }

    public function edit(Request $request){
    	if(isset($_POST['submit'])){
    		$id = App\Models\PoliceOffices::find($request->policeID);

    		$id->policeofficecode = $request->code;
    		$id->officename = $request->name;
            $id->policestaff = $request->staff;
    		$id->desc = $request->desc;
    		$id->police_address = $request->add;
    		$id->contactno = $request->contact;

    		$id->save();
    	}
    }
}
