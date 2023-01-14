<?php
namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use App\Models\School;
use App\Repositories\SchoolRepository;
use App\Repositories\CourseSchoolRepository;
use App\Models\Course;


class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(SchoolRepository::class, function ($app) {
            return new SchoolRepository(new School());
        });
        $this->app->bind(CourseRepository::class, function ($app) {
            return new CourseRepository(new Course());
        });
    }
}
