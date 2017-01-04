<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);





Route::group(['prefix'=>'admin'],function(){

	Route::group(['prefix'=>'cate'],function(){
		Route::get('list',['as'=>'admin.cate.getList','uses'=>'CateController@getList']);
		Route::get('delete/{id}',['as'=>'admin.cate.delete','uses'=>'CateController@delete']);
		Route::get('add',['as'=>'admin.cate.getAdd','uses'=>'CateController@getAdd']);
		Route::post('add',['as'=>'admin.cate.postAdd','uses'=>'CateController@postAdd']);
		Route::get('edit/{id}',['as'=>'admin.cate.getEdit','uses'=>'CateController@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.cate.postEdit','uses'=>'CateController@postEdit']);
	});

	Route::group(['prefix'=>'news'],function(){
		Route::get('list',['as'=>'admin.news.getList','uses'=>'NewsController@getList']);
		Route::get('view/{id}',['as'=>'admin.news.getViewbyID','uses'=>'NewsController@getViewbyID']);
		Route::get('delete/{id}',['as'=>'admin.news.delete','uses'=>'NewsController@delete']);
		Route::get('add',['as'=>'admin.news.getAdd','uses'=>'NewsController@getAdd']);
		Route::post('add',['as'=>'admin.news.postAdd','uses'=>'NewsController@postAdd']);
		Route::get('edit/{id}',['as'=>'admin.news.getEdit','uses'=>'NewsController@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.news.postEdit','uses'=>'NewsController@postEdit']);
	});

	Route::group(['prefix'=>'product'],function(){
		Route::get('list',['as'=>'admin.product.getList','uses'=>'ProductController@getList']);
		Route::get('view/{id}',['as'=>'admin.product.getViewbyID','uses'=>'ProductController@getViewbyID']);
		Route::get('delete/{id}',['as'=>'admin.product.delete','uses'=>'ProductController@delete']);
		Route::get('add',['as'=>'admin.product.getAdd','uses'=>'ProductController@getAdd']);
		Route::post('add',['as'=>'admin.product.postAdd','uses'=>'ProductController@postAdd']);
		Route::get('edit/{id}',['as'=>'admin.product.getEdit','uses'=>'ProductController@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.product.postEdit','uses'=>'ProductController@postEdit']);
		
	});

	Route::group(['prefix'=>'technical'],function(){
		Route::get('list',['as'=>'admin.technical.getList','uses'=>'TechnicalController@getList']);
		Route::get('view/{id}',['as'=>'admin.technical.getViewbyID','uses'=>'TechnicalController@getViewbyID']);
		Route::get('delete/{id}',['as'=>'admin.technical.delete','uses'=>'TechnicalController@delete']);
		Route::get('add',['as'=>'admin.technical.getAdd','uses'=>'TechnicalController@getAdd']);
		Route::post('add',['as'=>'admin.technical.postAdd','uses'=>'TechnicalController@postAdd']);
		Route::get('edit/{id}',['as'=>'admin.technical.getEdit','uses'=>'TechnicalController@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.technical.postEdit','uses'=>'TechnicalController@postEdit']);
		
	});

	Route::group(['prefix'=>'infomation'],function(){
		Route::get('view',['as'=>'admin.infomation.getInfo','uses'=>'InfomationController@getInfo']);
		Route::get('edit/{id}',['as'=>'admin.infomation.getEdit','uses'=>'InfomationController@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.infomation.postEdit','uses'=>'InfomationController@postEdit']);
		
	});

	Route::group(['prefix'=>'service'],function(){
		Route::get('list',['as'=>'admin.service.getList','uses'=>'ServiceController@getList']);
		Route::get('view/{id}',['as'=>'admin.service.getViewbyID','uses'=>'ServiceController@getViewbyID']);
		Route::get('delete/{id}',['as'=>'admin.service.delete','uses'=>'ServiceController@delete']);
		Route::get('add',['as'=>'admin.service.getAdd','uses'=>'ServiceController@getAdd']);
		Route::post('add',['as'=>'admin.service.postAdd','uses'=>'ServiceController@postAdd']);
		Route::get('edit/{id}',['as'=>'admin.service.getEdit','uses'=>'ServiceController@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.service.postEdit','uses'=>'ServiceController@postEdit']);
		
	});

	Route::group(['prefix'=>'contact'],function(){
		Route::get('list',['as'=>'admin.contact.list','uses'=>'ContactController@getInfo']);
		Route::get('view/{id}',['as'=>'admin.contact.getViewbyID','uses'=>'ContactController@getViewbyID']);
	});
});

Route::get('trungphuong',['as'=>'getLogin','uses'=>'LoginController@getLogin']);
Route::post('trungphuong',['as'=>'postLogin','uses'=>'LoginController@postLogin']);
// Route::get('admin',['as'=>'admin','uses'=>'LoginController@index']);

Route::get('/','WelcomeController@index');
Route::get('home','WelcomeController@index');
Route::get('san-pham','WelcomeController@product');
Route::get('tin-tuc','WelcomeController@news');
Route::get('hoi-dap','WelcomeController@service');
Route::get('ky-thuat','WelcomeController@technical');
Route::get('gioi-thieu','WelcomeController@aboutus');
Route::get('contact','WelcomeController@contact');
Route::get('san-pham/{slug}','WelcomeController@detailP');
Route::get('ky-thuat/{slug}','WelcomeController@detailT');
Route::get('tin-tuc/{slug}','WelcomeController@detailN');
Route::get('hoi-dap/{slug}','WelcomeController@detailS');

Route::post('contact',['as'=>'contact','uses'=>'ContactController@postAdd']);
