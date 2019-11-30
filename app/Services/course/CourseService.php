<?php


namespace App\Services\course;


interface CourseService {

    public function findAll();

    public function findById($id);

    public function store($data);

    public function update($id, $data);

    public function delete($id);

}