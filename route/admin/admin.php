<?php
use think\facade\Route;

// 创建分组后台登录
Route::group('admin',function () {
    Route::get('login','@admin/Login/login')->name('login');
    Route::post('login','@admin/Login/checkLogin')->name('checkLogin');


    Route::group( ['middleware'=> ['checkLogin']],function (){
        // 登录成功显示主页路由
        Route::get('index','@admin/Main/main')->name('main');
        // 欢迎界面路由
        Route::get('welcome','@admin/Main/welcome')->name('welcome');


        // 文章管理资源路由
        Route::resource('art','@admin/Article');
    });

});
