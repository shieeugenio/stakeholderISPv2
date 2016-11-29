<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;
use App\Models\Advisers;
use App\Http\Requests;

class ProfileController extends Controller
{
   
 public function index(){
 		$profile = Advisers::all();
 		return View ('transaction.advisers')->with('profile',$profile);

 }  
 public function store(Request $req){
 	if (isset($_POST['submit'])) {
 		$adv = new Advisers;
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
 		//$adv->imagepath = $req->img;
 		$image = $req->img;
 		$filename = time() . '.' . $image->getClientOriginalExtension();
 		$path = public_path('images/' . $filename);
        Image::make($image->getRealPath())->resize(200, 200)->save($path);
        $adv->imagepath = $filename;        	
 		$adv-> save();
 		return redirect('transaction/adviser');



 	}
 } 

 public function edit($id){

 }

 public function update(Request $req){

 }

 public function status($id,$flag){

 }
 
}
