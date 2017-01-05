<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AC_Subcategory;
use App\Models\AC_Category;
use App\Http\Requests;

class ACSubcategoryController extends Controller
{
    public function index(){
    	$sub = AC_Subcategory::with('category')->get();
    	$cat = AC_Category::all();
    	return View ('maintenancetable.acsubcat_table')->with('category',$cat)->with('subcat', $sub);

    }

    public function confirm(Request $req){
        if(isset($_POST['submit'])){
            $cat = new AC_Subcategory;
            $cat->categoryid = $req->category;
            $cat->subcategoryname = $req->subcat;
            $cat->desc = $req->desc;
            $cat->save();
        }
    }

    public function edit(Request $req){
        $id = $req->id;
        $cat = AC_Subcategory::find($id);
        return $cat;
        
    }

    public function update(Request $req){
        if (isset($_POST['submit'])) {
            $cat = AC_Subcategory::find($req->subcatID);
            $cat->subcategoryname = $req->name;
            $cat->categoryid = $req->catID;
            $cat->desc = $req->desc;
            
            $cat->save();

        }
    }
}