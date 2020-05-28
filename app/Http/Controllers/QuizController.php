<?php

namespace App\Http\Controllers;

use \App\Models\Quiz;
use \App\Utils\UserSession;
use Illuminate\Http\Request;

class QuizController extends Controller {
    public function quiz($id) {

        if (!UserSession::isConnected() || !UserSession::isAdmin()) {
            // on le redirige vers la page de connexion
            return view('quiz', ['quiz' => Quiz::find($id)]);
        }

        return view('quizConsult', ['quiz' => Quiz::find($id)]);


        // Pour la mise en place de la 404 :

        // $quizModel = Quiz::find($id);

        // if (!empty($quizModel)) {
        //     return $this->show('quiz', [
        //         'quiz' => $quizModel // $quiz
        //     ]);
        // }
        // else {
        //     // On lance NotFoudnHttpException afin d'afficher la page 404
        //     abort(404);
        // }
    }

    public function result(Request $request, $id) {

        // Si l'utilisateur n'est pas connecté, on le redirige vers la vue des quiz (sans les réponses)
        if (!UserSession::isConnected() || !UserSession::isAdmin()) {
            // on le redirige vers la page de connexion
            return view('quiz', ['quiz' => Quiz::find($id)]);
        }

        // On stock dans la variable $playerAnswers les réponses de l'utilisateurs
        $playerAnswers = $request->input();

        // On charge la vu quizResult en passant en "Viewvars" le bon quiz (Quiz::find($is)) et les réponses du joueur
        return view('quizResult', [
            'quiz' => Quiz::find($id),
            'playerAnswers' => $playerAnswers,
        ]);
    }
}
