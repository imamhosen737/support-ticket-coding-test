<?php

namespace App\Providers;

use App\Models\ContactUs;
use Illuminate\Pagination\Paginator;
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
        Paginator::useBootstrap();
        if (Schema::hasTable('contact_us')) {
            view()->share('contact', ContactUs::first());
        }
    }
}
