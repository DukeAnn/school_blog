<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Model\Seo;
use App\Model\Link;
use Symfony\Component\Debug\Debug;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //安装时剪切出来 start
        $seo_index = Seo::findOrFail(1);
        $seo_photography = Seo::findOrFail(2);
        $seo_blog = Seo::findOrFail(3);
        $links = Link::all();
        view()->share('seo_index',$seo_index);
        view()->share('seo_photography',$seo_photography);
        view()->share('seo_blog',$seo_blog);
        view()->share('links',$links);
        //end
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
