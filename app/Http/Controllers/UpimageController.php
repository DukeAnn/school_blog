<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\UploadsManager;

use App\Http\Requests;

use App\Http\Requests\UploadFileRequest;

use App\Http\Requests\UploadNewFolderRequest;

use Illuminate\Support\Facades\File;

use App\Model\Gallery;

use App\Model\GalleryCate;

class UpimageController extends Controller
{
    //
    protected $manager;

    public function __construct(UploadsManager $manager)
    {
        $this->manager = $manager;
    }
    //文章上传图片
    public function index(Request $request)
    {
        $cate = GalleryCate::find(1);
        $file =  $_FILES['wangEditorH5File'];
        $suffix_arr = explode('.',$file['name']);
        $fileName = date('Y-m-d-h_i_sa').'.'.$suffix_arr[count($suffix_arr)-1];
        $path = 'postImage/'.$fileName;
        $content = File::get($file['tmp_name']);
        $result = $this->manager->saveFile($path, $content);
        if ($result === true) {
            $model_gallery = new Gallery;
            $model_gallery->name = basename($path);
            $model_gallery->dir_path = 'uploads/'.dirname($path);
            $model_gallery->cate_name = $cate->name;
            $model_gallery->cate_id = 1;
            $model_gallery->path = 'uploads/'.$path;
            $model_gallery->save();
            echo $this->manager->fileWebpath($path);
        }else{
            $error = "An error occurred uploading file.";
            echo $error;
        }
    }
}
