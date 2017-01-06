<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\unit_office_tertiaries;
use App\Models\unit_office_secondaries;
use DB;
use App\Http\Controllers\Controller;

class PoliceOfficeThreeController extends Controller
{
   
    public function index_PO3(){
      $potwo = DB::table('unit_office_secondaries')->get();  
      $pothree = DB::table('unit_office_tertiaries')
      ->orderBy('unit_office_tertiaries.id','DESC')
      ->get();
      return view('maintenancetable.policeoffice3_table')
      ->with('pothree', $pothree)
      ->with('potwo', $potwo);
      
    }

 
    public function PO3CRUD(Request $request)
    {

        $callId = $request->callId;

        if($callId==1)
        {
          
            $potri = new unit_office_tertiaries;
            $potri->UnitOfficeTertiaryName = $request->tername;
            $potri->UnitOfficeHasQuaternary = $request->hasquart;
            $potri->UnitOfficeSecondaryID = $request->officE2;
            $potri->save();
            var_dump($request);

        }

        if($callId==2)
        {
            $id = $request->id;
            $potri = unit_office_tertiaries::find($id);

            return $potri;

        }

        if($callId==3)
        {
            $id = $request->id;
            $potri= unit_office_tertiaries::find($id);
            $potri->UnitOfficeTertiaryName = $request->tername;
            $potri->UnitOfficeHasQuaternary = $request->hasquart;
            $potri->UnitOfficeSecondaryID = $request->officE2;
            $potri->save();
        }
    }



}//ENDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDD 

