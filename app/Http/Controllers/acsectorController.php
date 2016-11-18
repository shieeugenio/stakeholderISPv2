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

    public function insert_acsectors(Request $request){

    	if(isset($_POST['btn_Save'])){                  
            	$acsec = new ACSectors;

            	$acsec->sectorname = $request->acsectorName;
              $acsec->desc = $request->Desc; 
            	$acsec->save();
            	$lastId = $acsec->ID;

             $sector = DB::table('ACSectors')->get();
             $stmt = DB::table('ACSectors')->where('ID', '=', $lastId)->get(); 
    	     	return view('maintenancetable.acsector')
              ->with('stmt', $stmt)
              ->with('sector',$sector);

    	       }
    	    	if(isset($_POST['btn_Discard'])){
    	                return redirect('maintenancetable/acsector');
    	            }
       }//end of public function INSERT_SECTORS
      


    public function edit_acsectors(Request $request){

         if(isset($_POST['btn_Edit'])){
      	$acsecID = $request->acsectorid;
    	
        $stmt = DB::table('ACSectors')->where('ID', '=', $acsecID)->get();
        $sector = DB::table('ACSectors')->get();
         return view('maintenancetable.acsector')->with('stmt', $stmt)->with('sector',$sector);
        }

        else if(isset($_POST['btn_Discard'])){
             return redirect('maintenancetable/acsectorform');

        }
         
    	
    }//UPDATE EDIT_SECTORS 

    public function update_acsectors(Request $request){

    	  if(isset($_POST['btn_Save'])){
        $acsecID = $request->acsectorID;
        $sectorName = $request->acsectorName;
        $sectorcode = $request->setsectorcode;
        $sectordesc = $request->setdesc;
        
        $params = array($sectorName,$acsecID);
        
  // $stmt = DB::statement('update ACSectors set sectorname = ? where ID = ?', $params);
 // $stmt = DB::table('ACSectors')->where('ID', '=', $params)->update([])

        $stmt = DB::table('ACSectors')->where('ID',$acsecID)->update(['sectorname'=>$sectorName,
                                                                      'sectorcode'=>$sectorcode,
                                                                      'desc'=>$sectordesc]);

        if($stmt){
            
           // $params = array($acsecID);
  // $stmt = DB::select('select * from ACSectors where ID = ?', $params);
     $stmt = DB::table('ACSectors')->where('ID', '=', $acsecID)->get();        
      $sector = DB::table('ACSectors')->get();
            return view('maintenance.acsectorview')->with('stmt',$stmt)->with('sector',$sector);
          }
            else{
                return "Error";
                }
        }

        else if(isset($_POST['btn_Discard'])){
              $sector = DB::table('ACSectors')->get();
              return view('maintenance.acsectorview')->with('sector',$sector);
           
        }

    	return view('maintenance.acsectorview');
    }//END OF UPDATE_SECTORS



}//ENDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDD 
