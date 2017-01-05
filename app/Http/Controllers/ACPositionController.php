<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Advisory_Position;


class ACPositionController extends Controller
{
	public function index_acposition()
	{
        $positions = DB::table('Advisory_Position')->get();
		return view('maintenancetable/advisoryposition_table', compact('positions'));
        //->with('sql', $sql);
	}
	

    public function acpositioncrud(Request $request)
    {

        $callId = $request->callId;

        if($callId==1)
        {
            $positionname = new Advisory_Position;
            $positionname->acpositionname=$request->acpname;
            $positionname->acpositioncode=$request->acpcode;
            $positionname->desc=$request->acpdesc;
            $positionname->save();

        }

        if($callId==2)
        {
            $id = $request->id;
            $positionname = Advisory_Position::find($id);

            return $positionname;

        }

        if($callId==3)
        {
            $id = $request->id;
            $positionname=Advisory_Position::find($id);
            $positionname->acpositionname=$request->acpname;
            $positionname->acpositioncode=$request->acpcode;
            $positionname->desc=$request->acpdesc;
            $positionname->save();
        }
    }
}
