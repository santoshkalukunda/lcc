<?php

use App\Download;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;


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
    $profile = DB::table('profiles')->first();
    return view('welcome')->with('profile', $profile);
});
Route::get('downloads', function () {
    $download = Download::latest()->get();
    return view('downloads')->with('download', $download);
});
Route::get('contact-us', function () {
    return view('contact-us');
});

Auth::routes();

Route::get('home/', 'HomeController@index')->name('home');
Route::get('user/list', 'UserListController@index')->name('list.index')->middleware('auth');
Route::post('user/destroy/{id}', 'UserListController@destroy')->name('user_destroy')->middleware('auth');
Route::get('user/cahngepassword', 'UserListController@changepassword')->name('user_changepassword')->middleware('auth');
Route::get('user/cahngepassword/{id}', 'UserListController@changepasswordid')->name('user_changepassword_id')->middleware('auth');
Route::post('user/cahngepassword', 'UserListController@changepasswordupdate')->name('user_changepassword_update')->middleware('auth');
Route::get('user/edit/{user}', 'UserListController@edit')->name('user_edit')->middleware('auth');
Route::post('user/edit/{user}', 'UserListController@update')->name('user_update')->middleware('auth');


Route::get('home/search', 'HomeController@search')->name('live_search.action')->middleware('auth');
// Must be before company Resource route
Route::get('company/report', 'CompanyReportController@index')->name('company.report')->middleware('auth');
Route::post('company/report', 'CompanyReportController@report')->name('company.report.show')->middleware('auth');

Route::resource('company', 'CompanyInfoController')->middleware('auth');
Route::resource('document', 'DocumentController')->middleware('auth');

// Must be before Shareholder Resource route
Route::any('shareholder/search', 'ShareholderSearchController@search')->name('shareholder-search.result');
Route::get('shareholder/search/{id}', 'ShareholderSearchController@view')->name('shareholder.view')->middleware('auth');;
Route::post('shareholder/search/list', 'ShareholderSearchController@searchlist')->name('shareholder.search.list')->middleware('auth');;

Route::resource('shareholder', 'ShareholderController')->middleware('auth');
Route::any('search', 'SearchController@search')->name('company-search')->middleware('auth');
Route::any('search/list', 'SearchController@searchlist')->name('company-search-list')->middleware('auth');
Route::any('search/changename', 'SearchController@changename')->name('namechange.search')->middleware('auth');

Route::resource('renew', 'RenewController')->middleware('auth');
Route::resource('namechange', 'NamechangeController')->middleware('auth');


Route::any('documentreport', 'DocumentreportController@index')->name('documentreport.index')->middleware('auth');
Route::any('documentreport/search', 'SearchController@documentreport')->name('documentreport.search')->middleware('auth');
Route::post('documetreport/edit/{id}', 'DocumentreportController@edit')->name('documentreport.edit')->middleware('auth');
Route::resource('setdate', 'SetdateController')->middleware('auth');
Route::any('search/renew', 'SearchController@renew')->name('renew.search')->middleware('auth');

Route::resource('audit', 'AuditController')->middleware('auth');
Route::any('search/audit', 'SearchController@audit')->name('audit.search')->middleware('auth');

Route::resource('profile', 'ProfileController')->middleware('auth');

Route::resource('capital', 'CapitalController')->middleware('auth');

Route::resource('custommail', 'CustommailController')->middleware('auth');
Route::post('namchangemail/{id}', 'ManualMailController@namechangemail')->name('namechange.mail')->middleware('auth');
Route::post('allnamchangemail', 'ManualMailController@allnamechangemail')->name('allnamechange.mail')->middleware('auth');
Route::post('documentmail/{id}', 'ManualMailController@documentreportmail')->name('documentreport.mail')->middleware('auth');
Route::post('auditmail/{id}', 'ManualMailController@auditreportmail')->name('auditreport.mail')->middleware('auth');
Route::post('renewmail/{id}', 'ManualMailController@renewreportmail')->name('renewreport.mail')->middleware('auth');
Route::post('companyshareholder/{id}', 'ManualMailController@comapanyshareholdermail')->name('companyshareholder.mail')->middleware('auth');
Route::post('allshareholder', 'ManualMailController@allshareholdermail')->name('allshareholder.mail')->middleware('auth');
Route::post('alldocumentmail', 'ManualMailController@alldocumentreportmail')->name('alldocumentreport.mail')->middleware('auth');
Route::post('allauditmail', 'ManualMailController@allauditreportmail')->name('allauditreport.mail')->middleware('auth');
Route::post('allrenewmail', 'ManualMailController@allrenewreportmail')->name('allrenewreport.mail')->middleware('auth');


Route::get('sherepurchasesele', 'SearchController@sherepurchasesele')->name('company-sherepurchasesele')->middleware('auth');
Route::any('sherepurchasesele', 'SearchController@sherepurchaseselesearch')->name('company-sherepurchasesele-search')->middleware('auth');

Route::get('capitalincrease', 'SearchController@capitalincrease')->name('company-capitalincrease')->middleware('auth');
Route::any('capitalincrease', 'SearchController@capitalincreasesearch')->name('company-capitalincrease-search')->middleware('auth');

Route::post('contactus', 'ContactUsController@store')->name('contactus.store');
Route::get('contactus', 'ContactUsController@index')->name('contactus.index')->middleware('auth');
Route::any('contactus/{id}', 'ContactUsController@destroy')->name('contactus.destroy')->middleware('auth');
Route::resource('thresholddate', 'ThresholddateController')->middleware('auth');
Route::resource('documenttype', 'DocumenttypeController')->middleware('auth');
Route::resource('fee', 'FeeController')->middleware('auth');
Route::resource('download', 'DownloadController')->middleware('auth');
Route::get('clear_cache', function () {

    \Illuminate\Support\Facades\Artisan::call('make:model test');

    dd("Cache is cleared");

});
