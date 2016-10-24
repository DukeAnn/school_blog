<?php

namespace App\Http\Controllers;

use App\Model\GalleryCate;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Post;
use App\User;
use App\Model\Gallery;
use App\Model\Comment;

class BlogController extends Controller
{
    //博客首页
    public function blog(){
        $model_posts = new Post();
        $posts = $model_posts->blogList();

        //处理标签name 标签id 文章内容裁剪
        foreach($posts as $value){
            $value->cates = explode(',',$value->cate);
            $value->cate_ids = explode(',',$value->cate_id);
            //裁剪描述去掉img
            $pattern='/<img\s+src=[\\\'| \\\"](.*?(?:[\.gif|\.jpg]))[\\\'|\\\"].*?[\/]?>/';
            $str=" ";
            $value->describe=preg_replace($pattern,$str,$value->content);
        }
        return view(config('blog.theme').'/blog',['posts' => $posts]);
    }

    //文章详情页
    public function post($id){
        $post = Post::find($id);
        $model_post = new Post();
        $model_comment = new Comment();
        $commentList = $model_comment->getPostComment($id);
        $commentList = $commentList->toArray();

        $count = count($commentList);
        if($count > 0){
            foreach ($commentList as $key => $value){
                $commentList_new[$value['id']] = $value;
            }

            foreach ($commentList_new as $key => $value) {
                if($value['parent_id'] != 0){
                    //父节点不为空就挂在父节点上
                    $commentList_new[$value['parent_id']]['children'][] = $value;
                    //挂上的就清除
                    unset($commentList_new[$key]);
                }
            }
            $commentList = array();
            //重构数组
            foreach($commentList_new as $value){
                if(!empty($value['children'])){
                    krsort($value['children']);
                }
                $commentList[] = $value;
            }
        }

        $post->cates = explode(',',$post->cate);
        $post->cate_ids = explode(',',$post->cate_id);
        //更多文章
        $related_articles = $model_post->related_articles($post->id);
        $article = array();
        foreach($related_articles as $key => $value){
            if($key <= 3){
                //裁剪描述去掉img
                $pattern='/<img\s+src=[\\\'| \\\"](.*?(?:[\.gif|\.jpg]))[\\\'|\\\"].*?[\/]?>/';
                $str=" ";
                $value->describe=preg_replace($pattern,$str,$value->content);
                $article[$key] = $value;
            }else{
                break;
            }

        }
        return view(config('blog.theme').'/post',['post' => $post,'related_articles' => $article,'commentList' => $commentList , 'count' => $count]);
    }
    //相册列表
    public function gallery(){
        $galleryCate = GalleryCate::all();
        $model_gallery = new Gallery();
        $galleryList = $model_gallery->galleryList();
        return view('template.Beetle.gallery',compact('galleryList','galleryCate'));
    }

    public function index(){
        $admin = User::findOrFail(1);
        return view(config('blog.theme').'/index',['admin' => $admin]);
    }
}
