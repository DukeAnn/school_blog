<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [''];
    //查询该篇文章下的评论
    public function getPostComment($where)
    {
        $result = $this->where('post_id',$where)->orderBy('updated_at','desc')->get();
        return $result;
    }
}
