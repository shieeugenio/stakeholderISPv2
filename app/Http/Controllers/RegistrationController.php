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
        $email = "no";
        if (Auth::check() == true) {
            $email = Auth::user()->email;
        }
        return View('transaction.registration')->with('users',$users)
                                               ->with('try', Auth::check());
    }

    public function register(Request $req){
        $code = $req->input('CaptchaCode');
        $isHuman = captcha_validate($code);
        if ($isHuman == null) {

            $message = "Registration Failed! Verification Code do not match!";
            return Redirect::to('registration')->with('message',$message)
                                               ->with('check', 0);

        }else{
            $validate = users::where('email', '=', $req->username)->first();
            if ($validate === null) {
                $user = new users;
                $user->name = $req->name;
                $user->email = $req->username;
                $user->admintype = $req->type;
                $user->status = 0;
                $user->created_at = date('Y-m-d H:i:s');
                $user->password = bcrypt($req->password);
                $user->save();
                $message = "registration complete";
                return Redirect::to('registration')->with('message',$message)
                                            ->with('check', 1);

            }else{
                $message = "username already exist!";
                return Redirect::to('registration')->with('message',$message)
                                                   ->with('check', 0);
            }

        }
        
    }

    public function approvalSuccess($id){
            $user = users::find($id);
            $user->status = 1;
            $user->save();
            $message = "Account Approved";
            return Redirect::to('registration')->with('message',$message);

    }

    public function approvalCancel($id){
            $user = users::find($id);
            $user->status = 2;
            $user->save();
            $message = "Account denied!";
            return Redirect::to('registration')->with('message',$message);
    }
    

}
