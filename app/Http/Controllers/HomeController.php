<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Auth\LoginController;

class HomeController extends Controller
{
    public function index(){

    }
    // for future use use Auth::check in if statement 
    //if you need to check if the session for your login is already started and middleware('auth') for administrative access. =) [ren]
    public function login(Request $req){


        $protocol = array(
                'username' => 'required',
                'password' => 'required|alphaNum|min:3'
            );
        
        $validate = Validator::make($req->all(), $protocol);
        if ($validate->fails()) {
            return Redirect::to('login')->withErrors($validate)
                                      ->withInput($req->except('password'));

        }else{
            
            if (Auth::attempt(['email' => $req->username, 'password' => $req->password])) {
                return Redirect::to('home');
                
                
            }else{
                $message = "Incorrect username or password";
                
                return Redirect::to('/')->with('message',$message);

                //return $message;
            }
        }

    }

    public function logout(){
        Auth::logout();

        return Redirect::to('/')->with('message','');
    }



}