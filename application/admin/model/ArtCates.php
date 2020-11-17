<?php

namespace app\admin\model;

use think\Model;

class ArtCates extends Model
{
    protected $pk = 'id'; // 设置主键名称
    protected $table = 'articles.art_cates'; // 设置当前模型对应的完整数据表名称
}
