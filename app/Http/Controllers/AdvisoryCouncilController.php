<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Models;
use Carbon\Carbon;
use App\Models\Advisers;
use App\Models\AdvisoryCouncil;
use App\Models\ACSubcategory;
use App\Models\ACCategory;
use App\Models\AdvisoryPositions;
use App\Models\PersonnelSector;
use App\Http\Controllers\Controller;
use App\Models\ACSectors;
use DB;

class AdvisoryCouncilController extends Controller
{
    public function index(){
        $advisory = AdvisoryCouncil::with('advisoryposition')->with('acsubcategory')->get();
        $subcat = ACSubcategory::all();
        $category = ACCategory::orderBy('categoryname')->get();
        $position = AdvisoryPositions::all();
        $personnel = PersonnelSector::all();
        $acsector = ACSectors::all();    
      
    	return view('transaction.Advisorycouncil')->with('council', $advisory)->with('sub', $subcat)
                    ->with('cat', $category)->with('positions', $position)->with('sector', $personnel)
                    ->with('ac', $acsector);

    }

  
    public function acCRUD(Request $request)
    {

        $callId = $request->callId;

        if($callId==1)
        {
           $ac = Advisers::orderBy('ID', 'desc')->take(1)->get();
            $acID = 0;
            foreach ($ac as $key => $u) {
                $acID = $u->ID;
            }

            $advisory = new AdvisoryCouncil;
            $advisory->ID = $acID;
            $advisory->officename = $request->acofficenamE;
            $advisory->officeaddress = $request->acofficeaddD;
            $advisory->advisory_position_id = $request->positioN;
            $advisory->subcategoryId = $request->subcaT;
            $advisory->save();

            $personnel = new PersonnelSector;
            $personnel->advisory_council_id = $acID;
            $personnel->ac_sector_id = $request->sectoR;
            $personnel->save();
        }

        if($callId==2)
        {
            $id = $request->id;
            $acsec = ACSectors::find($id);

            return $acsec;

        }

        if($callId==3)
        {

            $id = $request->id;
            $advisory = AdvisoryCouncil::find($id);
            $advisory->officename = $request->acofficenamE;
            $advisory->officeaddress = $request->acofficeaddD;
            $advisory->advisory_position_id = $request->positioN;
            $advisory->subcategoryId = $request->subcaT;
            $advisory->save();

            $iD = $request->id;
            $personnel = PersonnelSector::find($iD);
            $personnel->advisory_council_id = $acID;
            $personnel->ac_sector_id = $request->sectoR;
            $personnel->save();
        }
    }


    /* public function subcatOptions(Request $request) {
         $catID = $request->subcat;

         $params = array($catID);

         $stmt = DB::select('select * from "accategory" as b
             left join "acsubcategory" as c on b.id = c.id' , $params);

         $array_Result = array();

         return json_encode($array_Result);

     }//End Of Select Unit 1    */


 
}
