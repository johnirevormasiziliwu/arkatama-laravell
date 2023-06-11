<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // $nama = [
        //     'laptop', 
        //     'pc', 
        //     'hp', 
        //     'flashdisk', 
        //     'mouse'
        // ];

        // View::composer([
        //     'master.product.product', 
        // ], function($view) use ($nama) {
        //     $view->with('nama', $nama);
        // });
    }
}