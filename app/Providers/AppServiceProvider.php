<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
//use Illuminate\Cache\RateLimiting\Limit;//for rate limiting
//use Illuminate\Http\Request;//for limiting
//use Illuminate\Support\Facades\RateLimiter;//late limiting

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


     //   RateLimiter::for('admin_panel', function (Request $request) {
     //       return Limit::perMinute(10)->by($request->user()?->id ?: $request->ip());
      //  });


    //RateLimiter::for('login', function (Request $request) {
    //    return Limit::perMinute(10)->by($request->ip());
   // });

Paginator::useBootstrapFive();


    }
}

