<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

// 获取public路径地址
function public_path () {
    // DIRECTORY_SEPARATOR 用于生成windows和Linux下的/或者\
    return dirname(__DIR__).DIRECTORY_SEPARATOR.'public';
}

// 获取route路径地址
function route_path () {
    return dirname(__DIR__).DIRECTORY_SEPARATOR.'route';
}

