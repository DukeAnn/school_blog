<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use App\Model\Gallery;

use App\Model\GalleryCate;

use App\Services\UploadsManager;

use Illuminate\Support\Facades\File;

class GalleryController extends Controller
{
    protected $manager;

    public function __construct(UploadsManager $manager)
    {
        $this->manager = $manager;
    }
    //图片列表
    public function index($cate_id = 1){

        $galleryCateList = GalleryCate::all();
        $model_gallery = new Gallery();
        $galleryList = $model_gallery->galleryList($cate_id,16);
        return view('admin.gallery',compact('galleryList','galleryCateList','cate_id'));

    }
    //上传图片
    public function UpImage(Request $request){
        $file =  $_FILES['file'];
        $suffix_arr = explode('.',$file['name']);
        $fileName = date('Y-m-d-h_i_sa').'.'.$suffix_arr[count($suffix_arr)-1];
        $path = 'slide/'.$fileName;
        $content = File::get($file['tmp_name']);
        $result = $this->manager->saveFile($path, $content);
        if ($result === true) {
            $model_gallery = new Gallery;
            $model_gallery->name = basename($path);
            $model_gallery->dir_path = 'uploads/'.dirname($path);
            $model_gallery->cate_name = '默认';
            $model_gallery->cate_id = 1;
            $model_gallery->path = 'uploads/'.$path;
            $model_gallery->save();
            echo $this->manager->fileWebpath($path);
        }else{
            $error = "An error occurred uploading file.";
            echo $error;
        }
    }
    //保存图片名
    public function setName(Request $request){
        $cate = GalleryCate::find($request->input('cate_id'));
        $gallery = Gallery::find($request->input('id'));
        $gallery->name = $request->input('name');
        $gallery->describe = $request->input('describe');
        $gallery->cate_id = $request->input('cate_id');
        $gallery->cate_name = $cate->name;
        $gallery->save();
        return redirect('admin/gallery/id');
    }
    //ajax 删除图片
    public function deleteImage(Request $request){
        $id = $request->get('id');
        $gallery = Gallery::find($id);
        //删除文件
        $result = @unlink($gallery->path);
        if ($result == true) {
            //删除数据
            Gallery::destroy($id);
            echo true;
        }else{
            echo false;
        }
    }

    //新增相册
    public function addCate(Request $request){
        $model_galleryCate = new GalleryCate();
        $model_galleryCate->name = $request->input('cate_name');
        $model_galleryCate->alias = $request->input('cate_alias');
        $model_galleryCate->describe = $request->input('cate_describe');
        $model_galleryCate->dir_path = 'uploads/slide';
        $model_galleryCate->save();
        return redirect('admin/gallery/id');
    }

}
