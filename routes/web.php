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

Route::get('/', 'AdvDirectoryController@readyPHome'); //public


Route::get('home', 'AdvDirectoryController@getRecent'); //admin


Route::get('maintenance', function () {
    return redirect('maintenance/accategory');
});

Route::get('directory', 'AdvDirectoryController@getList');


//TRANSACTION
Route::get('directory/add', 'AdvDirectoryController@index');
Route::post('directory/store', 'ProfileController@store');
Route::post('directory/getinfo', 'ProfileController@getinfo');

//DROPDOWN
Route::post('dropdown/getsubcateg', 'AdvDirectoryController@getSubCateg');
Route::post('dropdown/getsecoffice', 'AdvDirectoryController@getSecOffice');


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
Route::get('transaction/trainingsample', 'TrainingController@index');
Route::post('transaction/trainingcrud', 'TrainingController@trainingcrud');

//Lecturer
Route::get('transaction/lecturer','LecturerController@index');
Route::post('transaction/lectcrud', 'LecturerController@lectcrud');

//POLICE POSITION
Route::post('maintenance/policepositioncrud','PolicePositionController@policepositioncrud');

//profile 

//TRANSACTION

//ADD ADVISER

Route::resource('adviser/add', 'AdvDirectoryController@addadviser');
Route::post('adviser/edit', 'AdvDirectoryController@editadviser');


///----------------------------------------------------------------------
//advisory council transac Joanne
Route::get('advisorycouncil', 'AdvisoryCouncilController@index');

Route::post('/add', 'AdvisoryCouncilController@add');
Route::get('transac/{id}/edit', 'AdvisoryCouncilController@find');
Route::post('transac/{id}/editAc', 'AdvisoryCouncilController@edit');

// Route::get('/subcatOptions', 'AdvisoryCouncilController@cityOptions');

//Police Advisory transac Joanne
Route::get('policeadvisory', 'PoliceAdvisoryController@index');

Route::post('/addpolice', 'PoliceAdvisoryController@add');
Route::get('policeadv/{id}/edit', 'PoliceAdvisoryController@find');
Route::post('policeadv/{id}/editpolice', 'PoliceAdvisoryController@edit');

//profile [ren]
Route::get('transaction/adviser','ProfileController@index');
Route::post('transaction/addadvisers','ProfileController@store');
Route::get('transaction/advedt','ProfileController@edit');






