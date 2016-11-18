<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Models;

class PoliceOfficeTwoController extends Controller
{
    public function manageofficetwo(){
    	$suboffice = App\Models\PoliceOfficeSecond::with('policeoffice')->get();
    	$office = App\Models\PoliceOffices::all();

    	return view('Maintenance.PoliceOfficeSecond')->with('offices', $office)->with('suboffices', $suboffice);
    }

    public function confirm(Request $request){
    	if(isset($_POST['addbtn'])){
    		return $this->insert($request);
    	}
    }

    public function insert(Request $request){
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

    	return redirect('secondpolice');
    }

    public function find($id){
    	$office = App\Models\PoliceOffices::all();
    	$id = App\Models\PoliceOfficeSecond::find($id);
    	return view('Maintenance.PoliceOfficeSecondEDIT')->with('ids', $id)->with('offices', $office);
    }

    public function edit($id){
    	if(isset($_POST['edit']))
    	{

    		$id = App\Models\PoliceOfficeSecond::find($id);
    		
    		$id->police_office_id = $_POST['office'];
  		  	$id->officename = $_POST['name'];
  		  	$id->policeofficecode2 = $_POST['secondcode'];
  		  	$id->desc = $_POST['desc'];
    		$id->street = $_POST['street'];
    		$id->barangay = $_POST['barangay'];
    		$id->city = $_POST['city'];
    		$id->province = $_POST['province'];
    		$id->contactno = $_POST['contact'];

    		$id->save();

    		return redirect('secondpolice');
    	}
    }

}
