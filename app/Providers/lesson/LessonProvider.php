<?php


namespace App\Providers\lesson;


use Illuminate\Support\ServiceProvider;

class LessonProvider extends ServiceProvider {

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
        $this->app->bind('App\Services\lesson\LessonService', 'App\Services\lesson\LessonServiceImpl');
    }
}