<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
