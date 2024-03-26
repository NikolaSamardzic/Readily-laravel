<?php

namespace App\Providers;

use App\Models\Link\Link;
use App\Repositories\UserRepository;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
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
