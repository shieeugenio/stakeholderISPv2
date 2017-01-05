<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Models;

class PoliceOfficesController extends Controller
{
    public function index(){
    	$office = App\Models\unit_offices::all();

        $staffdesc = $this->getstaffdesc($office);

		return view('maintenancetable/policeoffice_table')->with('offices', $office)
                                                          ->with('staffdesc', $staffdesc);

        //return $staffdesc;
	}

    public function getstaffdesc($office) {

        $desclist = array();
        foreach($office as $key => $items) {

            if($items->policestaff == 0) {
                $description = "D-Staff";
            } else if($items->policestaff == 1) {
                $description = "P-Staff";


            }//if($items->policestaff == 0) {

            $desclist = array_pad($desclist, sizeof($desclist) + 1, $description);

        }//foreach($office as $key => $items) {

        return $desclist;

    }//public getstaffdesc() {

    public function confirmOffice(Request $request){
    	if(isset($_POST['addbtn'])){
    		return $this->insert($request);
    	}
    	
    }

    public function add(Request $request){
        if(isset($_POST['submit'])){
            $office = new App\Models\unit_offices;
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
    	$id = App\Models\unit_offices::find($police);
    	return $id;
    }

    public function edit(Request $request){
    	if(isset($_POST['submit'])){
    		$id = App\Models\unit_offices::find($request->policeID);

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
