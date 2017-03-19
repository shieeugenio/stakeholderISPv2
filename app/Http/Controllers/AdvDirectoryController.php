<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;

use App\Models\Advisory_Council;

use App\Models\Police_Advisory;

use App\Models\Police_Position;

use App\Models\unit_offices;

use App\Models\unit_office_secondaries;

use App\Models\unit_office_tertiaries;

use App\Models\unit_office_quaternaries;

use App\Models\Advisory_Position;

use App\Models\AC_Category;

use App\Models\ranks;

use App\Models\AC_Subcategory;

use App\Models\Personnel_Sector;

use App\Models\AC_Sector;

use App\Models\Training;

use App\Models\Lecturer;

use DB;

use Auth;

use Redirect;


class AdvDirectoryController extends Controller {

	public function readyadd(){

 		return view('adviser.adviser_add')->with('action', 0);

 	}//select dropdowns

 	public function readyedit(Request $req) {

 		if(!isset($req->c)) {
 			return redirect("directory");
 		}//if

		$tid = $req->c;

		$tidelements = explode("-", $tid);

		$result = $this->getData((int) $tidelements[1], (int) $tidelements[0]);

		//return $result[2][0];

		return view('adviser.adviser_add')->with('action', 1)
										 ->with('recorddata', $result)
										 ->with('type', (int) $tidelements[0])
										 ->with('id', (int) $tidelements[1]);

		
	}//readyedit

	public function addadviser(Request $req) {
		$data = $req->all();

		DB::transaction(function($data) use ($data) {

			if (isset($_POST['submit'])) {

				if($data['advcateg'] == 0) {
					$this->addAC($data);

				} else {
					$this->addTP($data);

				}//if($data->advcateg == 0) {
			

			}// if
		});

	}//add - WHOLE

	public function editadviser(Request $req) {
		$data = $req->all();

		DB::transaction(function($data) use ($data) {

		
			if (isset($_POST['submit'])) {

				if($data['advcateg'] == 0) {
					$this->editAC($data);

				} else {
					$this->editTP($data);
					
					$trainID = $this->getTrainIDList($data['ID']);

					$this->editLecturer($data, $trainID);


				}//if($data->advcateg == 0) {

				

			}// if
		});


	}//edit - WHOLE

	public function getAdv($filter, $sorter){
		$civilian = DB::table('advisory_council')
					->join('advisory_position', 'advisory_position.ID', '=', 'advisory_council.advisory_position_id')
					->join("ac_sector", "ac_sector.ID", "=", "advisory_council.ac_sector_id")
					->join('unit_office_secondaries', 'unit_office_secondaries.id', '=', 'advisory_council.second_id')
					->join('unit_offices', 'unit_offices.id', '=', 'unit_office_secondaries.UnitOfficeID')
					->leftJoin('unit_office_tertiaries', 'unit_office_tertiaries.id', '=', 'advisory_council.tertiary_id')
					->leftJoin('unit_office_quaternaries', 'unit_office_quaternaries.id', '=', 'advisory_council.quaternary_id')
					->select('advisory_council.ID','lname', 'fname', 'mname', 'imagepath', 'email', 
						     'contactno', 'landline','startdate', 'acpositionname', 'officename',
						     'UnitOfficeSecondaryName', 'UnitOfficeTertiaryName',
						     'UnitOfficeQuaternaryName')
					->orderBy('advisory_council.'. $filter, $sorter)
					->get();
	
		$police = DB::table('police_advisory')
					->join('police_position', 'police_position.id', '=', 'police_advisory.police_position_id')
					->join('unit_office_secondaries', 'unit_office_secondaries.id', '=', 'police_advisory.second_id')
					->join('unit_offices', 'unit_offices.id', '=', 'unit_office_secondaries.UnitOfficeID')
					->leftJoin('unit_office_tertiaries', 'unit_office_tertiaries.id', '=', 'police_advisory.tertiary_id')
					->leftJoin('unit_office_quaternaries', 'unit_office_quaternaries.id', '=', 'police_advisory.quaternary_id')
					->select('police_advisory.ID', 'lname', 'fname', 'mname', 'imagepath', 'email', 
						     'contactno', 'landline', 'startdate', 'policetype',
						     'UnitOfficeSecondaryName', 'UnitOfficeTertiaryName',
						     'UnitOfficeQuaternaryName', 'PositionName')
					->orderBy('police_advisory.' . $filter, $sorter)
					->get();

		return array($civilian, $police);
	}

	public function getList() {
		$adv = $this->getAdv('created_at', 'desc');
		/*INSERT CODE FOR DIRECTORY LIST VIEW*/

		//return $adv;
		return view('adviser.advisercontent')->with("directory", $adv)
									 ->with("showcontrol", "true");
	}//public function getList() {

	public function readyPHome() {
		if (Auth::check()) {
			

	    	return redirect('home');

		}//if (Auth::check()) {

		$adv = $this->getAdv('created_at', 'desc');

		/*INSERT CODE FOR PUBLIC HOME LIST VIEW*/


		return view('home.defaultphome')->with('directory', $adv);
	}//public function getList() {

	public function getACID() {
		$getid = Advisory_Council::orderBy('ID', 'desc')->take(1)->get();

		foreach ($getid as $key => $id) {
            return $id->ID;
        }//foreach ($getid as $key => $id) {


	}//public function getID() {

	public function getTPID() {
		$getid = Police_Advisory::orderBy('ID', 'desc')->take(1)->get();

		foreach ($getid as $key => $id) {
            return $id->ID;
        }//foreach ($getid as $key => $id) {


	}//public function getID() {

	public function getTrainIDList($id) {
		$getid = Training::where('police_id', $id)->pluck('ID');

		return $getid;
	}//public function getTrainID($id) {

	//DROPDOWN

	public function getInitACD() {
		$acposition = Advisory_Position::all();
 		//$accateg = AC_Category::all();
 		$primaryoffice = unit_offices::all();
 		$acsector = AC_Sector::all();

 		return array($acposition, $acsector, $primaryoffice,);
	}//public function getInitACD() {

	public function getInitTPD() {
		$pnpposition = Police_Position::all();
		$rank = ranks::all();
 		$primaryoffice = unit_offices::all();

 		return array($pnpposition, $rank, $primaryoffice);

	}//public function getInitTPD() {

	public function getSubCateg(Request $req) {
		$categID = $req->categID;

		$subcategory = AC_Subcategory::where('categoryId', $categID)->get();

		return $subcategory;

	}//public function getSubCateg() {

	public function getSecOffice(Request $req) {
		$primary = $req->poID;

		$secoffice = unit_office_secondaries::where('UnitOfficeID', $primary)->get();

		return $secoffice;
	}//public function getSecOffice(Request $req) {

	public function getTerOffice(Request $req) {
		$secondary = $req->soID;

		$teroffice = unit_office_tertiaries::where('UnitOfficeSecondaryID', $secondary)->get();

		return $teroffice;
	}//public function getSecOffice(Request $req) {

	public function getQuarOffice(Request $req) {
		$tertiary = $req->toID;

		$quaroffice = unit_office_quaternaries::where('UnitOfficeTertiaryID', $tertiary)->get();

		return $quaroffice;
	}//public function getSecOffice(Request $req) {

 	public function edit(Request $req){
	 	$id = $req->ID;
	 	$advisers = Advisory_Council::find($id);
	 	return $advisers;

	 } // retrieve for edit

	//AC

	public function addAC($data){
        $advisory = new Advisory_Council;
        $advisory->fname = $data['fname'];
	 	$advisory->lname = $data['lname'];
	 	$advisory->mname = $data['mname'];
	 	$advisory->qualifier = $data['qname'];
	 	$advisory->gender =  $data['gender'];
	 	$advisory->contactno = $data['mobile'];
	 	$advisory->landline = $data['landline'];
	 	$advisory->officename = $data['officename'];
        $advisory->officeaddress = $data['officeadd'];
	 	$advisory->email = $data['email'];
	 	$advisory->startdate = $data['durstart'];
	 	$advisory->fbuser = $data['facebook'];
	 	$advisory->twitteruser = $data['twitter'];
	 	$advisory->iguser = $data['instagram'];
	 	$advisory->birthdate = $data['bdate'];
	 	$advisory->street = $data['street'];
	 	$advisory->city = $data['city'];
	 	$advisory->province = $data['province'];
	 	$advisory->barangay = $data['barangay'];


	 	if($data['upphoto'] != "") {
	 		$advisory->imagepath = $this->loadphoto($data['upphoto']);

	 	}//if
	 	print_r($data['acsector']);

        $advisory->advisory_position_id = $data['acposition'];
        $advisory->ac_sector_id = $data['acsector'];

       	$advisory->second_id = $data['secondary'];

	    if($data['tertiary'] != 'disitem') {
	    	$advisory->tertiary_id = $data['tertiary'];
	    }//if

	    if($data['quaternary'] != 'disitem') {
	    	$advisory->quaternary_id = $data['quaternary'];
	    }//if

        $advisory->save();
    } // add AC

    public function editAC($data){

    	$advisory = Advisory_Council::find($data['ID']);
        $advisory->fname = $data['fname'];
	 	$advisory->lname = $data['lname'];
	 	$advisory->mname = $data['mname'];
	 	$advisory->qualifier = $data['qname'];
	 	$advisory->gender =  $data['gender'];
	 	$advisory->contactno = $data['mobile'];
	 	$advisory->landline = $data['landline'];
	 	$advisory->officename = $data['officename'];
        $advisory->officeaddress = $data['officeadd'];
	 	$advisory->email = $data['email'];
	 	$advisory->startdate = $data['durstart'];
	 	$advisory->fbuser = $data['facebook'];
	 	$advisory->twitteruser = $data['twitter'];
	 	$advisory->iguser = $data['instagram'];
	 	$advisory->birthdate = $data['bdate'];
	 	$advisory->street = $data['street'];
	 	$advisory->city = $data['city'];
	 	$advisory->province = $data['province'];
	 	$advisory->barangay = $data['barangay'];


	 	if($data['upphoto'] != "") {
	 		$advisory->imagepath = $this->loadphoto($data['upphoto']);

	 	}//if
	 	print_r($data['acsector']);

        $advisory->advisory_position_id = $data['acposition'];
        $advisory->ac_sector_id = $data['acsector'];

       	$advisory->second_id = $data['secondary'];

	    if($data['tertiary'] != 'disitem') {
	    	$advisory->tertiary_id = $data['tertiary'];
	    }//if

	    if($data['quaternary'] != 'disitem') {
	    	$advisory->quaternary_id = $data['quaternary'];
	    }//if

        $advisory->save();

    } // update AC

   	//TWG/PSMU

   	public function addTP($data){
    
    	$advisory = new Police_Advisory;
    	$advisory->fname = $data['fname'];
	 	$advisory->lname = $data['lname'];
	 	$advisory->mname = $data['mname'];
	 	$advisory->qualifier = $data['qname'];
	 	$advisory->gender =  $data['gender'];
	 	$advisory->contactno = $data['mobile'];
	 	$advisory->landline = $data['landline'];
	 	$advisory->email = $data['email'];
	 	$advisory->startdate = $data['durstart'];
	 	$advisory->fbuser = $data['facebook'];
	 	$advisory->twitteruser = $data['twitter'];
	 	$advisory->iguser = $data['instagram'];
	 	$advisory->birthdate = $data['bdate'];
	 	$advisory->street = $data['street'];
	 	$advisory->city = $data['city'];
	 	$advisory->province = $data['province'];
	 	$advisory->barangay = $data['barangay'];
	 	$advisory->policetype = $data['advcateg'];

	 	if($data['upphoto'] != "") {
	 		$advisory->imagepath = $this->loadphoto($data['upphoto']);

	 	}//if
    	$advisory->police_position_id = $data['pnppost'];
    	$advisory->rank_id = $data['rank'];
    	$advisory->second_id = $data['secondary'];

	    if($data['tertiary'] != 'disitem') {
	    	$advisory->tertiary_id = $data['tertiary'];
	    }//if

	    if($data['quaternary'] != 'disitem') {
	    	$advisory->quaternary_id = $data['quaternary'];
	    }//if

	    $advisory->authorityorder =$data['authorder'];

    	$advisory->save();

    	$id = $this->getTPID();

    	$this->addTraining($data, $id);

    	//return redirect('policeadvisory');
	    
	}// add TP

	 public function editTP($data){
    	$advisory = Police_Advisory::find($data['ID']);
    	$advisory->fname = $data['fname'];
	 	$advisory->lname = $data['lname'];
	 	$advisory->mname = $data['mname'];
	 	$advisory->qualifier = $data['qname'];
	 	$advisory->gender =  $data['gender'];
	 	$advisory->contactno = $data['mobile'];
	 	$advisory->landline = $data['landline'];
	 	$advisory->email = $data['email'];
	 	$advisory->startdate = $data['durstart'];
	 	$advisory->fbuser = $data['facebook'];
	 	$advisory->twitteruser = $data['twitter'];
	 	$advisory->iguser = $data['instagram'];
	 	$advisory->birthdate = $data['bdate'];
	 	$advisory->street = $data['street'];
	 	$advisory->city = $data['city'];
	 	$advisory->province = $data['province'];
	 	$advisory->barangay = $data['barangay'];
	 	$advisory->policetype = $data['advcateg'];

	 	if($data['upphoto'] != "") {
	 		$advisory->imagepath = $this->loadphoto($data['upphoto']);

	 	}//if
    	$advisory->police_position_id = $data['pnppost'];
    	$advisory->rank_id = $data['rank'];
    	$advisory->second_id = $data['secondary'];

	    if($data['tertiary'] != 'disitem') {
	    	$advisory->tertiary_id = $data['tertiary'];
	    }//if

	    if($data['quaternary'] != 'disitem') {
	    	$advisory->quaternary_id = $data['quaternary'];
	    }//if

	    $advisory->authorityorder =$data['authorder'];

    	$advisory->save();
        
    }// update TP

    //Training

    public function addTraining($data, $id) {
    	$count = count($data['traintitle']);

    	for($i=0 ; $i < $count ; $i++){
		   	$training = new Training();
		   	$training->trainingname = $data['traintitle'][$i];
		   	$training->startdate = $data['sdate'][$i];
		   	$training->enddate = $data['edate'][$i];
		   	$training->location = $data['location'][$i];
		   	$training->organizer = $data['org'][$i];
		   	$training->starttime = $data['stime'][$i];
		   	$training->endtime = $data['etime'][$i];
		   	$training->trainingtype = $data['traincateg'][$i];
		   	$training->police_id = $id;
		   	$training->save();

		   	$trainID = $this->getTrainID();

		   	$this->addLecturer($data['speaker'][$i], $trainID);

	    }//for

    }// add Training

    public function editTraining($data) {
    	Training::where('police_id', $data['ID'])->delete();

    	$this->addTraining($data, $data['ID']);

    }// update Training

   	public function getTrainID() {
   		$getid = Training::orderBy('ID', 'desc')->take(1)->get();

		foreach ($getid as $key => $id) {
            return $id->ID;
        }//foreach ($getid as $key => $id) {


   	}//public function getTrainID() {

   	public function addLecturer($data, $trainID) {
   		for($ctr = 0 ; $ctr < sizeof($data) ; $ctr++) {
   			$lecturer = new Lecturer;

   			$lecturer->lecturername = $data[$ctr];
   			$lecturer->training_id = $trainID;

   			$lecturer->save();

   		}//for($ctr = 0 ; $ctr < sizeof($data->speakers) ; $ctr++) {
   	}//public function addLecturer($data, $trainID) {

   	//call
   	public function editLecturer($data, $trainID) {

   		for ($ctr=0; $ctr < sizeof($trainID) ; $ctr++) { 
   			Lecturer::where('training_id', $trainID[$ctr])->delete();

   			
   		}//for
   										
   		$this->editTraining($data);

   	}//public function editLecturer($data, $trainID) {

   	public function loadphoto($photo) {

		$trimfilestring = explode(';', $photo);
		$ext = substr($trimfilestring[0], strpos($trimfilestring[0], "/") + 1);
		$base64string = substr($trimfilestring[1], strpos($trimfilestring[1], ",") + 1);

		$decodephoto = base64_decode($base64string);

		$filename =  "objects/displayphoto/" . str_random() . "." . $ext;

		file_put_contents($filename, $decodephoto);

		return $filename;
		//Storage::disk('public')->put($filename, $decodephoto);

		
		//return asset(Storage::disk('public')->url($filename));
	}//loadphoto
	
	public function readyModal(Request $req) {
		$type = $req->type;
		$id = $req->id;

		return $this->getData($id, $type);

	}//readyModal

	public function getData($id, $type){

		if($type == 0) {

				$ac = Advisory_Council::join('advisory_position', 'advisory_position.ID', '=', 'advisory_council.advisory_position_id')
										->join("ac_sector", "ac_sector.ID", "=", "advisory_council.ac_sector_id")
										->join('unit_office_secondaries', 'unit_office_secondaries.id', '=', 'advisory_council.second_id')
										->join("unit_offices", "unit_offices.id", "=", "unit_office_secondaries.UnitOfficeID")
										->leftJoin('unit_office_tertiaries', 'unit_office_tertiaries.id', '=', 'advisory_council.tertiary_id')
										->leftJoin('unit_office_quaternaries', 'unit_office_quaternaries.id', '=', 'advisory_council.quaternary_id')
										->where("advisory_council.ID" , "=", $id)
										->get();

				return array($ac, $this->formatOutput($ac));

		}else if($type == 1 || $type == 2) {

			$pa = Police_Advisory::join("ranks", "ranks.id", "=", "police_advisory.rank_id")
									->join("police_position", "police_position.ID", "=", "police_advisory.police_position_id")
									->join('unit_office_secondaries', 'unit_office_secondaries.id', '=', 'police_advisory.second_id')
									->join("unit_offices", "unit_offices.id", "=", "unit_office_secondaries.UnitOfficeID")
									->leftJoin("unit_office_tertiaries", "unit_office_tertiaries.id", "=", "police_advisory.tertiary_id")
									->leftJoin("unit_office_quaternaries", "unit_office_quaternaries.id", "=", "police_advisory.quaternary_id")
									->where("police_advisory.ID", "=", $id)
									->get();

			$trainings= Training::where("training.police_id", "=", $id)
									->get();

			$lecturelist = array();

			$datelist = array();

			foreach ($trainings as $key => $val) {
				$lecturer = Lecturer::where("training_id", "=", $val->ID)
									->get();
				$startdate = date('d M Y', strtotime($val->startdate));
				$starttime = date('G:i A', strtotime($val->starttime));
				$enddate = date('d M Y', strtotime($val->enddate));
				$endtime = date('G:i A', strtotime($val->endtime));

				array_push($lecturelist, $lecturer);
				array_push($datelist, array($startdate, $starttime, $enddate, $endtime));
				
			}//foreach

			return array($pa, $this->formatOutput($pa), array($trainings, $lecturelist, $datelist));

			
		}//if


	 }//public function getModal(Request $req){

	 public function formatOutput($data) {
	 	foreach ($data as $key => $val) {

	 		if($val->imagepath != "") {
	 			$img = asset($val->imagepath);

	 		} else {
	 			$img = asset('objects/Logo/InitProfile.png');

	 		}//if
			
			$bdate = date('d M Y', strtotime($val->birthdate));
			$startdate = date('d M Y', strtotime($val->startdate));

			if($val->enddate != ""){
				$enddate = date('d M Y', strtotime($val->enddate));
			} else {
				$enddate = "Present";
			}//if

			return array($img, $bdate, $startdate, $enddate);
		}//foreach

	 }//format output

	

}//class


