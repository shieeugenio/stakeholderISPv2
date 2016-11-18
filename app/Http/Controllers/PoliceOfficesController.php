<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Models;

class PoliceOfficesController extends Controller
{
    public function manageoffice(){
    	$office = App\Models\PoliceOffices::all();

		return view('Maintenance.PoliceOffice')->with('offices', $office);
	}

    public function confirmOffice(Request $request){
    	if(isset($_POST['addbtn'])){
    		return $this->insert($request);
    	}
    	
    }

    public function insert(Request $request){
    	$office = new App\Models\PoliceOffices;
    	$office->policeofficecode = $request->input('code');
    	$office->officename = $request->input('name');
    	$office->desc = $request->input('desc');
    	$office->police_address = $request->input('add');
    	$office->contactno = $request->input('contact');

    	$office->save();

    	return redirect('policeOffice');
    }

    public function find($id){
    	$id = App\Models\PoliceOffices::find($id);
    	return view('Maintenance.PoliceOfficeEdit')->with('ids', $id);
    }

    public function edit($id){
    	if(isset($_POST['edit'])){
    		$id = App\Models\PoliceOffices::find($id);
    		// $office = new App\Models\PoliceOffices;
    		$id->policeofficecode = $_POST['code'];
    		$id->officename = $_POST['name'];
    		$id->desc = $_POST['desc'];
    		$id->police_address = $_POST['add'];
    		$id->contactno = $_POST['contact'];

    		$id->save();

    		return redirect('policeOffice');	
    	}
    }
}
