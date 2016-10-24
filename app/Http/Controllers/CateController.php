<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Model\Article_cate;

use Illuminate\Support\Facades\Input;
use Gate;

class CateController extends Controller
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
            $cate = Article_cate::find($request->input('id'));
        }else{
            $cate = new Article_cate();
        }
        $cate->cate_name = $request->input('name');
        $cate->alias = $request->input('alias');
        $cate->describe = $request->input('describe');
        $cate->save();
        return redirect('admin/cate');
    }

    public function cateList()
    {
        $cateList = Article_cate::all();
        return view('admin.cate',['cateList' => $cateList]);
    }

    public function edit($id){
        $cate = Article_cate::find($id);
        return view('admin.cateEdit',['cate' => $cate]);
    }

    //ajax删除
    public function delete(){
        $id = Input::get('id');
        $cate = Article_cate::destroy($id);
        if($cate){
            echo true;
        }else{
            echo false;
        }

    }
}
