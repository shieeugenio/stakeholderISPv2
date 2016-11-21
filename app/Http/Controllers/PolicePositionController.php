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
