<?php
Route::get('/', 'Home\HomeController@index');
Route::get('article/{id}', 'Home\ArticleController@show');
Route::get('article/tags/{name?}', 'Home\HomeController@tagList');
Route::get('category/{name?}','Home\HomeController@cate');
//用户路由
Route::group(['prefix' => 'user', 'namespace' => 'Home', 'middleware' => 'auth'], function () {
    Route::get('/', 'UserController@index');
    Route::resource('article', 'ArticleController');
    Route::get('setting/info', 'UserController@setInfo');
    Route::get('setting/face', 'UserController@setFace');
    Route::get('setting/password', 'UserController@setPassword');
});
Route::controller('auth', 'Auth\AuthController');
Route::controller('password', 'Auth\PasswordController');
//todo:admin 后台
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function () {
    Route::get('/', 'AdminController@index');
    Route::get('/flush/menu','CacheController@flushMenu');
});