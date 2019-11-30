<?php


namespace App\Providers\course;


use Illuminate\Support\ServiceProvider;

class CourseProvider extends ServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot() {

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() {
        $this->app->bind('App\Services\course\CourseService', 'App\Services\course\CourseServiceImpl');
    }

}