<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\ACSectors;
use DB;
use App\Http\Controllers\Controller;

class acsectorController extends Controller
{
   
    public function index_acsectors(){
      $sector = DB::table('ACSectors')->get();
      return view('maintenancetable.acsector_table')->with('sector', $sector);
      
    }

 
    public function acsectorCRUD(Request $request)
    {

        $callId = $request->callId;

        if($callId==1)
        {
            $acsec = new ACSectors;
              $acsec->sectorname = $request->secname;
              $acsec->desc = $request->secdesc;
              $acsec->sectorcode = $request->seccode;
            $acsec->save();

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
            $acsec=ACSectors::find($id);
            $acsec->sectorname = $request->secname;
            $acsec->sectorcode = $request->seccode;
            $acsec->desc = $request->secdesc;
            $acsec->save();
        }
    }



}//ENDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDD 
