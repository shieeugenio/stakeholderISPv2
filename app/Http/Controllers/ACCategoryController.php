<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AC_Category;
use App\Http\Requests;


class ACCategoryController extends Controller
{
    public function index(){
    	$cat = AC_Category::all();

    	return View ('maintenancetable.accateg_table')->with('category',$cat);

    }

    public function confirm(Request $req){
        if(isset($_POST['submit'])){
            $cat = new AC_Category;
            $cat->accategorycode = $req->code;
            $cat->categoryname = $req->name;
            $cat->desc = $req->desc;

            $cat->save();
            return "Saved!";
        }
    }

    public function edit(Request $req){
        $id = $req->id;
        $cat = ACCategory::find($id);
        return $cat;
    }

    public function update(Request $req){
        if (isset($_POST['submit'])) {
            $cat = AC_Category::find($req->catID);
            $cat->categoryname = $req->name;
            $cat->accategorycode = $req->code;
            $cat->desc = $req->desc;
            $cat->save();
        }
    }

}
