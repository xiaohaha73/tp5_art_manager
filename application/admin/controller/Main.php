<?php

namespace app\admin\controller;

use think\Controller;

class Main extends Controller
{
    // 显示主页的控制器
    public function main () {
        return view('admin@index/index');
    }

    // 欢迎页面的控制器
    public function welcome () {
        return view('admin@welcome/welcome');
    }
}
