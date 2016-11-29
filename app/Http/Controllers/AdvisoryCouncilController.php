<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Models;
use Carbon\Carbon;

class AdvisoryCouncilController extends Controller
{
    public function index(){
    	$advisory = App\Models\AdvisoryCouncil::with('advisoryposition')->with('acsubcategory')->get();
        $subcat = App\Models\ACSubcategory::all();
        $category = App\Models\ACCategory::orderBy('categoryname')->get();
        $position = App\Models\AdvisoryPositions::all();

        // $currentDatetime = Carbon::now('Asia/Manila');
        // // $auctionEndTime = explode(' ', $auction->EndDateTime);
        // $currentDatetime = explode(' ', $currentDatetime);
    	
    	return view('Advisorycouncil')->with('council', $advisory)->with('sub', $subcat)
                    ->with('cat', $category)->with('positions', $position);
    }

    public function add(Request $request){
        if(isset($_POST['submit'])){
            $ac = App\Models\Advisers::orderBy('ID', 'desc')->take(1)->get();
            $acID = 0;
            foreach ($ac as $key => $u) {
                $acID = $u->ID;
            }
            $advisory = new App\Models\AdvisoryCouncil;
            $advisory->ID = $acID;
        	$advisory->officename = $request->input('acofficename');
    	    $advisory->officeaddress = $request->input('acofficeadd');
    	    $advisory->startdate = $request->input('startdate');
    	    $advisory->enddate = $request->input('enddate');
    	    $advisory->advisory_position_id = $request->input('position');
    	    $advisory->categoryId = $request->input('subcat');

            $advisory->save();

            return redirect('advisorycouncil');
        }
    }

    public function find(Request $request){
        $ac = $request->id;
        $id = App\Models\PoliceOfficeSecond::find($ac);
        return view('editAdvisorycouncil')->with('ids', $id);
    }

    public function edit(Request $request){
        if(isset($_POST['edit'])){
            $advisory = new App\Models\AdvisoryCouncil;
            $advisory = App\Models\AdvisoryCouncil::find($request->editID);
    	    $advisory->officename = $request->input('acofficename');
    	    $advisory->officeaddress = $request->input('acofficeadd');
    	    $advisory->startdate = $request->input('startdate');
    	    $advisory->enddate = $request->input('enddate');
    	    $advisory->advisory_position_id = $request->input('position');
    	    $advisory->categoryId = $request->input('subcat');

            $advisory->save();

            return redirect('advisorycouncil');
        }
    }
}
