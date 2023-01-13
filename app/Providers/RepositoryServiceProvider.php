<?php
namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use App\Models\School;
use App\Repositories\SchoolRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(SchoolRepository::class, function ($app) {
            return new SchoolRepository(new School());
        });
    }
}
