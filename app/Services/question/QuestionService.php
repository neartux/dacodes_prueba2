<?php


namespace App\Services\question;


interface QuestionService {

    public function findAll($lesson_id);

    public function findById($lesson_id, $question_id);

    public function store($lesson_id, $data);

    public function update($lesson_id, $question_id, $data);

    public function delete($lesson_id, $question_id);

}