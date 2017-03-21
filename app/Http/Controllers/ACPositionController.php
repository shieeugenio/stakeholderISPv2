<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\ac_positions;
use App\Model;


class ACPositionController extends Controller
{
	public function index_acposition()
	{
        $positions = DB::table('ac_positions')->get();
		return view('maintenancetable/advisoryposition_table', compact('positions'));
        //->with('sql', $sql);
	}
	

    public function acpositioncrud(Request $request)
    {

        $callId = $request->callId;

        if($callId==1)
        {
            $positionname = new ac_positions;
            $positionname->ACPositionName=$request->acpname;
            $positionname->Description=$request->acpdesc;
            $positionname->save();

        }

        if($callId==2)
        {
            $id = $request->id;
            $positionname = ac_positions::find($id);

            return $positionname;

        }

        if($callId==3)
        {
            $id = $request->id;
            $positionname= ac_positions::find($id);
            $positionname->ACPositionName=$request->acpname;
            $positionname->Description=$request->acpdesc;
            $positionname->save();
        }
    }
}
