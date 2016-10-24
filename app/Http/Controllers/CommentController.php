<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Model\Comment;

use Illuminate\Support\Facades\Input;

use Gate;

class CommentController extends Controller
{
    //保存评论
    public function save_comment(Request $request){
        $model_comment = new Comment();
        $input = $request->all();
        unset($input['_token']);
        $model_comment->create($input);
        return back();
    }
    //读取评论
    public function comment_list(){
        $comment_list = Comment::all();
        return view('admin.comment',['comment_list' => $comment_list]);
    }

    //ajax删除
    public function deleteLink(){
        $id = Input::get('id');
        $result = Comment::destroy($id);
        if($result){
            echo true;
        }else{
            echo false;
        }
    }
}
