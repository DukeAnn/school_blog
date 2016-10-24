<?php
/**
 * Created by PhpStorm.
 * User: ADKi
 * Date: 2016/4/10 0010
 * Time: 20:55
 * 对象和数组的相互转化
 */
namespace App\Services;

class ObjectToArray
{
    public function object_array($array) {
        if(is_object($array)) {
            $array = (array)$array;
        } if(is_array($array)) {
            foreach($array as $key=>$value) {
                $array[$key] = $this->object_array($value);
            }
        }
        return $array;
    }
}

