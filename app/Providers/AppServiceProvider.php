<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\SchoolController;
use App\Repositories\SchoolRepository;
use App\Models\School;
use App\Repositories\CourseRepository;
use App\Models\Course;
use App\Http\Controllers\CourseController;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(SchoolRepository::class, function ($app) {
            return new SchoolRepository(new School());
        });
        $this->app->singleton(CourseRepository::class, function ($app) {
            return new CourseRepository(new Course());
        });
        // $this->app->singleton(SchoolController::class, function(){
        //     return new SchoolController(new SchoolRepository());
        // });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
