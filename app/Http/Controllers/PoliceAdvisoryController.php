<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Models;
use DB;

class PoliceAdvisoryController extends Controller
{
    public function index(){
    	$advisory = App\Models\PoliceAdvisory::with('policeofficetwo')->with('policeposition')->get();
    	$position = App\Models\PolicePositions::all();
    	$office = App\Models\PoliceOfficeSecond::all();

    	return view ('transaction/PoliceAdvisory')->with('adviser', $advisory)->with('positions', $position)->with('offices', $office);
    }

    public function add(Request $request){
    	if(isset($_POST['submit'])){
    		$ac = App\Models\Advisers::orderBy('ID', 'desc')->take(1)->get();
        	$acID = 0;
            foreach ($ac as $key => $u) {
                $acID = $u->ID;
            }
    	$advisory = new App\Models\PoliceAdvisory;
    	$advisory->ID = $acID;
    	$advisory->police_position_id = $request->position;
    	$advisory->policeoffice_id = $request->officetwo;
    	$advisory->authorityorder = $request->authority;

    	$advisory->save();

    	return redirect('policeadvisory');
	    }
	}

	public function find($id){
		$advisory = App\Models\PoliceAdvisory::with('policeofficetwo')->with('policeposition')->get();
		$id = App\Models\PoliceAdvisory::find($id);
		return view('transaction/EditPoliceAdvisory')->with('ids', $id)->with('police', $advisory);
    }

    public function edit(Request $request){
    	if(isset($_POST['edit'])){
    		$ac = App\Models\Advisers::orderBy('ID', 'desc')->take(1)->get();
            $acID = 0;
            foreach ($ac as $key => $u) {
                $acID = $u->ID;
            }
            $position = $request->position;
    		$policeoffice = $request->officetwo;
    		$order = $request->authority;
    		$id = $acID;

    		$params = array($position, $policeoffice, $order, $id);
    		$var = DB::statement('update policeadvisory
    			set
    				police_position_id = ?,
    				policeoffice_id = ?,
    				authorityorder = ?
    			where id = ?', $params);
    		if($var){
    			return redirect('policeadvisory');
    		}
    		else{
    			return "Error";
    		}
    	}
    }


}
