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
    return view('module.maintenance');
});


///editmaintenance UI [cja] 
Route::resource('maintenancetable/acsector','acsectorController@index_acsectors');
//Route::resource('maintenancetable/acsector','acsectorController@insert_acsectors');

/*Route::get('maintenancetable/acsector', function () {
    return view('maintenancetable.acsector_table');
});*/
Route::get('maintenancetable/acsubcat', function () {
    return view('maintenancetable.acsubcat_table');
});
Route::get('maintenancetable/advisoryposition', function () {
    return view('maintenancetable.advisoryposition_table');
});
Route::get('maintenancetable/policeposition', function () {
    return view('maintenancetable.policeposition_table');
});
Route::get('maintenancetable/policeoffice', function () {
    return view('maintenancetable.policeoffice_table');
});
Route::get('maintenancetable/policeoffice2', function () {
    return view('maintenancetable.policeoffice2_table');
});


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

//This is for Police  Maintenance -- Ore wa Resutaa da :D
Route::resource('maintenance/policeposition', 'PolicePositionController@index_policeposition');
Route::resource('maintenance/policepositioninsert' , 'PolicePositionController@policepositioninsert');
Route::resource('maintenance/policepositionedit', 'PolicePositionController@policepositionedit');
Route::resource('maintenance/policepositionupdate' , 'PolicePositionController@policepositionupdate');