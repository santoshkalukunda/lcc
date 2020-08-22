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
Route::get('home/search', 'HomeController@search')->name('live_search.action');
Route::resource('company', 'CompanyInfoController')->middleware('auth');
Route::resource('document', 'DocumentController')->middleware('auth');

// Must be before Shareholder Resource route
Route::get('shareholder/view/{id}', 'ShareholderSearchController@view')->name('shareholder.view')->middleware('auth');;
Route::get('shareholder/search', 'ShareholderSearchController@show')->name('shareholder-search')->middleware('auth');;
Route::any('shareholder/search/result', 'ShareholderSearchController@search')->name('shareholder-search.result');

Route::resource('shareholder', 'ShareholderController')->middleware('auth');
Route::any('search', 'SearchController@search')->name('company-search')->middleware('auth');
Route::get('report/company','CompanyReportController@index')->name('company.report')->middleware('auth');;
Route::post('report/company','CompanyReportController@report')->name('company.report.show')->middleware('auth');;




Route::any('dash', 'SearchController@dash')->name('dash');
