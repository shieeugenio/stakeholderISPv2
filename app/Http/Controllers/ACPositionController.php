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
    		$positionname ->acpositionname=$request->acpositionname;
    		$positionname->save();

    	}

        $lastid = $positionname->ID;
        $param = array($lastid);
        $sql = DB::select('select * from "AdvisoryPositions" where ID = ?', $param);
    	return view('maintenance.advisorypositionview')->with('sql',$sql);
    }

    public function acpositionedit(AdvisoryPositions $acposition)
    {   
        
        return view('maintenance.advisorypositionedit', compact('acposition'));
    }

    public function acpositionupdate(Request $request)
    {
        return view('maintenance.advisorypositionupview');
    }
}
