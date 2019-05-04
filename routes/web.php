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

Route::get('/', function () {
    return view('home');
});
Route::get('/overons', function () {
    return view('over_ons');
});

Route::get('/service', function () {
    return view('service');
});

Route::get('/CMS/nieuw_voertuig', function () {
     return view('CMS/nieuw_voertuig');
 });

Route::get('/CMS/informatie', function () {
    return view('CMS/informatie');
});

Route::get('/front', function () {
    return view('front');
});

// CMS
Route::get('/CMS', 				    'CMSController@index')->name('cms_home');
Route::get('/CMS/voertuig/{id}', 	'CMSController@specifiek_voertuig');
Route::get('/CMS/delete/{id}',      'CMSController@delete')->name('CMS.delete');
Route::get('/CMS/alle_voertuigen', 	'CMSController@alle_voertuigen')->name('alle_voertuigen');
Route::get('/CMS/nieuwVoertuig', 	'CMSController@nieuw_voertuig')->name('nieuwVoertuig');
Route::post('/CMS/nieuwVoertuig', 	'CMSController@store');
Route::post('/CMS/informatie',      'CMSController@store_info');
Route::get('/CMS/alle_kenmerken',   'CMSController@alle_kenmerken')->name('alle_kenmerken');
Route::get('/CMS/nieuwKenmerk', 	'CMSController@nieuw_kenmerk')->name('nieuwKenmerk');
Route::post('/CMS/nieuwKenmerk', 	'CMSController@store_kenmerk');
Route::get('/CMS/alle_kenmerken/{number}', 'CMSController@next_kenmerken');
Route::get('/CMS/kenmerk/{id}',     'CMSController@specifiek_kenmerk');
Route::get('/CMS/alle_formulieren', 'CMSController@alle_formulieren')->name('alle_formulieren');
Route::get('/CMS/nieuwFormulier', 	'CMSController@nieuw_formulier')->name('nieuwFormulier');
Route::post('/CMS/nieuwFormulier',  'CMSController@store_formulier');
Route::get('/CMS/alle_pages',       'CMSController@alle_pages')->name('alle_pages');
Route::get('/CMS/nieuwPage',        'CMSController@nieuw_page')->name('nieuwPage');
Route::post('/CMS/nieuwPage',       'CMSController@store_page');
Route::get('/CMS/CMSall_template/{type}',  'CMSController@new_CMSall')->name('ca_template');

//Algemeen
Route::get('/voertuig/{id}', 	'AutoController@specifieke_auto');
Route::get('/occasions', 	'AutoController@index');
Route::post('/occasions', 	'AutoController@indexfilter');
Route::get('/voertuig', 	'AutoController@voertuig');
Route::get('/contact',      'AutoController@contact');

Route::get('/{page}', 'PageController@show');