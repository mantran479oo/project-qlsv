<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * All of the container bindings that should be registered.
     *
     * @var array
     */
    public $bindings = [
        \App\Repositories\Repository\Interfaces\InformationRepositoryInterface::class
        => \App\Repositories\Repository\InformationEloquentRepository::class,

        \App\Repositories\Repository\Interfaces\SubjectRepositoryInterface::class
        => \App\Repositories\Repository\SubjectEloquenRepository::class,

        \App\Repositories\Repository\Interfaces\PointRepositoryInterface::class
        => \App\Repositories\Repository\PointEloquentRepository::class,

        \App\Repositories\Repository\Interfaces\ClassRepositoryInterface::class
        => \App\Repositories\Repository\ClassEloquenRepository::class,

        \App\Repositories\Repository\Interfaces\UserRepositoryInterface::class
        => \App\Repositories\Repository\UserEloquentRepository::class,
    ];


    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
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
