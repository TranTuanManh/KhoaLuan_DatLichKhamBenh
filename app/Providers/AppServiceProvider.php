<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Thongtinkhambenh;
use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        \Carbon\Carbon::setLocale('vi');
        view()->composer('header',function($view){
            if(Auth::user()->role == 1){
                $thongtinkhambenh = Thongtinkhambenh::where('trangthai', 2)->where('id_nguoigui', Auth::user()->id)->get();
                $count = count($thongtinkhambenh);  
            }
            if(Auth::user()->role == 2){
                $thongtinkhambenh = Thongtinkhambenh::where('trangthai','<>', 2)->where('id_bacsi', Auth::user()->id)->get();
                $count = count($thongtinkhambenh); 
            } 
                $view->with(['count'=>$count]);
        });
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
