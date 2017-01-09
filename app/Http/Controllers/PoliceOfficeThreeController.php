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
      $poOne = DB::table('unit_offices')->get();
      $potwo = DB::table('unit_office_secondaries')->get();  
      $pothree = DB::table('unit_office_tertiaries')
      ->orderBy('unit_office_tertiaries.id','DESC')
      ->get();
      return view('maintenancetable.policeoffice3_table')
      ->with('pothree', $pothree)
      ->with('potwo', $potwo)
      ->with('poOne', $poOne);
      
    }

 
    public function PO3CRUD(Request $request)
    {

        $callId = $request->callId;

        if($callId==1)
        {
          
            $potri = new unit_office_tertiaries;
            $potri->UnitOfficeTertiaryName = $request->tername;
            $potri->UnitOfficeHasQuaternary = $request->hasquart;
            $potri->UnitOfficeSecondaryID = $request->office2;
            $potri->save();
            var_dump($potri);

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
            $potri->UnitOfficeSecondaryID = $request->office2;
            $potri->save();
        }
    }

    
    public function selectOffice(Request $req){
        $unit_offices_ID = $req->id;        
        $params = array($unit_offices_ID);

        $stmt = DB::select('select * 
            from unit_offices as a
            join unit_office_secondaries as b
            on a.id = b.id 
            order by a.id asc', $params);

        $array_Result = array();

        foreach ($stmt as $key => $rs) {
            
            $Office2_ID = $rs->id;
            $Unit_Name = $rs->UnitOfficeSecondaryName;
            
            array_push($array_Result, $Office2_ID);
            array_push($array_Result, $Unit_Name);
            
        }   

        return json_encode($array_Result);


    }///end of selectOffice1

    public function selectOfficeSec(Request $req){
         $Office2_ID = $req->id;

        $params = array($Office2_ID);

        $stmt = DB::select('select * 
            from "unit_offices" as a
            left join "unit_office_secondaries" as b
            on a.id = b.id 
            order by a.id asc', $params);

       
    }///end of selectOffice2

   



}//ENDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDD 

