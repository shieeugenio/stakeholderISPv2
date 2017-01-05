<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;

use App\Models\AdvisoryCouncil;

use App\Models\PoliceAdvisory;

use App\Models\PolicePositions;

use App\Models\PoliceOffices;

use App\Models\PoliceOfficeSecond;

use App\Models\AdvisoryPositions;

use App\Models\ACCategory;

use App\Models\ACSubcategory;

use App\Models\ACSectors;

use App\Models\Trainings;

use App\Models\Lecturers;

use DB;



class AdvDirectoryController extends Controller {

	public function index(){
 		/*$profile = Advisers::all();
 		return View ('module/adviser_add')->with('profile', $profile);*/

 		$acposition = AdvisoryPositions::all();
 		$accateg = ACCategory::all();
 		$acsector = ACSectors::all();
 		$pnpposition = PolicePositions::all();
 		$primaryoffice = PoliceOffices::all();

 		return view('module.adviser_add')->with('acposition', $acposition)
 										 ->with('accateg', $accateg)
 										 ->with('acsector', $acsector)
 										 ->with('pnppost', $pnpposition)
 										 ->with('primaryoffice', $primaryoffice);

 	} //select dropdowns

	public function addadviser(Request $req) {
		$data = $req->all();



		/*$data = array(
					'ID' => '',
					'lname' =>'lname',
					'fname' =>'fname',
					'mname' => 'mname',
					'bdate' => '1996-11-21',
					'gender' => '1',
					'street' => 'street',
					'barangay' => 'barangay',
					'city' => 'city',
					'province' => 'province',
					'mobile' => '890209129012',
					'landline' => '2345234',
					'email' => 'shie@yahoo.com',
					'facebook' => 'shieeugenio',
					'twitter' => 'shieeugenio',
					'instagram' => 'shieeugenio',
					'advcateg'  => '0',
					'durstart' => '2016-12-01',
					'durend' => '2016-12-01',
					'acposition' => '1',
					'officename' => 'CC',
					'officeadd' => 'QC',
					'acsubcateg' => '1',
					'acsector' => array('1'),
					'submit' => 'save'
				);

				$data = array(
					'ID' => '',
					'lname' =>'lname',
					'fname' =>'fname',
					'mname' => 'mname',
					'bdate' => '1996-11-21',
					'gender' => '1',
					'street' => 'street',
					'barangay' => 'barangay',
					'city' => 'city',
					'province' => 'province',
					'mobile' => '890209129012',
					'landline' => '2345234',
					'email' => 'shie@yahoo.com',
					'facebook' => 'shieeugenio',
					'twitter' => 'shieeugenio',
					'instagram' => 'shieeugenio',
					'advcateg'  => '1',
					'durstart' => '2016-12-01',
					'durend' => '2016-12-01',
					'authorder' => 'saudjiqskkpq9',
					'pnppost' => '1',
					'suboffice' => '1',
					'traintitle' => array('T30sjdas','T7sajdk'),
					'traincateg' => array('Tjdhks1','Tsajdkl2'),
					'location' => array('T1','T2'),
					'sdate' => array('2015-11-21','2015-11-21'),
					'stime' => array('08:00:00', '08:00:00'),
					'etime' => array('08:00:00', '08:00:00'),
					'edate' => array('2015-11-21','2015-11-21'),
					'speaker' => array(array('Shie', 'Mae'), array('Shie', 'Mae')),
					'org' => array('ORG', 'ORG3'),
					'submit' => 'save'
				);*/

		

		if (isset($_POST['submit'])) {
			$this->addProfile($data);

			$id = $this->getID();

			if($data['advcateg'] == 0) {
				$this->addAC($data, $id);

			} else {
				$this->addTP($data, $id);
				$this->addTraining($data, $id);

			}//if($data->advcateg == 0) {
		

		}// if

	}//add - WHOLE

	public function editadviser(Request $req) {
		$data = $req->all();

		if (isset($_POST['submit'])) {
			$this->editProfile($data);


			if($data->advcateg == 0) {
				$this->editAC($data);

			} else {
				$this->editTP($data);
				
				$trainID = $this->getTrainIDList($data->ID);

				$this->editLecturer($data, $trainID);


			}//if($data->advcateg == 0) {

			

		}// if


	}//edit - WHOLE

	public function getView() {

		$recorddata = $this->getRecordData();

		return view('module.adviser_add')->with('recorddata', $recorddata);

	}//view for edit

	public function getRecordData(Request $req) {
		$id = 1;
		

		$categ = DB::table('advisers')->select('category')->where('ID', $id)->get();


		if($categ[0]->category == 0) {
			$recorddata = Advisers::with('advisorycouncil')
									->with('training')
									->where('ID', $id)
									->get();


		} else {
			$recorddata = Advisers::with('policeadvisory')
									->with('training')
									->where('ID', $id)
									->get();

		}// if

		$training = Trainings::with('lecturer')
					->where('adviser_id', $id)
					->get();

		return array($recorddata, date('d M Y', strtotime($recorddata[0]->birthdate)), $training);
		
	}//get record / modal view

	public function getList() {
		$directory = DB::table('advisers')
						->select('ID', 'lname', 'fname', 'mname', 'imagepath', 'category', 'email', 'contactno', 'landline')
						->orderBy('ID', 'desc')
						->get();

		//return $directory;

		return view('module.adviser')->with('directory', $directory);
	}//public function getList() {

	public function readyPHome() {
		/*$directory = DB::table('advisers')
						->select('ID', 'lname', 'fname', 'mname', 'imagepath', 'category', 'email', 'contactno', 'landline')
						->orderBy('ID', 'desc')
						->get();

		return view('home.defaultphome')->with('directory', $directory);*/

		return view('home.defaultphome');
	}//public function getList() {

	public function getRecent() {
		/*$recent = DB::table('advisers')
						->select('ID', 'lname', 'fname', 'mname', 'imagepath', 'category', 'email', 'contactno', 'landline')
						->orderBy('ID', 'desc')
						->limit(50)
						->get();

		//SUMMARY PANE INSERT CODE HERE
		$all = Advisers::count();
		$ac = Advisers::where('category', '=', 0)->count();
	    $twg = Advisers::where('category', '=', 1)->count();
	    $psmu = Advisers::where('category', '=', 2)->count();
	    $pac = 0;
	    $ptwg = 0;
	    $ppsmu = 0;

	    if ($all > 0) {
	    	$pac = round(($ac/$all) * 100, 2);
		    $ptwg = round(($twg/$all) * 100,2);
		    $ppsmu = round(($psmu/$all) * 100,2);
	    }//if
	    

		return view('home.defaulthome')->with('recent', $recent)
									   ->with('all', $all)
									   ->with('ac', $ac)
									   ->with('twg', $twg)
									   ->with('psmu', $psmu)
									   ->with('pac', $pac)
									   ->with('ptwg', $ptwg)
									   ->with('ppsmu', $ppsmu);*/

		return view('home.defaulthome');

	}//public function getRecent() {

	public function getID() {
		$getid = Advisers::orderBy('ID', 'desc')->take(1)->get();

		foreach ($getid as $key => $id) {
            return $id->ID;
        }//foreach ($getid as $key => $id) {


	}//public function getID() {

	public function getTrainIDList($id) {
		$getid = Trainings::where('training_id', $id)->pluck('ID');

		$trainID = array();
		foreach($getid as $key=> $item) {
			array_push($trainID, $item->ID);

		}//foreach($getid as $key=> $item) {

		return $trainID;
	}//public function getTrainID($id) {

	//DROPDOWN

	public function getSubCateg(Request $req) {
		$categID = $req->categID;

		$subcategory = ACSubcategory::where('categoryId', $categID)->get();

		return $subcategory;

	}//public function getSubCateg() {

	public function getSecOffice(Request $req) {
		$primary = $req->poID;

		$secoffice = PoliceOfficeSecond::where('police_office_id', $primary)->get();

		return $secoffice;
	}//public function getSecOffice(Request $req) {


 	public function edit(Request $req){
	 	$id = $req->ID;
	 	$advisers = Advisers::find($id);
	 	return $advisers;

	 } // retrieve for edit


	//Profile
	public function addProfile($data){
		
	 	$adv = new Advisers;
	 	$adv->fname = $data['fname'];
	 	$adv->lname = $data['lname'];
	 	$adv->mname = $data['mname'];
	 	$adv->street = $data['street'];
	 	$adv->barangay = $data['barangay'];
	 	$adv->city = $data['city'];
	 	$adv->province = $data['province'];
	 	$adv->email = $data['email'];
	 	$adv->fbuser = $data['facebook'];
	 	$adv->twitteruser = $data['twitter'];
	 	$adv->iguser = $data['instagram'];
	 	$adv->contactno = $data['mobile'];
	 	$adv->landline = $data['landline'];
	 	$adv->birthdate = $data['bdate'];
	 	$adv->gender =  $data['gender'];
	 	$adv->category = $data['advcateg'];
	 	$adv->startdate = $data['durstart'];
        $adv->occupationstat = 0;
	 	//$adv->imagepath = $req->img;
	 	/*$image = $req->img;
	 	$filename = time() . '.' . $image->getClientOriginalExtension();
	 	$local = public_path();
	 		
	 	//die();
	 	$path = public_path('images\advisers\\' . $filename);
	    //Image::make($image->getRealPath())->resize(200, 200)->save($path);
	    $image->move($local . '\images\advisers\\', $filename);*/
	    $adv->imagepath = 'objects/Logo/InitProfile.png';        	
	 	$adv-> save();

	    	
	 	//return redirect('directory');

	} // add profile

	public function editProfile($data) {
	 	
	    $adv = Advisers::find($data['ID']);
	    $adv->fname = $data['fname'];
		$adv->lname = $data['lname'];
		$adv->mname = $data['mname'];
		$adv->street = $data['street'];
		$adv->barangay = $data['barangay'];
		$adv->city = $data['city'];
		$adv->province = $data['province'];
		$adv->email = $data['email'];
		$adv->fbuser = $data['facebook'];
		$adv->twitteruser = $data['twitter'];
		$adv->iguser = $data['instagram'];
		$adv->contactno = $data['mobile'];
		$adv->landline = $data['landline'];
		$adv->birthdate = $data['bdate'];
		$adv->gender =  $data['gender'];
		$adv->category = $data['advcateg'];
		$adv->startdate = $data['durstart'];
        $adv->enddate = $data['durend'];
		/*if ($req->hasFile('img')) {
			if (file_exists($adv->imagepath)) {
				unlink($adv->imagepath);
				$image = $req->img;
		 		$filename = time() . '.' . $image->getClientOriginalExtension();
		 		$local = public_path();
		 		$path = public_path('images\advisers\\' . $filename);
		        $image->move($local . '\images\advisers\\', $filename);
		        $adv->imagepath = $path;

			}
		}*/
		$adv->imagepath = "objects/Logo/InitProfile.png";
	    $adv->save();
	    
	} // update profile


	//AC

	public function addAC($data, $id){
        $advisory = new AdvisoryCouncil;
        $advisory->ID = $id;
       	$advisory->officename = $data['officename'];
        $advisory->officeaddress = $data['officeadd'];
        $advisory->advisory_position_id = $data['acposition'];
        $advisory->subcategoryId = $data['acsubcateg'];
        $advisory->save();

        $this->addSector($data['sector'], $id);
    } // add AC

    public function addSector($sector, $acid) {

    	for($ctr = 0 ; $ctr < sizeof($sector) ; $ctr++) {
    		$acsector = new ACSectors;
    		$acsector->advisory_council_id = $acid;
    		$acsector->ac_sector_id = $sector[$ctr];
    		$acsector->save();


    	}//for

    }//public function addSector() {

    public function editSector($data) {
    	ACSectors::where('advisory_council_id', $data['ID'])->delete();
    	$this->addSector($data, $data['ID']);

    }//public function editSector($id) {

    public function editAC($data){

    	$advisory = AdvisoryCouncil::find($data['ID']);
        $advisory->officename = $data['officename'];
        $advisory->officeaddress = $data['officeadd'];
        $advisory->startdate = $data['durstart'];
        $advisory->enddate = $data['durend'];
        $advisory->advisory_position_id = $data['acposition'];
        $advisory->subcategoryId = $data['acsubcat'];
	    $adv->save();

	    $this->editSector($data);

    } // update AC

   	//TWG/PSMU

   	public function addTP($data, $id){
    
    	$advisory = new PoliceAdvisory;
    	$advisory->ID = $id;
    	$advisory->police_position_id = $data['pnppost'];
    	$advisory->policeoffice_id = $data['suboffice'];
    	$advisory->authorityorder = $data['authorder'];

    	$advisory->save();

    	//return redirect('policeadvisory');
	    
	}// add TP

	 public function editTP($data){
    	$advisory = PoliceAdvisory::find($data['ID']);
    	$advisory->police_position_id = $data['pnppost'];
    	$advisory->policeoffice_id = $data['suboffice'];
    	$advisory->authorityorder = $data['authorder'];
    	$advisory->save();
        
    }// update TP

    //Training

    public function addTraining($data, $id) {
    	$count = count($data['traintitle']);

    	for($i=0 ; $i < $count ; $i++){
		   	$training = new Trainings();
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
    	Trainings::where('police_id', $data['ID'])->delete();

    	$this->addTraining($data, $data['ID']);

    }// update Training

   	public function getTrainID() {
   		$getid = Trainings::orderBy('ID', 'desc')->take(1)->get();

		foreach ($getid as $key => $id) {
            return $id->ID;
        }//foreach ($getid as $key => $id) {


   	}//public function getTrainID() {

   	public function addLecturer($data, $trainID) {
   		for($ctr = 0 ; $ctr < sizeof($data) ; $ctr++) {
   			$lecturer = new Lecturers;

   			$lecturer->lecturername = $data[$ctr];
   			$lecturer->training_id = $trainID;

   			$lecturer->save();

   		}//for($ctr = 0 ; $ctr < sizeof($data->speakers) ; $ctr++) {
   	}//public function addLecturer($data, $trainID) {

   	//call
   	public function editLecturer($data, $trainID) {

   		for ($ctr=0; $ctr < sizeof($trainID) ; $ctr++) { 
   			Lecturers::where('training_id', $trainID[$ctr])->delete();

   			
   		}//for
   										
   		$this->editTraining($data);

   	}//public function editLecturer($data, $trainID) {


}//class
