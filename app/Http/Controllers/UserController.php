<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use \App\Utils\UserSession;

class UserController extends Controller {

    // Affichage de la vue d'inscription a la BDD
    public function signup() {
        return view('signup');
    }


    // Gestion en psot de l'ajout à la BDD du nouvel utilisateur
    public function signupPost(Request $request) {

        $firstName = $request->input('first_name');
        $lastName = $request->input('last_name');
        $pass = password_hash($request->input('pass'), PASSWORD_DEFAULT);
        $mail = $request->input('mail');

        // Vérification des données avant l'envoie dans DB
        $errorList = [];
        if (empty($firstName)) {
            $errorList[] = 'Le Prénom est vide';
        }
        if (empty($lastName)) {
            $errorList[] = 'Le Nom est vide';
        }
        if (empty($mail)) {
            $errorList[] = 'L\'email est vide';
        }
        // On test aussi que l'email est correct
        else if (filter_var($mail, FILTER_VALIDATE_EMAIL) === false) {
            $errorList[] = 'L\'email est incorrect';
        }

        if (empty($pass)) {
            $errorList[] = 'Le mot de passe est vide';
        }
        // On test que le password fasse au moins 8 caractères
        else if (strlen($pass) < 8) {
            $errorList[] = 'Le mot de passe doit faire au moins 8 caractères';
        }
        if ($request->input('pass') != $request->input('pass2')) {
            $errorList[] = 'Les mots de passe sont différents';
        }
        // si aucune erreur
        if (empty($errorList)) {
            // TODO vérifier que l'email n'existe pas déjà

            // on crée un nouvel utilisateur:
            $newUser = new User();
            $newUser->firstname = $firstName;
            $newUser->lastname = $lastName;
            $newUser->password = $pass;
            $newUser->email = $mail;
            $newUser->role = 'member';
            $newUser->status = 1;

            $newUser->save();

            return redirect()->route('signin-form', ['add_ok' => 1]);
        }
        else {
            return view('signup', [
                'errorList' => $errorList
                ]);
        }
    }


    // Affichage du formulaire de connexion
    public function signin() {
        return view('signin');
    }


    // gestion du formulaire de connexion
    public function signinPost(Request $request) {
        $viewVars = [];

        // on va déjà chercher s'il existe un utilisateur ayant l'adresse mail saisie par le visiteur
        $user = User::where('email', $request->input('mail'))->first();
        // si j'ai trouvé un User
        if (!is_null($user)) {
            // je vérifie le mot de passe
            $match = password_verify($request->input('pass'), $user->password);
            // si le mot de passe correspond
            if ($match) {
                // TODO : on va sauvegarder l'utilisateur
                UserSession::connect($user);
                return redirect()->route('home');
            } else {
                // TODO : on informe le visiteur de son erreur
                $viewVars['errors'] = ['Identifiants incorrects'];
                $viewVars['formValues'] = ['mail' => $request->input('mail')];
            }
        } else {
            // TODO : on informe le visiteur de son erreur
            $viewVars['errors'] = ['Identifiants incorrects'];
            $viewVars['formValues'] = ['mail' => $request->input('mail')];
        }
        return view('signin', $viewVars);
    }


    // Fonction pour se déconnecter
    public function logoutAction() {
        UserSession::disconnect();
        return redirect()->route('home');
    }

    // Afficher les infos du compte
    public function account() {
        UserSession::getuser();
        return view('account');
    }

}

