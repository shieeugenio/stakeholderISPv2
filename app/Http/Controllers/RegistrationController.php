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
        $users = users::where('status', '=', '0')->get();
        return View('transaction.registration')->with('users',$users);
    }

    public function register(Request $req){

        $user = new users;
        $user->name = $req->name;
        $user->email = $req->username;

        if($req->source == 1) {
            $user->admintype = $req->type;

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

    public function approvalSuccess($id){
        $user = users::find($id);
        $user->status = 1;
        $user->save();
        $message = "Account Approved";
        return Redirect::to('registration')->with('message',$message);

    }//approve

    public function approvalCancel($id){
        $user = users::find($id);
        $user->status = 2;
        $user->save();
        $message = "Account denied!";
        
        return Redirect::to('registration')->with('message',$message);
    }//disapprove
    

}
