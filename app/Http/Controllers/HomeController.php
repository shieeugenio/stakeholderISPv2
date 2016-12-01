<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Auth\LoginController;


use Illuminate\Http\Request;
use Redirect;
use Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Foundation\BusDispatchesJobs;
//use IlluminateRoutingController as BaseController;
//use IlluminateFoundationValidationValidatesRequests;
//use IlluminateFoundationAuthAccessAuthorizesRequests;
//use IlluminateFoundationAuthAccessAuthorizesResources;
//use IlluminateHtmlHtmlServiceProvider;
use DB;

class HomeController extends Controller
{
    public function index(){
    	return View ('transaction.login');

    }
    // for future use use Auth::check in if statement 
    //if you need to check if the session for your login is already started. =) [ren]
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
    			$message = "Email or password is incorrect!";
    			
    			return Redirect::to('login')->with('message',$message);
    		}
    	}

    }

    public function logout(){
        Auth::logout();
    }
}


