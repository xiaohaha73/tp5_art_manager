<?php

namespace app\admin\model;

use think\Model;

class ArtTags extends Model
{
    protected $pk = 'id'; // 设置主键名称
    protected $table = 'articles.art_tags'; // 设置当前模型对应的完整数据表名称
}
