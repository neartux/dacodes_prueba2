<?php


namespace App\Providers\question;


use Illuminate\Support\ServiceProvider;

class AnswerQuestionProvider extends ServiceProvider {

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
        $this->app->bind('App\Services\question\AnswerQuestionService', 'App\Services\question\AnswerQuestionServiceImpl');
    }

}