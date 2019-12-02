<?php


namespace App\Services\lesson;


use App\Lesson;
use App\Utils\StatusKeys;
use Illuminate\Contracts\Queue\EntityNotFoundException;

class LessonServiceImpl implements LessonService {

    private $lesson;

    public function __construct(Lesson $lesson) {
        $this->lesson = $lesson;
    }

    public function findAll($course_id) {
        return $this->lesson::where('course_id', $course_id)->where('status_id', StatusKeys::STATUS_ACTIVE)->get();
    }

    public function findById($course_id, $lesson_id) {
        return $this->lesson->findById($course_id, $lesson_id);
    }

    public function store($course_id, $data) {
        $lesson = new Lesson();
        $lesson->course_id = $course_id;
        $lesson->status_id = StatusKeys::STATUS_ACTIVE;
        $lesson->name = $data["name"];
        $lesson->description = $data["description"];

        $lesson->save();
    }

    public function update($course_id, $lesson_id, $data) {
        // Find lesson by id
        $lesson = $this->lesson->findById($course_id, $lesson_id);
        // Validate lesson
        if (! $lesson) {
            throw new EntityNotFoundException($lesson_id, "Lesson Not Found");
        }
        $lesson->name = $data["name"];
        $lesson->description = $data["description"];

        $lesson->save();
    }

    public function delete($course_id, $lesson_id) {
        // Find lesson by id
        $lesson = $this->lesson->findById($course_id, $lesson_id);
        // Validate lesson
        if (! $lesson) {
            throw new EntityNotFoundException($lesson_id, "Lesson Not Found");
        }
        $lesson->status_id = StatusKeys::STATUS_INACTIVE;

        $lesson->save();
    }

}