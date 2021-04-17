<?php

require_once "models/article.dao.php";
require_once "models/users.dao.php";
require_once 'config/config.php';

function getPageLogin()
{

    if (isset($_SESSION['acces']) && !empty($_SESSION['acces']) && $_SESSION['acces'] === "admin") {
        if($_COOKIE[COOKIE_PROTECT] === $_SESSION[COOKIE_PROTECT]){
            $ticket = session_id().microtime().rand(0, 99999);
            $ticket = hash("sha512, $ticket");
            setcookie(COOKIE_PROTECT, $ticket, time() + (60 * 20));
            $_SESSION[COOKIE_PROTECT] = $ticket;
            header("Location: admin");
        } else {
            session_destroy();
            throw new Exception("Vous n'avez pas le droit d'être là");
        }

    }
    $data = [
        'email_err' => '',
        'password_err' => '',
    ];

    if (isset($_POST['user_email']) && !empty($_POST['user_email']) &&
        isset($_POST['password']) && !empty($_POST['password'])) {
        $email = Securite::secureHTML($_POST['user_email']);
        $password = Securite::secureHTML($_POST['password']);
        if (findUserByEmail($email)) {
            if (isConnexionValid($email, $password)) {
                $_SESSION['acces'] = "admin";
                $ticket = session_id().microtime().rand(0, 99999);
                $ticket = hash("sha512, $ticket");
                setcookie(COOKIE_PROTECT, $ticket, time() + (60 * 20));
                $_SESSION[COOKIE_PROTECT] = $ticket;
                header("Location: admin");
            } else {
                $data['password_err'] = 'mot de passe invalide';
            }
        } else {
            $data['email_err'] = 'utilisateur non trouvé';
        }

    }

    require_once "views/back/login.view.php";
}

function getPageAdmin(){
    if(isset($_POST['deconnexion']) && $_POST['deconnexion'] === "true"){
        session_destroy();
        header("Location: accueil");
    }
    require_once "views/back/adminAccueil.view.php";
}


