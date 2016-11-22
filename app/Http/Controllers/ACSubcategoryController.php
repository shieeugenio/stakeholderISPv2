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
    	return View ('maintenancetable.acsubcat_table')->with('category',$cat)->with('subcat', $sub);

    }

    public function confirm(Request $req){
        if(isset($_POST['submit'])){
            $cat = new ACSubcategory;
            $cat->categoryid = $req->category;
            $cat->subcategoryname = $req->subcat;
            $cat->acsubcategorycode = $req->subcatcode;
            $cat->desc = $req->desc;
            $cat->save();
             //Session::flash('mess', 'category successfully added to list!');
            return json_encode(redirect("maintenance/subcategory"));
        }
    }

    public function edit($id){
        $id = $req->id;
        $cat = ACSubcategory::find($id);
        return $cat;
        
    }

    public function update(Request $req){
        if (isset($_POST['submit'])) {
            $cat = ACSubcategory::find($req->subcatID);
            $cat->acsubcategorycode = $req->subcatcode;
            $cat->subcategoryname = $req->name;
            $cat->categoryid = $req->catID;
            $cat->desc = $req->desc;
            
            echo  $req;
            
            $cat->save();
            return redirect("subcategory");

        }
    }
}