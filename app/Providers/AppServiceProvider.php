<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Observers\UserObserver;
use App\Observers\AdminUserObserver;
use App\Observers\ExamObserver;
use App\Models\AdminUser;
use App\Models\User;
use App\Models\Exam;
use Illuminate\Support\Facades\View;
use Illuminate\Database\Eloquent\Relations\Relation;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        AdminUser::observe(AdminUserObserver::class);
        User::observe(UserObserver::class);
        Exam::observe(ExamObserver::class);
        Relation::morphMap([
            'summaryImages' => 'App\Models\SummaryImage',
        ]);
        View::composer(['backend.news.create', 'backend.news.edit'], 'App\Http\ViewComposers\CategoryComposer');
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
