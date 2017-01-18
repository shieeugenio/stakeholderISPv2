<?php

namespace App\Http\Controllers;
use App\Models\Advisory_Council;
use Illuminate\Http\Request;
use DB;
use Response;

class FilterController extends Controller
{	
	 public function appendValue($data, $type, $element)
	{
		// operate on the item passed by reference, adding the element and type
		foreach ($data as $key => & $item) {
			$item[$element] = $type;
		}
		return $data;		
	}

    public function index(Request $req)
	{
		$query = e($req->q);

		if(!$query && $query == '') return Response::json(array(), 400);

		$adv = Advisers::where('fname','like','%'.$query.'%')
			->orderBy('fname','asc')
			->take(5)
			->get(array('ID','imagepath','fname','mname','lname'))->toArray();


		// Data normalization
		
		//$adv = $this->appendURL($adv, 'login');
		
		// Add type of data to each item of each set of results
		$adv = $this->appendValue($adv, 'adviser', 'class');
		
		
		return Response::json(array(
			'data'=>$adv
		));
	}

	public function FilterAll(){
		$adv = DB::table('advisory_council')
    					 ->join('ac_subcategory','advisory_council.subcategoryId', '=', 'ac_subcategory.ID')
    					 ->join('ac_category', 'ac_category.ID', '=', 'ac_subcategory.categoryId')
    					 ->join('advisory_position', 'advisory_position.ID', '=', 'advisory_council.advisory_position_id')
    					 ->join('personnel_sector', 'personnel_sector.advisory_council_id', '=', 'advisory_council.ID')
    					 ->orderBy('advisory_council.lname','asc')
    					 ->get();

    	$pol = DB::table('police_advisory')
    					 ->join('police_position', 'police_position.id', '=', 'police_advisory.police_position_id')
    					 ->join('ranks', 'ranks.id', '=', 'police_advisory.rank_id')
    					 ->join('unit_offices', 'unit_offices.id', '=', 'police_advisory.unit_id')
    					 ->orderBy('police_advisory.lname', 'asc')
    					 ->get();

    					 
    	return Response::json(array(
    		'adv'=>$adv,
    		'pol'=>$pol
    		));


	}

	public function FilterAC(){

		$adv = DB::table('advisory_council')
    					 ->join('ac_subcategory','advisory_council.subcategoryId', '=', 'ac_subcategory.ID')
    					 ->join('ac_category', 'ac_category.ID', '=', 'ac_subcategory.categoryId')
    					 ->join('advisory_position', 'advisory_position.ID', '=', 'advisory_council.advisory_position_id')
    					 ->join('personnel_sector', 'personnel_sector.advisory_council_id', '=', 'advisory_council.ID')
    					 ->orderBy('advisory_council.lname','asc')
    					 ->get();
    	$sec = DB::table('ac_sector')
    					 ->get();
    	//$adv = $this->appendValue($adv, 'filter', 'class');

    	return Response::json(array(
			'adv'=>$adv,
			'sec'=>$sec
		));

	}

	public function TWGFilter(){
		$pol = DB::table('police_advisory')
    					 ->join('police_position', 'police_position.id', '=', 'police_advisory.police_position_id')
    					 ->join('ranks', 'ranks.id', '=', 'police_advisory.rank_id')
    					 ->join('unit_offices', 'unit_offices.id', '=', 'police_advisory.unit_id')
    					 ->where('policetype', '=', 1)
    					 ->orderBy('police_advisory.lname', 'asc')
    					 ->get();

    	return Response::json(array(
    		'pol'=>$pol
    		));
		
	}

	public function PSMUFilter(){
		$pol = DB::table('police_advisory')
    					 ->join('police_position', 'police_position.id', '=', 'police_advisory.police_position_id')
    					 ->join('ranks', 'ranks.id', '=', 'police_advisory.rank_id')
    					 ->join('unit_offices', 'unit_offices.id', '=', 'police_advisory.unit_id')
    					 ->where('policetype', '=', 2)
    					 ->orderBy('police_advisory.lname', 'asc')
    					 ->get();

    	return Response::json(array(
    		'pol'=>$pol
    		));
	}

	


}