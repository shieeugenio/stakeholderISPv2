<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\AdvisoryPositions;


class ACPositionController extends Controller
{
	public function index_acposition()
	{
        $positions = DB::table('AdvisoryPositions')->get();
		return view('maintenance.advisoryposition', compact('positions'));
        //->with('sql', $sql);
	}
	

    public function acpositioninsert(Request $request)
    {

    	if(isset($_POST['storeposition']))
        {

    		$positionname = new AdvisoryPositions;
    		$positionname->acpositionname=$request->acpositionname;
            $positionname->acpositioncode=$request->acpositioncode;
            $positionname->desc=$request->desc;
    		$positionname->save();

            $lastid = $positionname->ID;
            $param = array($lastid);
            $sql = DB::table('AdvisoryPositions')
                    ->select('ID')
                    ->where('ID','=',$lastid)->get();
            $positions = DB::table('AdvisoryPositions')->get();
            return view('maintenance/advisorypositionview')
                ->with('sql',$sql)
                ->with('positions', $positions);
    	}
        else if(isset($_POST['cancel'])){
            return redirect('maintenance/advisoryposition');
        }
    }

    public function acpositionedit(Request $request)
    {   
        if(isset($_POST['editacposition'])){

        $acpositionid = $request->acpositionid;
        $sql = DB::table('AdvisoryPositions')->where('ID','=', $acpositionid)->get();
        $positions = DB::table('AdvisoryPositions')->get();
        return view('maintenance.advisorypositionedit')
                ->with('sql', $sql)
                ->with('positions', $positions);
        }
        else if(isset($_POST['deleteacposition']))
        {
            return redirect('maintenance/advisoryposition');
        }
       
    }

    public function acpositionupdate(Request $request)
    {
        if(isset($_POST['btn_updateacposition'])){
            $positionID = $request->acpositionsid;
            $positionName = $request->setpositionname;
            $positioncode = $request->setpositioncode;
            $positiondesc = $request->setdesc;
            $stmt = DB::table('AdvisoryPositions')->where('ID','=',$positionID)
                                                  ->update(['acpositionname'=>$positionName,
                                                            'acpositioncode'=>$positioncode,
                                                            'desc'=>$positiondesc]);

            if($stmt){
                
                $params = array($positionID);
                $stmt = DB::table('AdvisoryPositions')->where('ID','=',$positionID)->get();
                 $positions = DB::table('AdvisoryPositions')->get();
                return view('maintenance.advisorypositionview')->with('stmt',$stmt)->with('positions',$positions);
              }
            else{
                return "Error";
                }
        }

        else if(isset($_POST['cancel']))
        {
            return redirect('maintenance/advisoryposition');
        }     
    }
}
