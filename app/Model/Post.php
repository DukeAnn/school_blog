<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //获取博客文章列表
    public function blogList($where = null,$start = 0,$count = 10){
        if(isset($where)){
            $result = $this->where('cate_id',$where)->orderBy('created_at','desc')->paginate(10);
        }else{
            $result = $this->orderBy('created_at','desc')->paginate(10);
        }
        return $result;
    }
    //获取更多文章
    public function related_articles($post_id){
        $result = $this->whereNotIn('id',[$post_id])->take(3)->get();
        return $result;
    }
}
