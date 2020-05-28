<?php

namespace App\Models;
use \illuminate\Database\Eloquent\Model;

class Answer extends Model {

	public function question() {
		return $this->belongsTo('App\Models\Question', 'answers_id');
    }

}
