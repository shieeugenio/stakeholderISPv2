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
      $pothree = DB::table('unit_office_tertiaries')->select('unit_office_tertiaries.id','unit_office_tertiaries.UnitOfficeTertiaryName','unit_office_secondaries.UnitOfficeSecondaryName','unit_offices.UnitOfficeName')
            ->join('unit_office_secondaries','unit_office_tertiaries.UnitOfficeSecondaryID','=','unit_office_secondaries.id')
            ->join('unit_offices','unit_office_secondaries.UnitOfficeID','=','unit_offices.id')
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

    
    

    public function selOffice(Request $req){
        $callid = $req->callid;
        $id = $req->id;    
        $secondOffice = DB::table('unit_office_secondaries')->where('UnitOfficeID','=',$id)->get();
        return $secondOffice;
       
    }

    public function retrieveData(Request $req)
        {
            $id = $req->id;
            $potri = unit_office_tertiaries::find($id);
            $idTwo = $potri->UnitOfficeSecondaryID;
            $potwo = DB::table('unit_office_secondaries')->find($idTwo);
            $idOne = $potwo->UnitOfficeID;
            $poOne = DB::table('unit_offices')->find($idOne);

            $drop = DB::table('unit_office_tertiaries')->where('id','=',$id)->get();

            return [$potri,$potwo,$poOne,$drop];
            
        }
   
}//ENDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDD 

