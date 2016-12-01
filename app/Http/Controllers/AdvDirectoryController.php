<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Advisers;

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
 		//return $pnpposition;

 	} //select dropdowns


	public function addadviser(Request $req) {
		$data = $req->all();
		if (isset($_POST['submit'])) {
			$this->addProfile($data);

			$id = $this->getID();


			if($data->advcateg == 0) {
				$this->addAC($data, $id);

			} else {
				$this->addTP($data, $id);


			}//if($data->advcateg == 0) {

		}// if


	}//public function addadviser() {

	public function getID() {
		$getid = Advisers::orderBy('ID', 'desc')->take(1)->get();

		foreach ($getid as $key => $id) {
            return $id->ID;
        }//foreach ($getid as $key => $id) {


	}//public function getID() {

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
	 	$adv->fname = $data->fname;
	 	$adv->lname = $data->lname;
	 	$adv->mname = $data->mname;
	 	$adv->street = $data->street;
	 	$adv->barangay = $data->barangay;
	 	$adv->city = $data->city;
	 	$adv->province = $data->province;
	 	$adv->email = $data->email;
	 	$adv->fbuser = $data->facebook;
	 	$adv->twitteruser = $data->twitter;
	 	$adv->iguser = $data->instagram;
	 	$adv->contanctno = $data->mobile;
	 	$adv->landline = $data->landline;
	 	$adv->birthdate = $data->bdate;
	 	$adv->gender =  $data->gender;
	 	$adv->category = $data->advcateg;
	 	$adv->startdate = $data->durstart;
        $adv->enddate = $data->durend;
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

	public function updateProfile($data) {
	 	
	    $adv = Advisers::find($data->ID);
	    $adv->fname = $data->fname;
		$adv->lname = $data->lname;
		$adv->mname = $data->mname;
		$adv->street = $data->street;
		$adv->barangay = $data->barangay;
		$adv->city = $data->city;
		$adv->province = $data->province;
		$adv->email = $data->email;
		$adv->fbuser = $data->facebook;
		$adv->twitteruser = $data->twitter;
		$adv->iguser = $data->instagram;
		$adv->contactno = $data->mobile;
		$adv->landline = $data->landline;
		$adv->birthdate = $data->bdate;
		$adv->gender =  $data->gender;
		$adv->category = $data->advcateg;
		$adv->startdate = $data->durstart;
        $adv->enddate = $data->durend;
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
       	$advisory->officename = $data->officename;
        $advisory->officeaddress = $data->officeadd;
        $advisory->advisory_position_id = $data->acposition;
        $advisory->subcategoryId = $data->acsubcat;
        //$advisory->acsector = $data->acsector;

        $advisory->save();

        //return redirect('advisorycouncil');
        
    } // add AC

    public function editAC(Request $request){

    	$advisory = AdvisoryCouncil::find($data->ID);
        $advisory->officename = $data->officename;
        $advisory->officeaddress = $data->officeadd;
        $advisory->startdate = $data->durstart;
        $advisory->enddate = $data->durend;
        $advisory->advisory_position_id = $data->acposition;
        $advisory->subcategoryId = $data->acsubcat;
        //$advisory->acsector = $data->acsector;
	    $adv->save();

    } // update AC

   	//TWG/PSMU

   	public function addTP($data, $id){
    
    	$advisory = new PoliceAdvisory;
    	$advisory->ID = $id;
    	$advisory->police_position_id = $data->pnppost;
    	$advisory->policeoffice_id = $data->suboffice;
    	$advisory->authorityorder = $data->authorder;

    	$advisory->save();

    	//return redirect('policeadvisory');
	    
	}// add TP

	 public function editTP($data){
    	$advisory = PoliceAdvisory::find($data->ID);
    	$advisory->police_position_id = $data->pnppost;
    	$advisory->policeoffice_id = $data->suboffice;
    	$advisory->authorityorder = $data->authorder;
    	$advisory->save();
        
    }// update TP

    //Training

    public function addTraining($data, $id) {

    }// add Training

    public function editTraining($data) {

    }// update Training


}//class
