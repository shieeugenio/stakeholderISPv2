<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\PolicePositions;

class PolicePositionController extends Controller
{
    public function index_policeposition()
	{
        $positions = DB::table('PolicePositions')->get();
		return view('maintenancetable/policeposition_table', compact('positions'));
        //->with('sql', $sql);
	}
	

    public function policepositioninsert(Request $request)
    {

    	if(isset($_POST['storeposition']))
        {

    		$positionname = new PolicePositions;
    		$positionname ->positionname=$request->positionname;
            $positionname->policepositioncode=$request->policepositioncode;
            $positionname->desc=$request->desc;
    		$positionname->save();

            $lastid = $positionname->ID;
            $sql = DB::table('PolicePositions')->where('ID','=',$lastid)->first();
            $positions = DB::table('PolicePositions')->get();
            return view('maintenance/policepositionview')
                ->with('sql',$sql)
                ->with('positions', $positions);
    	}
        else if(isset($_POST['cancel'])){
            return redirect('maintenance/policeposition');
        }
    }

    public function policepositionedit(Request $request)
    {   
        if(isset($_POST['editpoliceposition'])){

        $policepositionid = $request->policepositionid;
        $sql = DB::table('PolicePositions')->where('ID','=',$policepositionid)->get();
        $positions = DB::table('PolicePositions')->get();
        return view('maintenance.policepositionedit')
                ->with('sql', $sql)
                ->with('positions', $positions);
        }
        else if(isset($_POST['deletepoliceposition']))
        {
            return redirect('maintenance/policeposition');
        }
       
    }

    public function policepositionupdate(Request $request)
    {
        if(isset($_POST['btn_updateacposition'])){
            $positionID = $request->policepositionsid;
            $positionName = $request->setpositionname;
            $positioncode = $request->setpolicepositioncode;
            $positiondesc = $request->setdesc;
            $stmt = DB::table('PolicePositions')->where('ID','=',$positionID)->update(['positionname'=>$positionName,
                                                                                        'policepositioncode'=>$positioncode,
                                                                                        'desc'=>$positiondesc]);

            if($stmt){
                $stmt = DB::table('PolicePositions')->where('ID','=',$positionID)->get();
                 $positions = DB::table('PolicePositions')->get();
                return view('maintenance.policepositionview')->with('stmt',$stmt)->with('positions',$positions);
              }
            else{
                return "Error";
                }
        }

        else if(isset($_POST['cancel']))
        {
            return redirect('maintenance/policeposition');
        }     

    }

    public function policepositioncrud(Request $request)
    {
        $callId = $request->callId;

        if($callId == 1)
        {
            $position = new PolicePositions;
            $position->positionname=$request->ppname;
            $position->policepositioncode=$request->ppcode;
            $position->desc=$request->ppdesc;
            $position->save();
        }

        if($callId == 2)
        {
            $id = $request->id;
            $position = PolicePositions::find($id);

            return $position;
        }

        if($callId == 3)
        {
            $id = $request->id;
            $position=PolicePositions::find($id);
            $position->positionname=$request->ppname;
            $position->policepositioncode=$request->ppcode;
            $position->desc=$request->ppdesc;
            $position->save();   
        }

    }

}
