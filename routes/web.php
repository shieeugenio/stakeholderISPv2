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

//SHIELA
Route::get('adviser', function () {
    return view('module.adviser');
});

Route::get('maintenance', function () {
    return redirect('maintenance/accategory');
});


///editmaintenance UI [cja] 

Route::get('maintenance/acsubcat', function () {
    return view('maintenancetable.acsubcat_table');
});
Route::get('maintenance/policeoffice', function () {
    return view('maintenancetable.policeoffice_table');
});
Route::get('maintenance/policeoffice2', function () {
    return view('maintenancetable.policeoffice2_table');
});

//Routes for ADVISORY POSITIONS - RESUTAA
Route::get('maintenance/advisoryposition','ACPositionController@index_acposition');
Route::resource('maintenance/acpositioncrud','ACPositionController@acpositioncrud');

//Routes for POLICE POSITIONS - RESUTAA
Route::get('maintenance/policeposition','PolicePositionController@index_policeposition');
Route::resource('maintenance/policepositioncrud','PolicePositionController@policepositioncrud');




//routes for category
Route::get('maintenance/accategory', 'ACCategoryController@index');
Route::get('cat','ACCategoryController@index');
Route::get('CatForm', 'ACCategoryController@addView');
Route::post("/confirm", 'ACCategoryController@confirm');
Route::resource('Maintenance/edit','ACCategoryController@edit');
Route::post("Maintenance/editCommit", "ACCategoryController@update");

//end of category

//routes for subcategory
Route::get('maintenance/subcategory','ACSubcategoryController@index');
Route::get('subform', 'ACSubcategoryController@addView');
Route::post('addcommit', 'ACSubcategoryController@confirm');
Route::get('maintenance/subedit','ACSubcategoryController@edit');
Route::post("Maintenance/{id}/subeditCommit", "ACSubcategoryController@update");

//end of subcategory


//AC SECTOR maintenance w/ui [amps]
Route::get('maintenance/acsector','acsectorController@index_acsectors');
Route::resource('maintenancetable/acsectorCRUD','acsectorController@acsectorCRUD');

//Police Office
Route::post('/buttonsPoliceOffice', 'PoliceOfficesController@add');
Route::post('maintenance/editpolice', 'PoliceOfficesController@edit');


Route::get('maintenance/editpoliceview', 'PoliceOfficesController@find');
Route::get('maintenance/policeoffice', 'PoliceOfficesController@index');


//Police Office Second
Route::post('/confirmpolice', 'PoliceOfficeTwoController@add');
Route::post('maintenance/editsubpolice', 'PoliceOfficeTwoController@edit');

Route::get('secondpolice', 'PoliceOfficeTwoController@manageofficetwo');
Route::get('maintenance/{id}/subpoliceview', 'PoliceOfficeTwoController@find');


//ADVISER LESTER
Route::get('maintenance/trainingsample', 'TrainingController@index');
Route::post('maintenance/store', 'TrainingController@store');
