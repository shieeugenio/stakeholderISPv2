<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view("welcome");

   
});
Route::get('cat','ACCategoryController@index');

//Route::get("/category","ACCategoryController@index");
Route::get('CatForm', 'ACCaqtegoryController@addView');
Route::post("/confirm", 'ACCategoryController@confirm');
Route::post("/ACCategory", function()
	{
		return view("ACCategoryview");
	}

	);