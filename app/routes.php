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

 Route::get('/', 'HomeController@showWelcome');
 
 Route::resource('risk', 'RiskController');
 Route::resource('project', 'ProjectController');
 Route::resource('indicator', 'IndicatorController');
 Route::resource('document', 'DocumentController');
 Route::resource('solution', 'SolutionController');
 Route::resource('documentType', 'DocumentTypeController');
 Route::resource('riskType', 'RiskTypeController');
 Route::resource('projectType', 'ProjectTypeController');
 Route::resource('riskProject', 'RiskProjectController'); 

 //Route::controller('riski', 'RiskController');



Route::group(array('prefix' => 'riskProject'), function()
{
	 Route::get('{type}/{id}', [
	 	'uses' => 'RiskProjectController@indexFilter',
	 	'as' => 'riskProject.indexFilter']
	 );

	 Route::get('create/{type}/{id}', [
	 	'uses' => 'RiskProjectController@createFilter',
	 	'as' => 'riskProject.createFilter']
	 );

	 //Ajax by POST Request
 	Route::post('filterFormByAjax', array(
 	'as' => 'riskProject.filterFormByAjax',
 	'uses' => 'RiskProjectController@filterFormByAjax'));


	//Ajax by GET Request
	 /*Route::get('filterFormByAjaxGet/{data}',array(
	 	'as' => 'riskProject.filterFormByAjaxGet',
	 	'uses' => 'RiskProjectController@filterFormByAjaxGet'));
	*/
}); 


Route::group(array('prefix' => 'solution'), function()
{
	 Route::get('index/{id}', [
	 	'uses' => 'SolutionController@indexFilter',
	 	'as' => 'solution.indexFilter']
	 );

	 Route::get('create/{id}', [
	 	'uses' => 'SolutionController@createFilter',
	 	'as' => 'solution.createFilter']
	 );
}); 


Route::group(array('prefix' => 'document'), function()
{
	 Route::get('index/{id}', [
	 	'uses' => 'DocumentController@indexFilter',
	 	'as' => 'document.indexFilter']
	 );

	 Route::get('create/{id}', [
	 	'uses' => 'DocumentController@createFilter',
	 	'as' => 'document.createFilter']
	 );
}); 

Route::group(array('prefix' => 'frecuency'), function()
{
    Route::get('risk/{id?}', [
	 	'uses' => 'FrecuencyController@indexFrecuencyRisk',
	 	'as' => 'frecuency.indexFrecuencyRisk']
	);

    Route::get('project', [
	 	'uses' => 'FrecuencyController@indexFrecuencyProject',
	 	'as' => 'frecuency.indexFrecuencyProject']
	 );

    Route::get('document', [
	 	'uses' => 'FrecuencyController@indexDocumentMain',
	 	'as' => 'frecuency.indexDocumentMain']
	 );


     //Ajax by POST Request
 	Route::post('searchAssociations', array(
 	'as' => 'frecuency.searchAssociations',
 	'uses' => 'FrecuencyController@searchAssociations'));

});