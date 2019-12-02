<?php


namespace App\Providers\question;


use Illuminate\Support\ServiceProvider;

class QuestionProvider extends ServiceProvider {

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
        $this->app->bind('App\Services\question\QuestionService', 'App\Services\question\QuestionServiceImpl');
    }

}