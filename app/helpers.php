<?php
/**
 * Created by PhpStorm.
 * User: ADKi
 * Date: 2016/4/8 0008
 * Time: 9:28
 */
/*其中 human_filesize() 函数返回一个易读的文件尺寸，is_image() 函数在文件类型为图片的时候返回 true。
 * */
/**
 * 返回可读性更好的文件尺寸
 */
function human_filesize($bytes, $decimals = 2)
{
    $size = ['B', 'kB', 'MB', 'GB', 'TB', 'PB'];
    $factor = floor((strlen($bytes) - 1) / 3);

    return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) .@$size[$factor];
}

/**
 * 判断文件的MIME类型是否为图片
 */
function is_image($mimeType)
{
    return starts_with($mimeType, 'image/');
}