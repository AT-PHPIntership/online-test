<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Events\HashPassword;
use App\Models\AdminUser;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        AdminUser::observe(HashPassword::class);
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
