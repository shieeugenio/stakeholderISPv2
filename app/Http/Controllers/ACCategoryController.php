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
        if(isset($_POST['submit'])){
            $cat = new ACCategory;
            $cat->categoryname = $req->name;
            $cat->save();
             //Session::flash('mess', 'category successfully added to list!');
            return redirect("cat");
        }
    }

    public function edit($id){
        $cat = ACCategory::find($id);
        return View ('Maintenance.ACCategoryedit')->with('category', $cat);
    }

    public function update($id){
        if (isset($_POST['submit'])) {
            $cat = ACCategory::find($id);
            $cat->categoryname = $_POST['name'];
            $cat->save();
            return redirect("cat");

        }
    }

}
