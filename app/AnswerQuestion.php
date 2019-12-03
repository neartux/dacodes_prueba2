<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnswerQuestion extends Model {

    protected $table = 'answer_question';

    public $timestamps = false;

    public function question() {
        return $this->hasOne('App\Question', 'id', 'question_id');
    }

}
