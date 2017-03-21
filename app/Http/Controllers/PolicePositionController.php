<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\pnp_positions;

class PolicePositionController extends Controller
{
    public function index_policeposition()
	{
        $positions = DB::table('pnp_positions')->get();
		return view('maintenancetable/policeposition_table', compact('positions'));
        //->with('sql', $sql);
	}
	
    public function policepositioncrud(Request $request)
    {
        $callId = $request->callId;

        if($callId == 1)
        {
            $position = new pnp_positions;
            $position->PNPPositionName=$request->ppname;
            $position->Description=$request->ppdesc;
            $position->save();
        }

        if($callId == 2)
        {
            $id = $request->id;
            $position = pnp_positions::find($id);

            return $position;
        }

        if($callId == 3)
        {
            $id = $request->id;
            // $position = Police_Position::find($id);
            // $position->positionname=$request->ppname;
            // $position->desc=$request->ppdesc;
            // $position->save();
            DB::table('pnp_positions')
            ->where('id', $id)
            ->update(['PNPPositionName' => $request->ppname],
                    ['Description' => $request->ppdesc]);   
        }

    }

}
