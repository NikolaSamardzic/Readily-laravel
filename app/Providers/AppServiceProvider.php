<?php

namespace App\Providers;

use App\Models\Link;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

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
        Blade::withoutDoubleEncoding();
        View::composer('*',function ($view){
            $roleId = Auth::user() ? Auth::user()['role_id'] : 4;
            $headerLinks = Link::headerLinksForUserRole($roleId);
            $footerLinks = Link::footerLinksForUserRole($roleId);
            $view->with('headerLinks', $headerLinks)
                ->with('footerLinks',$footerLinks);
        });
    }
}
