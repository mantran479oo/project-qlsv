<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Repository\userEloquentRepository;
use App\Repositories\Repository\pointEloquentRepository;
use App\Repositories\Repository\subjectEloquenRepository;
use App\Repositories\Repository\informationEloquentRepository;
use App\Repositories\Repository\classEloquenRepository;

use App\Repositories\Repository\Interfaces\userRepositoryInterface;
use App\Repositories\Repository\Interfaces\classRepositoryInterface;
use App\Repositories\Repository\Interfaces\pointRepositoryInterface;
use App\Repositories\Repository\Interfaces\subjectRepositoryInterface;
use App\Repositories\Repository\Interfaces\informationRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    $this->app->bind(informationRepositoryInterface::class,informationEloquentRepository::class,);
    $this->app->bind(pointRepositoryInterface::class,pointEloquentRepository::class,);
    $this->app->bind(userRepositoryInterface::class, userEloquentRepository::class,);
    $this->app->bind(classRepositoryInterface::class,classEloquenRepository::class,);
    $this->app->bind(subjectRepositoryInterface::class,subjectEloquenRepository::class,);
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
