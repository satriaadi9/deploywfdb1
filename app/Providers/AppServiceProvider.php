<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;

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
        //
        RedirectIfAuthenticated::redirectUsing(fn () => route('courses'));

        //Gates
        Gate::define('insert-course', function(User $user){
            $allowedRoles=['DEAN','LECTURER'];
            //check if user has either dean or lecturer role
            return $user->roles->pluck('role')->intersect($allowedRoles)->isNotEmpty();
            //true->user dean/lecturer (is not empty - ada intersect)
            //false->user bukan dean/lecturer (empty - tidak ada intersect)
        });

        Gate::define('update-course', function(User $user){
            $allowedRoles=['DEAN','LECTURER'];
            //check if user has either dean or lecturer role
            return $user->roles->pluck('role')->intersect($allowedRoles)->isNotEmpty();
            //true->user dean/lecturer (is not empty - ada intersect)
            //false->user bukan dean/lecturer (empty - tidak ada intersect)
        });

        Gate::define('delete-course', function(User $user){
            $allowedRoles=['DEAN','LECTURER'];
            //check if user has either dean or lecturer role
            return $user->roles->pluck('role')->intersect($allowedRoles)->isNotEmpty();
            //true->user dean/lecturer (is not empty - ada intersect)
            //false->user bukan dean/lecturer (empty - tidak ada intersect)
        });


    }
}
