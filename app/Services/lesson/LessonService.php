<?php


namespace App\Services\lesson;


interface LessonService {

    public function findAll($course_id);

    public function findById($course_id, $id);

    public function store($course_id, $data);

    public function update($course_id, $lesson_id, $data);

    public function delete($course_id, $lesson_id);

}