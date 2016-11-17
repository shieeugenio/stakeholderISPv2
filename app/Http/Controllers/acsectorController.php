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
    	return view('maintenance.acsectorform');
    }

    public function insert_acsectors(Request $request){

    	if(isset($_POST['btn_Save'])){                  
            	$acsec = new ACSectors;
            	$acsec->sectorname = $request->acsectorName;

            	$acsec->save();
            	$lastId = $acsec->ID;
                $params = array($lastId);            
                
                $stmt = DB::select('SELECT * FROM ACSectors
                     WHERE ID = ?', $params); 
              
    		return view('maintenance.acsectorview')->with('stmt', $stmt);

    	       }
    	    	if(isset($_POST['btn_Discard'])){
    	                return redirect('maintenance/acsectorform');
    	            }
       }//end of public function INSERT_SECTORS

      


    public function edit_acsectors(Request $request){

         if(isset($_POST['btn_Edit'])){
    	$acsecID = $request->acsectorID;
    	
    	$params = array($acsecID);
        $stmt = DB::select('select * from ACSectors
            where ID = ?', $params);

         return view('maintenance.acsectoredit')->with('stmt', $stmt);
        }
         
    	
    }//UPDATE EDIT_SECTORS

    public function update_acsectors(Request $request){

    	  if(isset($_POST['btn_Save'])){
        $acsecID = $request->acsectorID;
        $sectorName = $request->acsectorName;
        
        $params = array($sectorName,$acsecID);
        $stmt = DB::statement('update ACSectors
            set 

                sectorname = ?

            where ID = ?', $params);

        if($stmt){
            
            $params = array($acsecID);
            $stmt = DB::select('select * from ACSectors
            where ID = ?', $params);

            return view('maintenance.acsectorview')->with('stmt',$stmt);
          }
        else{
            return "Error";
            }
        }

        else if(isset($_POST['btn_Discard'])){

            $acsecID = $request->acsectorID;

            $params = array($acsecID);

            $stmt = DB::select('select *
                from "ACSectors"
                where ID = ?', $params);
              
                return view('maintenance.acsectorview')->with('stmt', $stmt);

            
        }


    	return view('maintenance.acsectorview');
    }//END OF UPDATE_SECTORS



}//ENDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDD 
