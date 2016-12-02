<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Advisers;
use Response;

class SearchController extends Controller
{
    public function appendValue($data, $type, $element)
	{
		// operate on the item passed by reference, adding the element and type
		foreach ($data as $key => & $item) {
			$item[$element] = $type;
		}
		return $data;		
	}

	public function appendURL($data, $prefix)
	{
		// operate on the item passed by reference, adding the url based on slug
		foreach ($data as $key => & $item) {
			$item['url'] = url($prefix.'/'.$item['ID']);
		}
		return $data;		
	}

	public function index(Request $req)
	{
		$query = e($req->q);

		if(!$query && $query == '') return Response::json(array(), 400);

		$adv = Advisers::where('fname','like','%'.$query.'%')
			->orWhere('lname','like','%'.$query.'%')
			->orWhere('mname','like','%'.$query.'%')
			->orderBy('fname','asc')
			->take(5)
			->get(array('ID','imagepath','fname','mname','lname'))->toArray();


		// Data normalization
		
		$adv = $this->appendURL($adv, 'login');
		
		// Add type of data to each item of each set of results
		$adv = $this->appendValue($adv, 'adviser', 'class');
		
		
		return Response::json(array(
			'data'=>$adv
		));
	}
}
