<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;
use App\Models\Advisers;
use App\Models\Trainings;
use App\Models\Lecturers;
use App\Models\PolicePositions;
use App\Models\PoliceOffices;
use App\Models\PoliceOfficeSecond;
use App\Models\AdvisoryPositions;
use App\Models\ACCategory;
use App\Models\ACSubcategory;
use App\Models\ACSectors;
use App\Http\Requests;

class ProfileController extends Controller
{
   
 public function index(){
 		//$profile = Advisers::all();
 		$acsec = DB::table('ACSectors')->select('ID', 'sectorname')->get();
 		$accat = DB::table('ACCategory')->select('ID', 'categoryname')->get();
 		$acsubcat = DB::table('ACSubcategory')->select('ID','subcategoryname')->get();
 		return View ('module/adviser_add')->with('acsec', $acsec)
 										  ->with('accat',$accat)
 										  ->with('acsubcat',$acsubcat);
 }  

 public function getinfo(Request $req){

 		$pposition = DB::table('PolicePositions')->select('ID', 'policepositionname')->get();
 		$poffice = DB::table('PoliceOffices')->select('ID', 'officename')->get();
 		$poffice2 = DB::table('PoliceOfficeSecond')->select('ID', 'officename')->get();
 		$acposition = DB::table('AdvisoryPositions')->select('ID', 'acpositionname')->get();
 		return View ('module/adviser_add')->with('pposition',$pposition)
 										  ->with('poffice',$poffice)
 										  ->with('poffice2',$poffice2)
 										  ->with('acposition',$acposition);
 }

 public function store(Request $req){
 	
 		$adv = new Advisers;
 		$adv->fname = $req->fname;
 		$adv->lname = $req->lname;
 		$adv->mname = $req->mname;
 		$adv->street = $req->street;
 		$adv->barangay = $req->barangay;
 		$adv->city = $req->city;
 		$adv->province = $req->province;
 		$adv->email = $req->email;
 		$adv->contanctno = $req->contanct;
 		$adv->birthdate = $req->bdate;
 		$adv->gender =  $req->gender;
 		$adv->category = $req->category;
 		$adv->occupationstat = $req->stat;
 		//$adv->imagepath = $req->img;
 		$image = $req->img;
 		$filename = time() . '.' . $image->getClientOriginalExtension();
 		$local = public_path();
 		
 		//die();
 		$path = public_path('images\advisers\\' . $filename);
        //Image::make($image->getRealPath())->resize(200, 200)->save($path);
        $image->move($local . '\images\advisers\\', $filename);
        $adv->imagepath = $path;        	
 		$adv-> save();

 		if($req->category == 0){


 		}

 		else {

 		}

 		$getId = DB::table('Advisers')->select('ID')->orderBy('ID', 'desc')->first();

 		$trainID = array();
 		$lecturerID = array(array());
 		
 		for ($i = 0; $i < sizeof($req->trainingtitle);$i++){
	 		$training = new Trainings();
	    	$training->trainingname = $req->trainname[$i];
	    	$training->startdate = $req->traindate[$i];
	    	$training->enddate = $req->enddate;
	    	$training->location = $req->location[$i];
	    	$training->organizer = $req->trainorg[$i];
	    	$training->starttime = $req->starttime;
	    	$training->endtime = $req->endtime;
	    	$training->trainingtype = $req->traincateg[$i];
	    	$training->save();

	    	$trainID = DB::table('Trainings')->select('ID')->orderBy('ID', 'desc')->first();	
    	
	    	for($l = 0; $l < sizeof($req->lecturer);$l++){
	    		$lecturer = new lecturers();
		    	$lecturer->lecturername = $req->lecturer[$i][$l];
		    	$lecturer->save();

		    	$lecturerID[$i][$l]= DB::table('Lecturers')->select('ID')->orderBy('ID','desc')->first();

	    	}
    	}


    	
 		return redirect('directory');



 	
 } 

 public function addTraining($id){


 }

 public function edit(Request $req){
 	$id = $req->ID;
 	$advisers = Advisers::find($id);
 	return $advisers;

 }

 public function update(Request $req){
 	if (isset($_POST['submit'])) {
            $adv = Advisers::find($req->ID);
            $adv->fname = $req->fname;
	 		$adv->lname = $req->lname;
	 		$adv->mname = $req->mname;
	 		$adv->street = $req->street;
	 		$adv->barangay = $req->barangay;
	 		$adv->city = $req->city;
	 		$adv->province = $req->province;
	 		$adv->email = $req->email;
	 		$adv->birthdate = $req->birthday;
	 		$adv->category = $req->category;
	 		$adv->occupationstat = $req->stat;
	 		if ($req->hasFile('img')) {
	 			if (file_exists($adv->imagepath)) {
	 				unlink($adv->imagepath);
	 				$image = $req->img;
			 		$filename = time() . '.' . $image->getClientOriginalExtension();
			 		$local = public_path();
			 		$path = public_path('images\advisers\\' . $filename);
			        $image->move($local . '\images\advisers\\', $filename);
			        $adv->imagepath = $path;

	 			}
	 		}
            $adv->save();
        }
 }


}