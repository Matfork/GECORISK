<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('index');
});

 Route::resource('risk', 'RiskController');
 Route::resource('project', 'ProjectController');
 Route::resource('indicator', 'IndicatorController');
 Route::resource('document', 'DocumentController');
 Route::resource('solution', 'SolutionController');
 Route::resource('documentType', 'DocumentTypeController');
 Route::resource('riskType', 'RiskTypeController');

 Route::resource('riskProject', 'RiskProjectController'); 
 

//Ajax by POST Request
 Route::post('riskProject/filterFormByAjax', array(
 	'as' => 'riskProject.filterFormByAjax',
 	'uses' => 'RiskProjectController@filterFormByAjax'));


//Ajax by GET Request
 /*Route::get('riskProject_/filterFormByAjaxGet/{data}',array(
 	'as' => 'riskProject.filterFormByAjaxGet',
 	'uses' => 'RiskProjectController@filterFormByAjaxGet'));
*/

 //Route::controller('riski', 'RiskController');

 // Route::put('risk/{aaaa}', [
 // 	'uses' => 'RiskController@update3',
 // 	'as' => 'risk.update2']
 // );