<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Closure;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot()
    {
//        if (Auth::check()) {
//            return $next($request);
//        }
//            return redirect()->route('admin.login');
    }
}
