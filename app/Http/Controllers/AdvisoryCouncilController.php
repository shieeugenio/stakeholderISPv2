<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Models;
use Carbon\Carbon;
use App\Models\AdvisoryCouncil;
use DB;

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
    	
    	return view('transaction/Advisorycouncil')->with('council', $advisory)->with('sub', $subcat)
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
    	    $advisory->subcategoryId = $request->input('subcat');

            $advisory->save();

            return redirect('advisorycouncil');
        }
    }

    public function find($id){
        $advisory = App\Models\AdvisoryCouncil::with('advisoryposition')->with('acsubcategory')->get();
        $id = App\Models\AdvisoryCouncil::find($id);
        // $position = App\Models\AdvisoryPositions::all();
        return view('transaction/editAdvisorycouncil')->with('ids', $id)->with('ac', $advisory);
    }

    public function edit(Request $request){
        if(isset($_POST['edit'])){
            // $advisory = App\Models\AdvisoryCouncil::find($request->editID);
            $ac = App\Models\Advisers::orderBy('ID', 'desc')->take(1)->get();
            $acID = 0;
            foreach ($ac as $key => $u) {
                $acID = $u->ID;
            }
            $name = $request->acofficename;
            $address = $request->acofficeadd;
            $startdate = $request->startdate;
            $enddate = $request->enddate;
            $position = $request->position;
            $subcateg = $request->subcat;
            $id = $acID;

            $params = array($name, $address, $startdate, $enddate, $position, $subcateg, $id);
            $var = DB::statement('update advisorycouncil
                set
                   officename = ?,
                   officeaddress = ?,
                   startdate = ?,
                   enddate = ?,
                   advisory_position_id = ?,
                   subcategoryId = ? 
                where id = ?', $params);
            if($var){
                return redirect('advisorycouncil');

            }
            else{
                return "Error";
            }

            // $advisory->save();

        }
    }

    // public function subcatOptions(Request $request) {
    //     $catID = $request->subcat;

    //     $params = array($catID);

    //     $stmt = DB::select('select * from "accategory" as b
    //         left join "acsubcategory" as c on b.id = c.id' , $params);

    //     $array_Result = array();

    //     return json_encode($array_Result);

    // }//End Of Select Unit 1
}
