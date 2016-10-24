<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

use App\Services\ObjectToArray;

class Article_cate extends Model
{
    //主键名称
    protected $primaryKey = 'id';

    //获取提交表单过来地id 查询分类名
    public function getCateName(array $cateId,$state,array $oldCateId){
        $cateName = array();
        foreach ($cateId as $id){
            $objToArr = new ObjectToArray();
            //对象转数组
            $cateName[] = $objToArr->object_array($this->where('id',$id)->lists('cate_name'));
        }

        //更新分类下文章数
        //新增文章才更新
        if($state){
            $this->addNumber($cateId);
        }else{
            //先减掉以前的分类文章数
            $this->subNumber($oldCateId);
            //再加上新的分类文章数
            $this->addNumber($cateId);
        }

        foreach($cateName as $value){
            foreach($value as $value1){
                $cateNamesub[] = $value1[0];
            }
        }

        $cateNamesStr = implode(',',$cateNamesub);
        return $cateNamesStr;
    }

    //分类文章数 -1
    public function subNumber(array $id_arr){
        foreach($id_arr as $value){
            $value = intval($value);
            $number = Article_cate::find($value);
            $number->number = $number->number - 1;
            $number->save();
        }
    }

    public function addNumber(array $id_arr){
        foreach($id_arr as $value){
            $value = intval($value);
            $number = Article_cate::find($value);
            $number->number = $number->number + 1;
            $number->save();
        }
    }

}
