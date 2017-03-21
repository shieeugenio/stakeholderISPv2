<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\ac_sectors;
use DB;
use App\Http\Controllers\Controller;

class acsectorController extends Controller
{
   
    public function index_acsectors(){
      $sector = DB::table('ac_sectors')
      ->orderBy('ac_sectors.id','DESC')
      ->get();
      return view('maintenancetable.acsector_table')
      ->with('sector', $sector);
      
    }

 
    public function acsectorCRUD(Request $request)
    {

        $callId = $request->callId;

        if($callId==1)
        {
            $acsec = new ac_sectors;
              $acsec->ACSectorName = $request->secname;
              $acsec->Description = $request->secdesc;
            $acsec->save();

        }

        if($callId==2)
        {
            $id = $request->id;
            $acsec = ac_sectors::find($id);

            return $acsec;

        }

        if($callId==3)
        {
            $id = $request->id;
            $acsec= ac_sectors::find($id);
            $acsec->ACSectorName = $request->secname;
            $acsec->Description = $request->secdesc;
            $acsec->save();
        }
    }



}//ENDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDD 
