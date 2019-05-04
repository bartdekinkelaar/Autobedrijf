<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Website pages
Route::get('/home',     'WebController@home');
Route::get('/service',  'WebController@service');
Route::get('/over',     'WebController@aboutUs');
Route::get('/contact',  'WebController@contact');

//Car pages
Route::resource('cars', 'CarController');
Route::get('/voertuig/{id}', 	'AutoController@specifieke_auto');
Route::get('/occasions', 	'AutoController@index');
Route::post('/occasions', 	'AutoController@indexfilter');
Route::get('/voertuig', 	'AutoController@voertuig');

//CMS pages
Route::get('/CMS/nieuw_voertuig', function () {
     return view('CMS/nieuw_voertuig');
 });

Route::get('/CMS/informatie', function () {
    return view('CMS/informatie');
});

//Route::get('/front', function () {
//    return view('front');
//});

// CMS
Route::get('/CMS', 	        'CMSController@index')->name('CMS.index');
Route::get('/CMS/cars',     'CMSController@allCars')->name('CMS.cars');
Route::get('/CMS/car/{id}', 'CMSController@getCar')->name('CMS.car');
Route::get('/CMS/features', 'CMSController@allFeatures')->name('CMS.features');
Route::get('/CMS/forms',    'CMSController@allForms')->name('CMS.forms');
Route::get('/CMS/pages',    'CMSController@allPages')->name('CMS.pages');
Route::get('/CMS/feature/{id}', 'CMSController@feature')->name('CMS.feature');


//Route::resource('CMS', 'CMSController');
Route::get('/CMS/delete/{id}',      'CMSController@delete')->name('CMS.delete');
Route::get('/CMS/nieuwVoertuig', 	'CMSController@nieuw_voertuig')->name('nieuwVoertuig');
Route::post('/CMS/nieuwVoertuig', 	'CMSController@store');
Route::post('/CMS/informatie',      'CMSController@store_info');
Route::get('/CMS/nieuwKenmerk', 	'CMSController@nieuw_kenmerk')->name('nieuwKenmerk');
Route::post('/CMS/nieuwKenmerk', 	'CMSController@store_kenmerk');
Route::get('/CMS/alle_kenmerken/{number}', 'CMSController@next_kenmerken');
Route::get('/CMS/nieuwFormulier', 	'CMSController@nieuw_formulier')->name('nieuwFormulier');
Route::post('/CMS/nieuwFormulier',  'CMSController@store_formulier');
Route::get('/CMS/nieuwPage',        'CMSController@nieuw_page')->name('nieuwPage');
Route::post('/CMS/nieuwPage',       'CMSController@store_page');
Route::get('/CMS/CMSall_template/{type}',  'CMSController@new_CMSall')->name('ca_template');

Route::get('/{page}', 'PageController@show');