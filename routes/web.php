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
Route::get('/home',     'WebController@home')->name('home');
Route::get('/service',  'WebController@service')->name('service');
Route::get('/over',     'WebController@aboutUs')->name('aboutUs');
Route::get('/contact',  'WebController@contact')->name('contact');

//Car pages
Route::resource('cars', 'CarController');
//Route::get('/car/{id}', 	'CarController@specifieke_auto');
//Route::get('/cars', 	'AutoController@index')->name('cars');
Route::post('/cars', 	'AutoController@indexfilter');
//Route::get('/car', 	'AutoController@voertuig')->name('car');

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
Route::get('/CMS/delete/{id}',  'CMSController@delete')->name('CMS.delete');
Route::get('/CMS/newCar', 	    'CMSController@newCar')->name('newCar');
Route::get('/CMS/newFeature',   'CMSController@newFeature')->name('newFeature');
Route::get('/CMS/newPage',      'CMSController@newPage')->name('newPage');
Route::get('/CMS/newForm', 	    'CMSController@newForm')->name('newForm');
Route::post('/CMS/newCar', 	    'CMSController@store');
Route::post('/CMS/informatie',  'CMSController@store_info');
Route::post('/CMS/newFeature',  'CMSController@store_kenmerk');
Route::post('/CMS/newForm',     'CMSController@store_formulier');
Route::post('/CMS/newPage',     'CMSController@store_page');
Route::get('/CMS/alle_kenmerken/{number}',  'CMSController@next_kenmerken');
Route::get('/CMS/CMSall_template/{type}',   'CMSController@new_CMSall')->name('ca_template');

Route::get('/{page}', 'PageController@show');