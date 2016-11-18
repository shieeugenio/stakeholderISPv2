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
    	$sub = ACSubcategory::with('ACCategory')->get();
    	$cat = ACCategory::all();


    	return View ('Maintenance.ACSubcat-index')
    	->with('category',$cat)
    	->with('subcat', $sub);

    }

    public function addView(){
    	return View ('Maintenance.ACCategory');
    }

    public function confirm(Request $req){
        if(isset($_POST['submit'])){
            $cat = new ACSubcategory;
            $cat->categoryname = $req->name;
            $cat->save();
             //Session::flash('mess', 'category successfully added to list!');
            return redirect("cat");
        }
    }

    public function edit($id){
        $cat = ACSubcategory::find($id);
        return View ('Maintenance.ACCategoryedit')->with('category', $cat);
    }

    public function update($id){
        if (isset($_POST['submit'])) {
            $cat = ACSubcategory::find($id);
            $cat->categoryname = $_POST['name'];
            $cat->save();
            return redirect("cat");

        }
    }
}