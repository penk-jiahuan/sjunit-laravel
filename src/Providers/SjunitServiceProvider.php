<?php

namespace Jiahuan\SjunitLaravel\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
/**
 * 这是单元测试组件的服务提供者
 * 用来加载sjunit组件的
 *
 * 组件传统方式的引用的话 就是 composer require xxxxxx组件
 * 然后只要网咯ok就可以从GitHub上下载下来
 */
class SjunitServiceProvider extends ServiceProvider
{
    public function register()
    {
        //echo '这是sjunt 服务提供者';
        $this->registerRoutes();
        // 指定的组件的名称，自定义的资源目录地址
        $this->loadViewsFrom(
            __DIR__.'/../../resources/views','sjunit'
        );
    }

    public function boot()
    {
        //
    }
    // 参考别人的写法
    // 对于源码熟悉更好一些
    private function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__.'/../Http/routes.php');
        });
    }

    private function routeConfiguration()
    {
        return [
            // 是定义路由的命名空间
            'namespace'=>'Jiahuan\SjunitLaravel\Http\Controllers',
            // 这是前缀
            'prefix'=>'sjunit',
            // 这是中间件
            'middleware' => 'web',
        ];
    }


}