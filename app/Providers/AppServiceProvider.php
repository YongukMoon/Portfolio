<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if($locale=request()->cookie('locale__myapp')){
            app()->setLocale(\Crypt::decryptString($locale));
        }

        \Carbon\Carbon::setLocale(app()->getLocale());
        
        view()->composer('*', function($view){
            $allTags=\Cache::rememberForever('tags.list', function(){
                return \App\Tag::all();
            });
            $currentUser=auth()->user();
            $currentLocale=app()->getLocale();
            $currentUrl=current_url();

            $allCategories=\Cache::rememberForever('categories.list', function(){
                return \App\Shop\Category::all();
            });

            $view->with(compact('allTags', 'currentUser', 'currentLocale', 'currentUrl', 'allCategories'));
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
