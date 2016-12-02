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

//LOGIN @author: Ren Buluran
Route::get('login', array('uses' => 'HomeController@index'));
Route::post('login', array('uses' => 'HomeController@login'));
Route::get('logout', array('uses' => 'HomeController@logout'));

//REGISTRATION @author: Ren Buluran
Route::get('registration', 'RegistrationController@index');
Route::resource('register', 'RegistrationController@register');

//MENU @author: Shie Eugenio
Route::get('/', 'AdvDirectoryController@readyPHome'); //public


Route::get('home', function() {
	
            
	return view('home.defaulthome');

})->middleware('auth'); //admin


Route::get('home', 'AdvDirectoryController@getRecent'); //admin


Route::get('maintenance', function () {
    return redirect('maintenance/accategory');
})->middleware('auth');

Route::get('directory', 'AdvDirectoryController@getList')->middleware('auth');


//TRANSACTION @author: Shie Eugenio
Route::get('directory/add', 'AdvDirectoryController@index')->middleware('auth');
Route::post('directory/store', 'ProfileController@store');
Route::post('directory/getinfo', 'ProfileController@getinfo');

//DROPDOWN @author: Shie Eugenio
Route::post('dropdown/getsubcateg', 'AdvDirectoryController@getSubCateg');
Route::post('dropdown/getsecoffice', 'AdvDirectoryController@getSecOffice');


//MAINTENANCE @author: Shie Eugenio
Route::get('maintenance/accategory', 'ACCategoryController@index')->middleware('auth');;
Route::get('maintenance/acsubcategory','ACSubcategoryController@index')->middleware('auth');;
Route::get('maintenance/acposition','ACPositionController@index_acposition')->middleware('auth');;
Route::get('maintenance/acsector','acsectorController@index_acsectors')->middleware('auth');;
Route::get('maintenance/primaryoffice', 'PoliceOfficesController@index')->middleware('auth');;
Route::get('maintenance/secondaryoffice', 'PoliceOfficeTwoController@index')->middleware('auth');;
Route::get('maintenance/policeposition','PolicePositionController@index_policeposition')->middleware('auth');;


//BACK-END

//AC CATEGORY @author: Shie Eugenio
Route::post("accategory/add", 'ACCategoryController@confirm');
Route::post('accategory/view','ACCategoryController@edit');
Route::post("accategory/edit", "ACCategoryController@update");

//AC SUBCATEGORY @author: Ren Buluran
Route::post('acsubcategory/add', 'ACSubcategoryController@confirm');
Route::post('acsubcategory/view','ACSubcategoryController@edit');
Route::post("acsubcategory/edit", "ACSubcategoryController@update");

//AC POSITION @author: Lester Acula
Route::post('maintenance/acpositioncrud','ACPositionController@acpositioncrud');

//AC SECTOR @author: Christine Amper
Route::post('maintenancetable/acsectorCRUD','acsectorController@acsectorCRUD');

//PRIMARY OFFICE @author: Joanne Dasig
Route::post('/buttonsPoliceOffice', 'PoliceOfficesController@add');
Route::post('maintenance/editpolice', 'PoliceOfficesController@edit');
Route::post('maintenance/editpoliceview', 'PoliceOfficesController@find');

//SECONDARY OFFICE @author: Joanne Dasig
Route::post('/confirmpolice', 'PoliceOfficeTwoController@add');
Route::post('maintenance/subpoliceview', 'PoliceOfficeTwoController@find');
Route::post('maintenance/editsubpolice', 'PoliceOfficeTwoController@edit');

//POLICE POSITION @author: Lester Acula
Route::post('maintenance/policepositioncrud','PolicePositionController@policepositioncrud');

//TRANSACTION

//ADD ADVISER @author: Shie Eugenio
Route::post('adviser/add', 'AdvDirectoryController@addadviser');
Route::post('adviser/edit', 'AdvDirectoryController@editadviser');















///-------------------------------------------------------------------------------------------------------------------------------
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

