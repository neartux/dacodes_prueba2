<?php


namespace App\Services\question;


use App\AnswerQuestion;
use App\Utils\ApplicationKeys;

class AnswerQuestionServiceImpl implements AnswerQuestionService {

    private $answerQuestion;

    public function __construct(AnswerQuestion $answerQuestion) {
        $this->answerQuestion = $answerQuestion;
    }

    public function store($question_id, $answers) {
        // Crea las respuestas
        foreach ($answers as $answer) {
            $aQuestion = new AnswerQuestion();
            $aQuestion->question_id = $question_id;
            $aQuestion->description = $answer["description"];
            $aQuestion->is_ok = $answer["is_ok"];
            $aQuestion->save();
        }

    }


}