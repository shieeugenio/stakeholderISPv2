<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\unit_office_tertiaries;
use DB;
use App\Http\Controllers\Controller;

class PO3Controller extends Controller
{
   
    public function index_PO3(){
      $pothree = DB::table('unit_office_tertiaries')
      ->orderBy('unit_office_tertiaries.id','DESC')
      ->get();
      return view('maintenancetable.PO3_table')
      ->with('pothree', $pothree);
      
    }

 
    public function PO3CRUD(Request $request)
    {

        $callId = $request->callId;

        if($callId==1)
        {
            $potwo = new unit_office_secondaries;
            $potwo->save();
            $potwoID = $potwo->id; 

            $potri = new unit_office_tertiaries;
            $potri->UnitOfficeTertiaryName = $request->;
            $potri->UnitOfficeHasQuaternary = $request->;
            $potri->UnitOfficeSecondaryID = $potwoID;
            $potri->save();

        }

        if($callId==2)
        {
            $id = $request->id;
            $potri = unit_office_tertiaries::find($id);

            return $acsec;

        }

        if($callId==3)
        {
            $id = $request->id;
            $potri= unit_office_tertiaries::find($id);
            $potri->UnitOfficeTertiaryName = $request->;
            $potri->UnitOfficeHasQuaternary = $request->;
            $potri->UnitOfficeSecondaryID = $potwoID;
            $potri->save();
        }
    }



}//ENDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDD 

