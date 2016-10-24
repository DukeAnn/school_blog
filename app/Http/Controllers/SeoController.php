<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Model\Seo;
use Gate;

class SeoController extends Controller
{
    public function __construct()
    {
        //是否有操作权限
        if (Gate::denies('admin',5)){
            abort(403);
        }
    }
    //
    public function index(){
        $seo_list = Seo::all();
        return view('admin.SEO',['seo_list' => $seo_list]);
    }
    public function save(Request $request){
        $seo = Seo::find($request->input('id'));
        $input = $request->all();
        unset($input['_token']);
        $seo->update($input);
        return redirect('admin/seo');
    }
    //ajax获取seo信息
    public function edit(){

    }
}
