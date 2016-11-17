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

//routes for category
Route::get('cat','ACCategoryController@index');
Route::get('CatForm', 'ACCategoryController@addView');
Route::post("/confirm", 'ACCategoryController@confirm');
Route::post("/ACCategory", function()
	{
		return view("ACCategoryview");
	}

	);
Route::get('Maintenance/{id}/edit','ACCategoryController@edit');
Route::post("Maintenance/{id}/editCommit", "ACCategoryController@update");

//end of category

//routes for subcategory
Route::get('subcategory','ACSubcategoryController@index');
//end of subcategory
Route::resource('maintenance/acsectorform','acsectorController@index_acsectors');
Route::resource('maintenance/insert_acsectors','acsectorController@insert_acsectors');
Route::resource('maintenance/edit_acsectors','acsectorController@edit_acsectors');
Route::resource('maintenance/update_acsectors','acsectorController@update_acsectors');

//This is for Advisory Position Maintenance -- Ore wa Resutaa da :D
Route::resource('maintenance/advisoryposition', 'ACPositionController@index_acposition');
Route::resource('maintenance/acpositioninsert' , 'ACPositionController@acpositioninsert');
Route::resource('maintenance/acpositionedit', 'ACPositionController@acpositionedit');
Route::resource('maintenance/acpositionupdate' , 'ACPositionController@acpositionupdate');

//Police Office
Route::post('/buttonsPoliceOffice', 'PoliceOfficesController@confirmOffice');
Route::post('maintenance/{id}/editpolice', 'PoliceOfficesController@edit');

Route::get('/maintenance/{id}/editpoliceview', 'PoliceOfficesController@find');
Route::get('policeOffice', 'PoliceOfficesController@manageoffice');


//Police Office Second
Route::post('/confirmpolice', 'PoliceOfficeTwoController@confirm');
Route::post('maintenance/{id}/editsubpolice', 'PoliceOfficeTwoController@edit');

Route::get('secondpolice', 'PoliceOfficeTwoController@manageofficetwo');
Route::get('maintenance/{id}/subpoliceview', 'PoliceOfficeTwoController@find');
