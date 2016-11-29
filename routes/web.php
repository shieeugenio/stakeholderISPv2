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

//MENU

Route::get('/', function() {
	return view('home.defaultphome');

}); //public

Route::get('home', function() {
	return view('home.defaulthome');

}); //admin

Route::get('directory', function () {
    return view('module.adviser');
});

Route::get('directory/add', function () {
    return view('module.adviser_add');
});


Route::get('maintenance', function () {
    return redirect('maintenance/accategory');
});


//MAINTENANCE
Route::get('maintenance/accategory', 'ACCategoryController@index');
Route::get('maintenance/acsubcategory','ACSubcategoryController@index');
Route::get('maintenance/acposition','ACPositionController@index_acposition');
Route::get('maintenance/acsector','acsectorController@index_acsectors');
Route::get('maintenance/primaryoffice', 'PoliceOfficesController@index');
Route::get('maintenance/secondaryoffice', 'PoliceOfficeTwoController@index');
Route::get('maintenance/policeposition','PolicePositionController@index_policeposition');


//BACK-END

//AC CATEGORY
Route::post("accategory/add", 'ACCategoryController@confirm');
Route::post('accategory/view','ACCategoryController@edit');
Route::post("accategory/edit", "ACCategoryController@update");

//AC SUBCATEGORY
Route::post('acsubcategory/add', 'ACSubcategoryController@confirm');
Route::post('acsubcategory/view','ACSubcategoryController@edit');
Route::post("acsubcategory/edit", "ACSubcategoryController@update");

//AC POSITION
Route::post('maintenance/acpositioncrud','ACPositionController@acpositioncrud');

//AC SECTOR
Route::post('maintenancetable/acsectorCRUD','acsectorController@acsectorCRUD');

//PRIMARY OFFICE
Route::post('/buttonsPoliceOffice', 'PoliceOfficesController@add');
Route::post('maintenance/editpolice', 'PoliceOfficesController@edit');
Route::post('maintenance/editpoliceview', 'PoliceOfficesController@find');

//SECONDARY OFFICE
Route::post('/confirmpolice', 'PoliceOfficeTwoController@add');
Route::post('maintenance/subpoliceview', 'PoliceOfficeTwoController@find');
Route::post('maintenance/editsubpolice', 'PoliceOfficeTwoController@edit');


Route::get('secondpolice', 'PoliceOfficeTwoController@manageofficetwo');
Route::get('maintenance/{id}/subpoliceview', 'PoliceOfficeTwoController@find');


//ADVISER LESTER
Route::get('maintenance/trainingsample', 'TrainingController@index');
Route::post('maintenance/store', 'TrainingController@store');

//POLICE POSITION
Route::post('maintenance/policepositioncrud','PolicePositionController@policepositioncrud');
//profile [ren]
Route::get('transaction/adviser','ProfileController@index');
Route::post('transaction/addadvisers','ProfileController@store');
Route::get('transaction/advedt','ProfileController@edit');
