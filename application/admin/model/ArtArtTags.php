<?php

namespace app\admin\model;

use think\model\Pivot;

// 建立多对多模型需要继承的是pivot而不是model

class ArtArtTags extends Pivot
{
    // 用于建立文章数据表和标签数据表多对多联系的模型
    protected $pk = 'id'; // 设置主键名称
    protected $table = 'articles.art_article_tag'; // 设置当前模型对应的完整数据表名称
}
