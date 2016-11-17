<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ACCategory;


class ACCategoryController extends Controller
{
    public function index(){

    }

    public function create(){

    }

    public function insert(Request $req){
    $cat = $req->all();
    $acCat = ACCategory::Create($cat);

    return redirect()->route('category');

    }

    public function update(){

    }
    public function delete(){

    }

}
