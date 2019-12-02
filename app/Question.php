<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model {

    protected $table = 'question';

    public $timestamps = false;

    public function status() {
        return $this->hasOne('App\Status', 'id', 'status_id');
    }

    public function lesson() {
        return $this->hasOne('App\Lesson', 'id', 'lesson_id');
    }

    public function findById($lesson_id, $question_id) {
        return static::where('id', $question_id)->where('lesson_id', $lesson_id)->first();
    }

    public function findByIdQuestion($id) {
        return static::findOrFail($id);
    }
}
