<?php


namespace App\Services\question;


interface AnswerQuestionService {

    public function store($question_id, $answers);

}