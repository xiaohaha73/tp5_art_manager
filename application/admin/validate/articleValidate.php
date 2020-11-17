<?php

namespace app\admin\validate;

use think\Validate;

class articleValidate extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'    =>    ['规则1','规则2'...]
     *
     * @var array
     */
    protected $rule = [
        'desn' => 'require',
        'title' => 'require',
        'body' => 'require'
    ];

    /**
     * 定义错误信息
     * 格式：'字段名.规则名'    =>    '错误信息'
     *
     * @var array
     */
    protected $message = [
        'desn.require' => '描述不能为空',
        'title.require' => '描述不能为空',
        'body.require' => '描述不能为空'
    ];
}
