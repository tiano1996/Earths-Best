<?php
//首页路由
Route::get('/','Home\HomeController@index');
Route::get('post/{id}','Home\PostController@show');
//用户路由
Route::group(['prefix'=>'user','namespace'=>'Home'],function(){
    Route::get('set_info','UserController@setInfo');
    Route::get('set_face','UserController@setFace');
    Route::get('set_pwd','UserController@setPwd');
    Route::get('user_info','UserController@show');
});

//Route::post('comment/store', 'Home\CommentsController@store');
//Route::post('ajax/uploads','Ajax\UploadsController@uploadImage');
//auth路由
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
//限制及开放注册路由
//Route::any('auth/register', 'Auth\LimitController@noRegister');
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
//后台路由
Route::group(['prefix' => 'admin', 'namespace' => 'Admin','middleware'=>'auth'], function () {
    Route::get('/', 'AdminController@index');
//    Route::get('dashboard', 'AdminController@index');
//    Route::resource('posts', 'PostsController');
//    Route::resource('comments', 'CommentsController');
});
//
//Route::get('link/',function(){
//    return 'test';
// });