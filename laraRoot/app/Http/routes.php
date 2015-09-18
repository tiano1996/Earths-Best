<?php
Route::get('/', 'Home\HomeController@index');
Route::get('article/{id}', 'Home\ArticleController@show');
Route::get('article/tags/{name?}', 'Home\HomeController@tagList');
//用户路由
Route::group(['prefix' => 'user', 'namespace' => 'Home', 'middleware' => 'auth'], function () {
    Route::get('/', 'UserController@index');
    Route::get('set_info', 'UserController@setInfo');
    Route::get('set_face', 'UserController@setFace');
    Route::get('set_password', 'UserController@setPassword');
    Route::resource('article', 'ArticleController');
});
Route::controller('auth', 'Auth\AuthController');
Route::controller('password', 'Auth\PasswordController');
//todo:admin 后台
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function () {
    Route::get('/', 'AdminController@index');
});