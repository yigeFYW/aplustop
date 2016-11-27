<?php
Route::get('/', function () {
    return view('index');
});

//微信server路由
Route::any("wechat/{id}","WechatController@server");

//登录路由
Route::get("login.html","Auth\AuthController@getLogin");
Route::post("login.html","Auth\AuthController@postLogin");
//注册路由
Route::get("register.html","Auth\AuthController@getRegister");
Route::post("register.html","Auth\AuthController@postRegister");
//注册ajax检测邮件
Route::post("check/check_reg.html","Auth\AuthController@checkMail");

//导航路由
Route::get("index","IndexController@index");