<?php

namespace App\Http\Controllers;

use \App\Models\Tag;
use \App\Models\Quiz;

class TagController extends Controller {

    public function tags() {
        return view('tags', ['tags' => Tag::all()]);
    }

    public function quiz($id) {
        return view('tag-quiz', ['tag' => Tag::find($id)]);
    }
}


