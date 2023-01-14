<?php
namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use App\Models\School;
use App\Repositories\SchoolRepository;
use App\Repositories\CourseRepository;
use App\Models\Course;
use App\Repositories\EnrollmentRepository;
use App\Models\Enrollment;


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
        $this->app->bind(EnrollmentRepository::class, function ($app) {
            return new EnrollmentRepository(new Enrollment());
        });
    }
}
