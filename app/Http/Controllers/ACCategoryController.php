<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ACCategory;
use App\Http\Requests;


class ACCategoryController extends Controller
{
    public function index(){
    	$cat = ACCategory::all();

    	return View ('Maintenance.ACCat-index')->with('category',$cat);

    }

    public function addView(){
    	return View ('Maintenance.ACCategory');
    }

    public function confirm(Request $req){
        if(isset($_POST['button'])){
            $cat = new ACCategory;
            $cat->categoryname = $req->name;
            $cat->save();

    return redirect("Maintenance\ACCategory");
        }
    }

    public function insert(Request $req){
    
    }

    public function update(){

    }
    public function delete(){

    }

}
