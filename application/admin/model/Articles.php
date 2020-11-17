<?php

namespace app\admin\model;

use think\Model;

class Articles extends Model
{
    protected $pk = 'id'; // 设置主键名称
    protected $table = 'articles.art_articles'; // 设置当前模型对应的完整数据表名称
    protected $autoWriteTimestamp = true; // 自动添加时间戳

    // 关联cates副表的关联函数
    public function catesConnect()
    {
        return $this->hasOne('ArtCates', 'id', 'cates_id');
    }

    // 建立与tag表格的多对多关联函数
    public function tagsConnect()
    {
        return $this->belongsToMany('ArtTags','articles.art_article_tag','tid','aid');
    }
}
