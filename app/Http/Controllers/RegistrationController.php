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
        return View('transaction.registration');
    }

    public function register(Request $req){
        $validate = users::where('email', '=', $req->username)->first();
        if ($validate === null) {
            $user = new users;
            $user->name = $req->name;
            $user->email = $req->username;
            $user->type = $req->type;
            $user->status = 0;
            $user->created_at = date('Y-m-d H:i:s');
            $user->password = bcrypt($req->password);
            $user->save();
            $message = "registration complete";
            return Redirect::to('login')->with('message',$message);

        }else{
            $message = "username already exist!";
            return Redirect::to('registration')->with('message',$message);
        }
    }

    public function approvalSuccess(Request $req){
            $user = users::find($req->id);
            $user->status = 1;
            $user->save();
    }

    public function approvalCancel(Request $req){
            $user = users::find($req->id);
            $user->status = 2;
            $user->save();
    }
    

}
