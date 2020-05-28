<?php

namespace App\Models;
use \Illuminate\Database\Eloquent\Model;

class Tag extends Model {

    public function quiz() {
        return $this->belongsToMany(Quiz::class, 'quizzes_has_tags', 'tags_id', 'quizzes_id');
    }
}
