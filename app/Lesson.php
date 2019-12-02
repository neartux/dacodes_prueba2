<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model {

    protected $table = 'lesson';

    public $timestamps = false;

    public function status() {
        return $this->hasOne('App\Status', 'id', 'status_id');
    }

    public function course() {
        return $this->hasOne('App\Course', 'id', 'course_id');
    }

    public function questions() {
        return $this->hasMany('App\Question');
    }

    public function findById($course_id, $lesson_id) {
        return static::where('id', $lesson_id)->where('course_id', $course_id)->first();
    }

    public function findByIdLesson($id) {
        return static::findOrFail($id);
    }
}
