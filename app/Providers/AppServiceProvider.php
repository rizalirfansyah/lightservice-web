<?php

namespace App\Providers;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Gate::define('register', function(User $user){
        //    return $user->name === 'admin';
        // });
        Gate::define('is_admin', function(User $user) {
            return $user->name === 'admin';
        });

        Paginator::defaultView( 'pagination::default');
    }
    
}