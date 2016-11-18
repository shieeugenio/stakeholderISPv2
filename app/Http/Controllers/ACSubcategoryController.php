<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ACSubcategory;
use App\Models\ACCategory;
use App\Http\Requests;

class ACSubcategoryController extends Controller
{
    public function index(){
    	$sub = ACSubcategory::with('category')->get();
    	$cat = ACCategory::all();
    	return View ('Maintenance.ACSubcat-index')->with('category',$cat)->with('subcat', $sub);

    }

    public function addView(){
    	return View ('Maintenance.ACCategory');
    }

    public function confirm(Request $req){
        if(isset($_POST['submit'])){
            $cat = new ACSubcategory;
            $cat->categoryid = $req->category;
            $cat->subcategoryname = $req->subcat;
            $cat->save();
             //Session::flash('mess', 'category successfully added to list!');
            return redirect("subcategory");
        }
    }

    public function edit($id){
        $subcat = ACSubcategory::find($id);
        $cat = ACCategory::all();
        return View ('Maintenance.acsubcategoryedit')->with('subcategory', $subcat)->with('cat',$cat);
    }

    public function update($id){
        if (isset($_POST['submit'])) {
            $cat = ACSubcategory::find($id);
            $cat->subcategoryname = $_POST['name'];
            $cat->categoryid = $_POST['catID'];
            //echo  $_POST['catID'];

            $cat->save();
            return redirect("subcategory");

        }
    }
}