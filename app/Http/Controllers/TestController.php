<?php

namespace App\Http\Controllers;
use App\Models\Advisers;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(){
    	return View ('transaction.advisers');
    }

    public function addAdviser(Request $req){
    	$adv = new Advisers;
 		$adv->fname = $req->fname;
 		$adv->lname = $req->lname;
 		$adv->mname = $req->mname;
 		$adv->gender = $req->gender;
 		$adv->contactno = $req->contact;
 		$adv->landline = $req->landline;
 		$adv->street = $req->street;
 		$adv->barangay = $req->barangay;
 		$adv->city = $req->city;
 		$adv->province = $req->province;
 		$adv->email = $req->email;
 		$adv->startdate = $req->startDate;
 		$adv->fbuser = $req->fb;
 		$adv->twitteruser = $req->twitter;
 		$adv->iguser = $req->ig;
 		$adv->birthdate = $req->birthday;
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
    }
}
