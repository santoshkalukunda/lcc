<?php

use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Auth::routes();
Route::get('home', 'HomeController@index')->name('home');
Route::get('list','UserListController@index')->name('list.index');
Route::post('destroy/{id}','UserListController@destroy')->name('user_destroy');
Route::get('cahngepassword','UserListController@changepassword')->name('user_changepassword');
Route::post('cahngepassword','UserListController@changepasswordupdate')->name('user_changepassword_update');


Route::get('home/search', 'HomeController@search')->name('live_search.action');
Route::resource('company', 'CompanyInfoController')->middleware('auth');
Route::resource('document', 'DocumentController')->middleware('auth');

// Must be before Shareholder Resource route
Route::get('shareholder/view/{id}', 'ShareholderSearchController@view')->name('shareholder.view')->middleware('auth');;
Route::get('shareholder/search', 'ShareholderSearchController@show')->name('shareholder-search')->middleware('auth');;
Route::any('shareholder/search/result', 'ShareholderSearchController@search')->name('shareholder-search.result');

Route::resource('shareholder', 'ShareholderController')->middleware('auth');
Route::any('search', 'SearchController@search')->name('company-search')->middleware('auth');
Route::any('search/list', 'SearchController@searchlist')->name('company-search-list')->middleware('auth');
Route::any('search/changename', 'SearchController@changename')->name('namechange.search')->middleware('auth');
Route::get('report/company','CompanyReportController@index')->name('company.report')->middleware('auth');
Route::post('report/company','CompanyReportController@report')->name('company.report.show')->middleware('auth');
Route::resource('renew','RenewController')->middleware('auth');
Route::resource('namechange','NamechangeController')->middleware('auth');


Route::any('documentreport','DocumentreportController@index')->name('documentreport.index');
Route::any('documentreport/search', 'SearchController@documentreport')->name('documentreport.search')->middleware('auth');
Route::post('documetreport/edit/{id}','DocumentreportController@edit')->name('documentreport.edit')->middleware('auth');
Route::resource('setdate','SetdateController')->middleware('auth');
Route::any('search/renew', 'SearchController@renew')->name('renew.search')->middleware('auth');

Route::resource('audit','AuditController')->middleware('auth');
Route::any('search/audit', 'SearchController@audit')->name('audit.search')->middleware('auth');

