<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/','BlogController@index');

//博客
Route::get('blog','BlogController@blog');
Route::get('post/{id}','BlogController@post');
//摄影
Route::get('photography','BlogController@gallery');
//发表评论
Route::post('comment','CommentController@save_comment');
Route::auth();
//后台重定向
Route::get('admin',function(){
   return redirect('admin/dashboard');
});

Route::get('home', 'HomeController@index');
/*Route::get('admin',function(){
    return view('layouts.admin');
});*/

// 发送密码重置链接路由
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');
//后台登录验证组
Route::group(['prefix' => 'admin','middleware' => 'auth'],function(){
    Route::get('user','AdminController@getUser');
    Route::get('dashboard','AdminController@getDashboard');
    Route::get('useredit/{id}','AdminController@getUserEdit');
    Route::post('authsave','AdminController@setUserAuth');


    //文章
    Route::get('postadd','PostController@add');
    Route::get('post','PostController@postList');
    Route::post('postsave','PostController@save');
    Route::get('postedit/{id}','PostController@edit');
    Route::get('postdelete','PostController@delete');


    //分类
    Route::get('cate','CateController@cateList');
    Route::get('cateadd',function(){
        return view('admin.cateAdd');
    });
    Route::post('catesave','CateController@save');
    Route::get('cateedit/{id}','CateController@edit');
    Route::get('catedelete','CateController@delete');

    //标签
    Route::get('tag','TagController@tagList');
    Route::get('tagadd',function(){
        return view('admin.tagAdd');
    });
    Route::post('tagsave','TagController@save');
    Route::get('tagedit/{id}','TagController@edit');

    Route::get('tagdelete','TagController@delete');

    //媒体库
    Route::get('gallery/id/{cate_id?}','GalleryController@index');
    Route::post('gallery/save','GalleryController@setName');
    Route::get('gallery/delete','GalleryController@deleteImage');
    Route::get('uploadFile',function(){
       return view('admin.uploadFile'); 
    });
    Route::post('uploadFile','GalleryController@UpImage');
    Route::post('gallery_cate','GalleryController@addCate');
    //个人中心
    Route::get('profile','UserController@index');
    Route::post('upload_avatar','UserController@UpAvatar');
    Route::post('user_info','UserController@saveInfo');
    Route::get('userdel','UserController@deleteUser');
    //文章内容图片上传
    Route::post('upload/image','UpimageController@index');

    //友情链接
    Route::get('link','LinkController@index');
    Route::get('linkadd',function(){
       return view('admin.linkAdd');
    });
    Route::get('linkdel','LinkController@deleteLink');
    Route::get('linkedit/{id}','LinkController@edit');
    Route::post('linkadd','LinkController@add');

    //评论
    Route::get('comment','CommentController@comment_list');
    Route::get('comment/del','CommentController@deleteLink');

    //SEO
    Route::get('seo','SeoController@index');
    Route::post('seo/save','SeoController@save');
    Route::get('seo/edit','SeoController@edit');

    // 密码重置路由
    Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
    Route::post('password/reset', 'Auth\PasswordController@postReset');


    //文件上传
    Route::get('upload', 'GalleryController@index');

    Route::post('upload/file', 'UploadController@uploadFile');
    Route::delete('upload/file', 'UploadController@deleteFile');
    Route::post('upload/folder', 'UploadController@createFolder');
    Route::delete('upload/folder', 'UploadController@deleteFolder');
});
