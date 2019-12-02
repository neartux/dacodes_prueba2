<?php


namespace App\Services\question;


use App\Question;
use App\Utils\StatusKeys;
use Illuminate\Contracts\Queue\EntityNotFoundException;

class QuestionServiceImpl implements QuestionService {

    private $question;

    public function __construct(Question $question) {
        $this->question = $question;
    }

    public function findAll($lesson_id) {
        return $this->question::where('lesson_id', $lesson_id)->where('status_id', StatusKeys::STATUS_ACTIVE)->get();
    }

    public function findById($lesson_id, $question_id) {
        return $this->question->findById($lesson_id, $question_id);
    }

    public function store($lesson_id, $data) {
        $question = new Question();
        $question->lesson_id = $lesson_id;
        $question->status_id = StatusKeys::STATUS_ACTIVE;
        $question->name = $data["name"];
        $question->points = $data["points"];

        $question->save();
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