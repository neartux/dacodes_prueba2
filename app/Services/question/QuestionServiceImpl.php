<?php


namespace App\Services\question;


use App\Question;
use App\Utils\StatusKeys;
use Illuminate\Contracts\Queue\EntityNotFoundException;

class QuestionServiceImpl implements QuestionService {

    /**
     * TODO, En todos los procesos hay que validar que la pregunta pertenezca a la leccion
     * TODO, Hay que verificar que la suma de los puntos de las preguntas de una leccion no sean mayor a 100
     * TODO, Hay que validar informacion para no meter datos inconsistentes a la base de datos
     */

    private $question, $answerQuestionService;

    public function __construct(Question $question, AnswerQuestionService $answerQuestionService) {
        $this->question = $question;
        $this->answerQuestionService = $answerQuestionService;
    }

    public function findAll($lesson_id) {
        return $this->question::where('lesson_id', $lesson_id)->where('status_id', StatusKeys::STATUS_ACTIVE)->get();
    }

    public function findById($lesson_id, $question_id) {
        return $this->question->findById($lesson_id, $question_id);
    }

    public function store($lesson_id, $data) {
        // Validate if question have answers
        if (!isset($data["answers"]) || !count($data["answers"])) {
            throw new \Exception("Answers are required");
        }
        $answer_type_id = $data["answer_type_id"];
        $question = new Question();
        $question->lesson_id = $lesson_id;
        $question->status_id = StatusKeys::STATUS_ACTIVE;
        $question->answer_type_id = $answer_type_id;
        $question->name = $data["name"];
        $question->points = $data["points"];

        $question->save();

        // Create answers
        $this->answerQuestionService->store($question->id, $data["answers"]);
    }

    public function update($lesson_id, $question_id, $data) {
        // Find question by id
        $question = $this->question->findById($lesson_id, $question_id);
        // Validate Question
        if (! $question) {
            throw new EntityNotFoundException($question_id, "Question Not Found");
        }
        $question->name = $data["name"];
        $question->points = $data["points"];

        $question->save();
    }

    public function delete($lesson_id, $question_id) {
        // Find question by id
        $question = $this->question->findById($lesson_id, $question_id);
        // Validate question
        if (! $question) {
            throw new EntityNotFoundException($question_id, "Question Not Found");
        }
        $question->status_id = StatusKeys::STATUS_INACTIVE;

        $question->save();
    }


}