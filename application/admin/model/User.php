<?php

namespace app\admin\model;

use think\Model;

class User extends Model
{
    protected $pk = 'uid'; // 设置主键名称
    protected $table = 'login.users'; // 设置当前模型对应的完整数据表名称

    // 检查用户名和密码是否和数据库中的相同
    public function checkUser(array $data) {

        $result = $this->where('username',$data['username'])->find();
        // 如果查询到数据，进行密码比对
        if (!$result || $result['password'] != md5($data['password'])) {
            return false;
        }


        // 登录成功，创建session
        session('admin.user',$result);
        // return '登录成功!';
        return true;
    }
}
