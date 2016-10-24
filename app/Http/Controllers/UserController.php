<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
Use Illuminate\Support\Facades\Input;
use App\User;
use Auth;
use Illuminate\Support\Facades\File;
use App\Services\UploadsManager;

class UserController extends Controller
{
    //
    protected $manager;

    public function __construct(UploadsManager $manager)
    {
        $this->manager = $manager;
    }
    //信息首页
    public function index(){
        $user = Auth::user();
        return view('admin.profile',compact('user'));
    }
    //上传头像
    public function UpAvatar(Request $request){
        $file =  $_FILES['file'];
        $suffix_arr = explode('.',$file['name']);
        $fileName = date('Y-m-d-h_i_sa').'.'.$suffix_arr[count($suffix_arr)-1];
        $path = 'avatar/'.$fileName;
        $content = File::get($file['tmp_name']);
        $result = $this->manager->saveFile($path, $content);
        if ($result === true) {
            $model_user = User::find(Auth::user()->id);
            $model_user->avatar = 'uploads/'.$path;
            $model_user->save();
            echo $this->manager->fileWebpath($path);
        }else{
            $error = "An error occurred uploading file.";
            echo $error;
        }
    }
    //保存用户信息
    public function saveInfo(Request $request){
        $user = User::find(Auth::user()->id);
        $user->name = $request->input('name');
        $user->sex = $request->input('sex');
        $user->birthday = $request->input('birthday');
        $user->qq = $request->input('qq');
        $user->university = $request->input('university');
        $user->company = $request->input('company');
        $user->url = $request->input('url');
        $user->position = $request->input('position');
        $user->autograph = $request->input('autograph');
        $user->save();
        return redirect('admin/profile');
    }
    //ajax删除
    public function deleteUser(){
        $id = Input::get('id');
        $result = User::destroy($id);
        if($result){
            echo true;
        }else{
            echo false;
        }
    }
}
