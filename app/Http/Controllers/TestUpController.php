<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestUpController extends Controller {

	public function loadphoto(Request $req) {

		$photo = substr($req->upphoto, strpos($req->upphoto, ",") + 1);

		$dphoto = base64_decode($photo);

		print_r($dphoto);

	}//loadphoto
    
}//class
