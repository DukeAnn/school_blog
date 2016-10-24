<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Model\Tag;

Use Illuminate\Support\Facades\Input;
use Gate;

class TagController extends Controller
{
    public function __construct()
    {
        //是否有操作权限
        if (Gate::denies('admin',5)){
            abort(403);
        }
    }

    //
    public function save(Request $request){

        //如果传入ID就更新
        if($request->input('id') != null){
            $tag = Tag::find($request->input('id'));
        }else{
            $tag = new Tag();
        }
        $tag->name = $request->input('name');
        $tag->alias = $request->input('alias');
        $tag->describe = $request->input('describe');
        $tag->save();
        return redirect('admin/tag');
    }

    public function tagList()
    {
        $tagList = Tag::all();
        return view('admin.tag',['tagList' => $tagList]);
    }

    public function edit($id){
        $tag = Tag::find($id);
        return view('admin.tagEdit',['tag' => $tag]);
    }

    //ajax删除
    public function delete(){
        $id = Input::get('id');
        $tag = Tag::destroy($id);
        if($tag){
            echo true;
        }else{
            echo false;
        }

    }
}
