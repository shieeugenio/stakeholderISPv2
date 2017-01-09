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
//Route::get('login', array('uses' => 'HomeController@index'));

//REGISTRATION @author: Ren Buluran
Route::get('registration', 'RegistrationController@index');
Route::post('register', 'RegistrationController@register');

/*
	Route::resource('register', 'RegistrationController@register');

	URL           METHOD          FUNCTION
	register      GET             register
	register/{id} GET             register
	register      POST            register
*/

//MENU @author: Shie Eugenio
Route::get('/', 'AdvDirectoryController@readyPHome'); //public

//LOGIN @author: Ren Buluran
Route::post('validatelogin', array('uses' => 'HomeController@login'));
Route::get('logout', array('uses' => 'HomeController@logout'));


Route::get('home', function() {
	return view('home.defaulthome');

})->middleware('auth'); //admin

Route::get('home', 'AdvDirectoryController@getRecent')->middleware('auth'); //admin


Route::get('maintenance', function () {
    return redirect('maintenance/accategory');
})->middleware('auth');

Route::get('directory', 'AdvDirectoryController@getList')->middleware('auth');


//TRANSACTION @author: Shie Eugenio
Route::get('directory/add', 'AdvDirectoryController@index')->middleware('auth');
Route::resource('modalView', 'AdvDirectoryController@getRecordData');

//DROPDOWN @author: Shie Eugenio
Route::post('dropdown/getsubcateg', 'AdvDirectoryController@getSubCateg');
Route::post('dropdown/getsecoffice', 'AdvDirectoryController@getSecOffice');


//MAINTENANCE @author: Shie Eugenio
Route::get('maintenance/accategory', 'ACCategoryController@index')->middleware('auth');
Route::get('maintenance/acsubcategory','ACSubcategoryController@index')->middleware('auth');
Route::get('maintenance/acposition','ACPositionController@index_acposition')->middleware('auth');
Route::get('maintenance/acsector','acsectorController@index_acsectors')->middleware('auth');
Route::get('maintenance/primaryoffice', 'PoliceOfficesController@index')->middleware('auth');
Route::get('maintenance/secondaryoffice', 'PoliceOfficeTwoController@index')->middleware('auth');
Route::get('maintenance/tertiaryoffice', function() { 
											return view('maintenancetable.policeoffice3_table');
										});
Route::get('maintenance/quarternaryoffice', 'PoliceOfficeFourController@index');

Route::get('maintenance/policeposition','PolicePositionController@index_policeposition')->middleware('auth');


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
Route::post('maintenancetable/PO3CRUD','PO3Controller@PO3CRUD');

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

//QUATERNARY OFFICE OFFICE @author: Lester
Route::post('maintenance/add', 'PoliceOfficeFourController@add');
Route::post('maintenance/policefourview', 'PoliceOfficeFourController@find');
Route::post('maintenance/editpolicefour', 'PoliceOfficeFourController@edit');
Route::post('maintenance/populate', 'PoliceOfficeFourController@populate');

//ADD ADVISER @author: Shie Eugenio
Route::post('adviser/add', 'AdvDirectoryController@addadviser');
Route::post('adviser/edit', 'AdvDirectoryController@editadviser');















///-------------------------------------------------------------------------------------------------------------------------------
//advisory council transac Joanne
Route::get('advisorycouncil', 'AdvisoryCouncilController@index');
Route::post('transac/acCRUD', 'AdvisoryCouncilController@acCRUD');
Route::post('transac/getsub', 'AdvisoryCouncilController@getsub');

/*Route::post('/add', 'AdvisoryCouncilController@add');
Route::get('transac/{id}/edit', 'AdvisoryCouncilController@find');
Route::post('transac/{id}/editAc', 'AdvisoryCouncilController@edit');*/

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


//smart search [ren]
Route::get('search', 'SearchController@index');

//login [ren]
Route::get('login', array('uses' => 'HomeController@index'));
Route::post('login', array('uses' => 'HomeController@login'));
Route::get('logout', array('uses' => 'HomeController@logout'));

//registration[ren]
Route::get('registration', 'RegistrationController@index');
Route::resource('register', 'RegistrationController@register');
Route::get('Accountapproved/{id}', 'RegistrationController@approvalSuccess');
Route::get('Accountdisapproved/{id}','RegistrationController@approvalCancel');

/* admin type 1-Super Admin, 0-Regular Admin 
	approval 0 - default value , 1 - approved, 2-disapproved

*/
//testing [ren]
Route::get('testAdviser','TestController@index');

Route::get('testAdviserAdd','TestController@addAdviser');


//Police Office Four : Resutaa