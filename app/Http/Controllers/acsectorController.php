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
    	     	return view('maintenancetable.acsector_table')
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
         return view('maintenancetable.acsector_tableedit')
         ->with('stmt', $stmt)
         ->with('sector',$sector);
        }

        else if(isset($_POST['btn_Discard'])){
             return redirect('maintenancetable/acsector');

        }
         
    	
    }//UPDATE EDIT_SECTORS 

    public function update_acsectors(Request $request){

    	  if(isset($_POST['btn_Save'])){
        $acsecID = $request->acsectorID;
        $sectorName = $request->acsectorName;
        $sectorcode = $request->setsectorcode;
        $sectordesc = $request->setdesc;
        
        $params = array($sectorName,$acsecID);

        $stmt = DB::table('ACSectors')->where('ID',$acsecID)->update(['sectorname'=>$sectorName,
                                                                      'sectorcode'=>$sectorcode,
                                                                      'desc'=>$sectordesc]);

        if($stmt){
           
     $stmt = DB::table('ACSectors')->where('ID', '=', $acsecID)->get();        
      $sector = DB::table('ACSectors')->get();
            return view('maintenancetable.acsector')->with('stmt',$stmt)->with('sector',$sector);
          }
            else{
                return "Error";
                }
        }

        else if(isset($_POST['btn_Discard'])){
<<<<<<< HEAD

              return view('maintenancetable.acsector');
=======
              $sector = DB::table('ACSectors')->get();
              return view('maintenance.acsectorview')->with('sector',$sector);
>>>>>>> a4edc6cb1bf006d097f311c908d3fae8e31ed3d3
           
        }

    	return view('maintenancetable.acsector_tableview');
    }//END OF UPDATE_SECTORS


    public function ajax_editacsector(Request $request){
       $ID = $request->acsectorID;
        $session_acsector = $_SESSION['session_acsectorID'] = $ID;

    }


  public function ajax_session_acsector() {

        $ID = $_SESSION['session_acsectorID'];
        $params = array($ID);
        $stmt = DB::table('ACSectors')->where('ID', '=', $params)->get(); 
        if ($stmt) {
            
            return view('maintenancetable.acsector_tableview')->with('stmt', $stmt);
        }

        else
        {
            return "Error!";
        }

    }//End Of Ajax Row Clicked With Session


}//ENDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDD 
