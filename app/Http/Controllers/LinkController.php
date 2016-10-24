<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Link;
use App\Http\Requests;
Use Illuminate\Support\Facades\Input;
use Gate;

class LinkController extends Controller
{
    //
    public function __construct()
    {
        //是否有操作权限
        if (Gate::denies('admin',5)){
            abort(403);
        }
    }
    public function index()
    {
        $links = Link::all();
        return view('admin.link',['links' => $links]);
    }

    public function edit($id){
        $link = Link::find($id);
        return view('admin.linkEdit',['link' => $link]);
    }

    public function add(Request $request){
        //如果传入ID就更新
        $input = $request->all();
        unset($input['_token']);
        if($request->input('id') != null){
            $model_link = Link::find($request->input('id'));
            $model_link->update($input);
        }else{
            $model_link = new Link();
            $model_link->create($input);
        }



        return redirect('admin/link');
    }

    //ajax删除
    public function deleteLink(){
        $id = Input::get('id');
        $result = Link::destroy($id);
        if($result){
            echo true;
        }else{
            echo false;
        }
    }
}
