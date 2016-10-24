<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    //
    //获取摄影列表
    public function galleryList($where = null,$page = 13){
        if(isset($where)){
            $result = $this->where('cate_id',$where)->orderBy('created_at','desc')->paginate($page);
        }else{
            $result = $this->orderBy('created_at','desc')->paginate($page);
        }
        return $result;
    }
}
