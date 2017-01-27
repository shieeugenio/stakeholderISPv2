<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\users;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\RegisterController;
use Redirect;

class RegistrationController extends Controller
{
    public function index(){
        $reqlist = users::where('status', '<>', '0')
                        ->orderBy('created_at','desc')
                        ->union(users::where('status', '=', '0')
                                    ->orderBy('created_at','desc'))
                        ->get();
       return View('admin.admin_table')->with('users',$reqlist);

        //return $reqlist;
    }//index

    public function register(Request $req){

        $user = new users;
        $user->name = $req->name;
        $user->email = $req->username;

        if($req->source == 1) {
            $user->admintype = $req->admintype;

        }//if

        $user->status = $req->status;
        $user->created_at = date('Y-m-d H:i:s');
        $user->password = bcrypt($req->password);
        $user->save();

    }//register

    public function checkusername(Request $req) {
        $validate = users::where('email', '=', $req->username)->first();

        return sizeof($validate);

    }//checkusername

    public function getuser(Request $req) {
        $user = users::find($req->id);
        return $user;
    }//public function getuser(Request $req) {

    public function setstatus(Request $req){
        $user = users::find($req->id);
        $user->status = $req->status;

        if($req->status == 1) {
            $user->admintype = $req->admintype;
        }// if($req->status == 1) {

        $user->save();

    }//approve
    
}
