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
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/search','HomeController@search');
Route::resource('/company','CompanyInfoController')->middleware('auth');
Route::resource('/document','DocumentController')->middleware('auth');
Route::resource('/shareholder','ShareholderController')->middleware('auth');
Route::get('/dashboard',function(){
return view('dashboard');
});

Route::get('company/{CompanyInfo}/documents', 'CompanyDocumentController@index');


Route::get('/das', 'SearchController@index');
Route::get('/das/action', 'SearchController@action')->name('live_search.action');