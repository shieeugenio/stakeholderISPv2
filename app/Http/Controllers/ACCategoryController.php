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

    	return View ('maintenancetable.accateg_table')->with('category',$cat);

    }

    public function addView(){
    	return View ('Maintenance.ACCategory');
    }

    public function confirm(Request $req){
        if(isset($_POST['submit'])){
            $cat = new ACCategory;
            $cat->accategorycode = $req->code;
            $cat->categoryname = $req->name;
            $cat->desc = $req->desc;

            $cat->save();
             //Session::flash('mess', 'category successfully added to list!');
            return redirect("cat");
        }
    }

    public function edit($id){
        $cat = ACCategory::find($id);
        return $cat;
    }

    public function update(Request $req){
        if (isset($_POST['submit'])) {
            $cat = ACCategory::find($req->catID);
            $cat->categoryname = $req->name;
            $cat->accategorycode = $req->code;
            $cat->desc = $req->desc;
            $cat->save();
            return redirect("cat");

        }
    }

}
