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
Route::get('maintenance/advisoryposition', function () {
    return view('maintenancetable.advisoryposition_table');
});
Route::get('maintenance/policeposition', function () {
    return view('maintenancetable.policeposition_table');
});
Route::get('maintenance/policeoffice', function () {
    return view('maintenancetable.policeoffice_table');
});
Route::get('maintenance/policeoffice2', function () {
    return view('maintenancetable.policeoffice2_table');
});

//Routes for ADVISORY POSITIONS - RESUTAA
Route::resource('maintenancetable/advisoryposition_table', 'ACPositionController@index_acposition');
Route::get('acposition','ACPositionController@index_acposition');
Route::resource('maintenancetable/acpositioncrud','ACPositionController@acpositioncrud');

//Routes for ADVISORY POSITIONS - RESUTAA
Route::resource('maintenancetable/policeposition_table', 'PolicePositionController@index_policeposition');
Route::get('policeposition','PolicePositionController@index_policeposition');
Route::resource('maintenancetable/policepositioncrud','PolicePositionController@policepositioncrud');




//routes for category
Route::get('maintenance/accategory', 'ACCategoryController@index');
Route::get('cat','ACCategoryController@index');
Route::get('CatForm', 'ACCategoryController@addView');
Route::post("/confirm", 'ACCategoryController@confirm');
Route::resource('Maintenance/edit','ACCategoryController@edit');
Route::post("Maintenance/editCommit", "ACCategoryController@update");

//end of category

//routes for subcategory
Route::get('subcategory','ACSubcategoryController@index');
Route::get('subform', 'ACSubcategoryController@addView');
Route::post('addcommit', 'ACSubcategoryController@confirm');
Route::get('Maintenance/{id}/subedit','ACSubcategoryController@edit');
Route::post("Maintenance/{id}/subeditCommit", "ACSubcategoryController@update");

//end of subcategory

//AC SECTOR - @tineamps
Route::resource('maintenance/acsectorform','acsectorController@index_acsectors');
Route::resource('maintenance/insert_acsectors','acsectorController@insert_acsectors');
Route::resource('maintenance/edit_acsectors','acsectorController@edit_acsectors');
Route::resource('maintenance/update_acsectors','acsectorController@update_acsectors');

//AC SECTOR maintenance w/ui [amps]
Route::resource('maintenance/acsector','acsectorController@index_acsectors');
Route::resource('maintenancetable/acsectorCRUD','acsectorController@acsectorCRUD');

//This is for Advisory Position Maintenance -- Ore wa Resutaa da :D
Route::resource('maintenance/advisoryposition', 'ACPositionController@index_acposition');
Route::resource('maintenance/acpositioninsert' , 'ACPositionController@acpositioninsert');
Route::resource('maintenance/acpositionedit', 'ACPositionController@acpositionedit');
Route::resource('maintenance/acpositionupdate' , 'ACPositionController@acpositionupdate');

//Police Office
Route::post('/buttonsPoliceOffice', 'PoliceOfficesController@add');
Route::post('maintenance/editpolice', 'PoliceOfficesController@edit');


Route::get('maintenance/editpoliceview', 'PoliceOfficesController@find');
Route::get('maintenance/policeoffice', 'PoliceOfficesController@index');


//Police Office Second
Route::post('/confirmpolice', 'PoliceOfficeTwoController@add');
Route::post('maintenance/{id}/editsubpolice', 'PoliceOfficeTwoController@edit');

Route::get('maintenance/policeoffice2', 'PoliceOfficeTwoController@index');
Route::get('maintenance/subpoliceview', 'PoliceOfficeTwoController@find');

//This is for Police  Maintenance -- Ore wa Resutaa da :D
Route::resource('maintenance/policeposition', 'PolicePositionController@index_policeposition');
Route::resource('maintenance/policepositioninsert' , 'PolicePositionController@policepositioninsert');
Route::resource('maintenance/policepositionedit', 'PolicePositionController@policepositionedit');
Route::resource('maintenance/policepositionupdate' , 'PolicePositionController@policepositionupdate');