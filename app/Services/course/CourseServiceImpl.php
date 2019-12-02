<?php


namespace App\Services\course;


use App\Course;
use App\Utils\StatusKeys;
use Illuminate\Contracts\Queue\EntityNotFoundException;

class CourseServiceImpl implements CourseService {

    private $course;

    public function __construct(Course $course) {
        $this->course = $course;
    }

    public function findAll() {
        return $this->course::where('status_id', StatusKeys::STATUS_ACTIVE)->get();
    }

    public function findById($id) {
        return $this->course->findById($id);
    }

    public function store($data) {
        $course = new Course();
        $course->status_id = StatusKeys::STATUS_ACTIVE;
        // TODO, este usuario hay que pasarlo dimanicamente
        $course->user_creation_id = 1;
        $course->name = $data["name"];
        $course->description = $data["description"];

        $course->save();
    }

    public function update($id, $data) {
        // Find course by id
        $course = $this->course->findById($id);
        // Validate user
        if (! $course) {
            throw new EntityNotFoundException($id, "Course Not Found");
        }
        $course->name = $data["name"];
        $course->description = $data["description"];

        $course->save();
    }

    public function delete($id) {
        // Find course by id
        $course = $this->course->findById($id);
        // Validate user
        if (! $course) {
            throw new EntityNotFoundException($id, "Course Not Found");
        }
        $course->status_id = StatusKeys::STATUS_INACTIVE;

        $course->save();
    }

}