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

Route::get('/', array('before' => 'auth',
  'uses' => 'HomeController@showWelcome'
));
 

Route::group(array('before'=>'auth'), function()
{

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
	 
}); 


Route::group(array('before'=>'auth','prefix' => 'riskProject'), function()
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


Route::group(array('before'=>'auth', 'prefix' => 'solution'), function()
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


Route::group(array('before'=>'auth','prefix' => 'document'), function()
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

Route::group(array('before'=>'auth','prefix' => 'frecuency'), function()
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



Route::group(array('before'=>'auth','prefix' => 'chart'), function()
{
    Route::get('projectRisk/{id?}', [
	 	'uses' => 'ChartController@indexChartProjectRisk',
	 	'as' => 'chart.indexChartProjectRisk']
	);

    Route::get('riskMatrix/{id?}', [
	 	'uses' => 'ChartController@indexChartRiskMatrix',
	 	'as' => 'chart.indexChartRiskMatrix']
	 );
});//

// Confide routes
Route::get('users/create', 'UsersController@create');
Route::post('users', 'UsersController@store');
Route::get('users/login', 'UsersController@login');
Route::post('users/login', 'UsersController@doLogin');
Route::get('users/confirm/{code}', 'UsersController@confirm');
Route::get('users/forgot_password', 'UsersController@forgotPassword');
Route::post('users/forgot_password', 'UsersController@doForgotPassword');
Route::get('users/reset_password/{token}', 'UsersController@resetPassword');
Route::post('users/reset_password', 'UsersController@doResetPassword');
Route::get('users/logout', 'UsersController@logout');
Route::post('users/update', 'UsersController@updateInfo');
