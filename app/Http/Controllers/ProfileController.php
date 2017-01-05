<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;
use App\Models\Advisory_Council;
use App\Http\Requests;

class ProfileController extends Controller
{
   
 public function index(){
 		$profile = Advisory_Council::all();
 		return View ('module/adviser_add')->with('profile', $profile);
 }  


 public function store(Request $req){
 	
 		$adv = new Advisory_Council;
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

    	
 		return redirect('directory');



 	
 } 

 public function edit(Request $req){
 	$id = $req->ID;
 	$advisers = Advisory_Council::find($id);
 	return $advisers;

 }

 public function update(Request $req){
 	if (isset($_POST['submit'])) {
            $adv = Advisory_Council::find($req->ID);
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