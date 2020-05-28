<?php

namespace App\Http\Controllers;
use \App\Models\Quiz;

class MainController extends Controller {
    public function home() {

        $quizzes = Quiz::all();
        return view('home', ['quizzes' => $quizzes]);
    }
}
