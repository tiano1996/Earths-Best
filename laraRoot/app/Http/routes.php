<?php
Route::get('/', 'Home\HomeController@index');
Route::get('article/{id}', 'Home\ArticleController@show');
Route::get('article/tags/{name?}', 'Home\HomeController@tagList');
Route::get('category/{name?}','Home\HomeController@cate');
Route::get('latest','Home\HomeController@order');
Route::get('hot','Home\HomeController@order');
Route::get('update','Home\HomeController@order');
//用户路由
Route::resource('comment', 'Home\CommentController');
Route::group(['prefix' => 'user', 'namespace' => 'Home', 'middleware' => 'auth'], function () {
    Route::get('/', 'UserController@index');
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
//todo:admin 后台
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function () {
    Route::get('/', 'AdminController@index');
    Route::get('/flush/menu','CacheController@flushMenu');
});