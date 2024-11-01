<?php

namespace App\Providers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
        // * digunakan untuk return message shortcut
        RedirectResponse::macro('msg',function($string){
            return $this->with('msg', $string);
        });
        RedirectResponse::macro('success',function($string){
            return $this->with(['msg'=> $string,'type'=>'success']);
        });
        RedirectResponse::macro('error',function($string){
            return $this->with(['msg'=> $string,'type'=>'danger']);
        });
        RedirectResponse::macro('danger',function($string){
            return $this->with(['msg'=> $string,'type'=>'danger']);
        });
        RedirectResponse::macro('warning',function($string){
            return $this->with(['msg'=> $string,'type'=>'warning']);
        });
        RedirectResponse::macro('info',function($string){
            return $this->with(['msg'=> $string,'type'=>'info']);
        });

    }
}
