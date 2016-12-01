<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Advisers;

use Carbon\Carbon;

use App\Models\AdvisoryCouncil;

class AdvDirectoryController extends Controller {

	public function addadviser(Request $req) {
		$data = $req->all();
		if (isset($_POST['submit'])) {
			$this->addProfile($data);

			$id = $this->getID();
			$this->addAC($data, $id);

		}// if


	}//public function addadviser() {

	public function getID() {
		$getid = Advisers::orderBy('ID', 'desc')->take(1)->get();

		foreach ($getid as $key => $id) {
            return $id->ID;
        }//foreach ($getid as $key => $id) {


	}//public function getID() {

	public function index(){
 		$profile = Advisers::all();
 		return View ('module/adviser_add')->with('profile', $profile);
 	} //select all

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
	}

	} // add profile

	public function updateProfile($data){
	 	
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
		$adv->occupationstat = 0;
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
	        }
	} // update profile


	//AC

	public function addAC($data, $id){
        $advisory = new AdvisoryCouncil;
        $advisory->ID = $id;
       	$advisory->officename = $data->officename;
        $advisory->officeaddress = $data->officeadd;
        $advisory->startdate = $data->durstart;
        $advisory->enddate = $data->durend;
        $advisory->advisory_position_id = $data->acposition;
        $advisory->subcategoryId = $data->acsubcat;
        $advisory->acsector = $data->acsector;

        $advisory->save();

        //return redirect('advisorycouncil');
        
    } // add AC

    public function edit(Request $request){
        if(isset($_POST['submit'])){
            // $advisory = App\Models\AdvisoryCouncil::find($request->editID);
            $ac = App\Models\Advisers::orderBy('ID', 'desc')->take(1)->get();
            $acID = 0;
            foreach ($ac as $key => $u) {
                $acID = $u->ID;
            }
            $name = $request->acofficename;
            $address = $request->acofficeadd;
            $startdate = $request->startdate;
            $enddate = $request->enddate;
            $position = $request->position;
            $subcateg = $request->subcat;
            $id = $acID;

            $params = array($name, $address, $startdate, $enddate, $position, $subcateg, $id);
            $var = DB::statement('update advisorycouncil
                set
                   officename = ?,
                   officeaddress = ?,
                   startdate = ?,
                   enddate = ?,
                   advisory_position_id = ?,
                   subcategoryId = ? 
                where id = ?', $params);
            if($var){
                return redirect('advisorycouncil');

            }
            else{
                return "Error";
            }

            // $advisory->save();

        }
    } // update AC

}//class
