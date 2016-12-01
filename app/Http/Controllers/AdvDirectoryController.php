<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

Illuminate\Http\UploadedFile

class AdvDirectoryController extends Controller {

	public function addadviser(Request $req) {
		$photo = $req->profpic;

		var_dump($photo);

	}//public function addadviser() {

}//class
