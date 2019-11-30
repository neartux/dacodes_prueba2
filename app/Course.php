<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model {

    protected $table = 'course';

    public $timestamps = false;

    public function status() {
        return $this->hasOne('App\Status', 'id', 'status_id');
    }

    public function userCreation() {
        return $this->hasOne('App\User', 'id', 'user_creation_id');
    }

    public function lessons() {
        return $this->hasMany('App\Lesson');
    }

    public function findById($id) {
        return static::findOrFail($id);
    }
}
