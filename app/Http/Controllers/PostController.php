<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Model\Post;

use App\Model\Article_cate;

use Illuminate\Support\Facades\Input;

use App\Model\Tag;
use Gate;

class PostController extends Controller
{
    //
    public function save(Request $request){
        $cateId = '';
        $cate = new Article_cate();
        //返回用户实例
        if ($request->user()) {
            $user = $request->user();
            $user_id = $user->id;
            $user_name = $user->name;

        }
        //如果传入ID就更新
        if($request->input('id') != null){
            $post = Post::find($request->input('id'));
            //判断是否有权限更新文章
            if (Gate::denies('update',$post)){
                abort(403);
            }

            $oldCateId = explode(',',$post->cate_id);
            //是否是新发布的文章
            $state = false;
        }else{
            $post = new Post();
            $oldCateId = array();
            $state = true;
        }

        $post->slug = $request->input('slug');
        $post->title = $request->input('title');
        $post->user_id = $user_id;
        $post->user_name = $user_name;
        $post->ico = $request->input('ico');
        //查分类ID的名字
        $post->cate = $cate->getCateName($request->input('cate_id'),$state,$oldCateId);
        $cateId = implode(',',$request->input('cate_id'));
        $post->cate_id = $cateId;
        $post->tags = $request->input('tags');

        $post->content = $request->input('content');
        preg_match_all("/<p>.*src=\"([^^]*?)\".*<\/p>/i",$request->input('content'),$image_path);
        $post->pic = !empty($image_path[1][0])?$image_path[1][0]:'';
        $post->save();

        $model_tag = new Tag();
        $tags = explode(',',$request->input('tags'));
        foreach ($tags as $tag){
            $model_tag->name = $tag;
            $model_tag->save();
        }

        return redirect('admin/post');
    }

    public function postList(){
        $postList = Post::orderby('created_at','desc')->get();
        return view('admin.post',['postList' => $postList]);
    }

    public function add(){
        //查询全部分类
        $cateList = Article_cate::all();
        return view('admin.postAdd',['cateList' => $cateList]);
    }

    public function edit($id){
        $post = Post::find($id);
        //查询所有分类
        $cateList = Article_cate::all();
        $post_cate_id = explode(',',$post->cate_id);
        foreach($post_cate_id as $value){
            $post_cate_id_int[] = intval($value);
        }
        $post->cate_id = $post_cate_id_int;
        return view('admin.postEdit',['post' => $post,'cateList' => $cateList]);
    }

    //ajax删除
    public function delete(){
        $id = Input::get('id');
        $post_cate = new Post();
        $cate = new Article_cate();
        $cate_id_str = $post_cate->where('id',$id)->value('cate_id');
        $cate_id_arr = explode(',',$cate_id_str);
        $cate->subNumber($cate_id_arr);
        $post = Post::destroy($id);
        if($post){

            echo true;
        }else{
            echo false;
        }

    }



}
