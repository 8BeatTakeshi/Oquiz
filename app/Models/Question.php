<?php

namespace App\Models;
use \illuminate\Database\Eloquent\Model;
use \App\Models\Level;

class Question extends Model {

    public function level() {
        return $this->belongsTo(Level::class, 'levels_id');
    }

    public function answers()
	{
		return $this->hasMany('App\Models\Answer', 'questions_id');
	}
}
