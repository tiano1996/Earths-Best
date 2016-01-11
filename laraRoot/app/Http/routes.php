<?php
Route::get('/', 'Home\HomeController@index');
Route::get('article/{id}', ['as'=>'article.show','uses'=>'Home\ArticleController@show']);
Route::get('article/tags/{name?}', 'Home\HomeController@tagList');
Route::get('category/{name?}','Home\HomeController@cate');
Route::get('latest','Home\HomeController@order');
Route::get('hot','Home\HomeController@order');
Route::get('update','Home\HomeController@order');
//用户路由
Route::resource('comment', 'Home\CommentController');
Route::group(['prefix' => 'user', 'namespace' => 'Home', 'middleware' => 'auth'], function () {
    Route::get('/', 'UserController@index');
    Route::get('{id}','UserController@show');
    Route::resource('article', 'ArticleController');
    Route::get('setting/info', 'UserController@setInfo');
    Route::get('setting/face', 'UserController@setFace');
    Route::get('setting/password', 'UserController@setPassword');
    Route::post('setting/password','UserController@postPassword');
});
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
Route::get('confirm/confirmation_code/{url}', 'Home\UserController@confirm');
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function () {
    Route::get('/', 'AdminController@index');
    Route::get('start.html', 'ApiController@getIndexStart');
    Route::get('skin.html', 'ApiController@getSkinConfig');
    Route::get('config', 'AdminController@config');
    Route::post('config', 'AdminController@postConfig');
    Route::get('optimize', 'AdminController@optimize');
    Route::post('optimize/clearSession','AdminController@postClearSession');
    Route::post('optimize/clearCache','AdminController@postClearCache');
    Route::post('optimize/flashMenu','AdminController@postFlashMenu');
    Route::post('optimize/optimizeDatabase','AdminController@postOptimizeDatabase');
    Route::resource('article', 'ArticleController');
    Route::resource('cate', 'CateController');
    Route::resource('user', 'UserController');
});