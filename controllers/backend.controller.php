<?php

require_once "models/article.dao.php";
require_once "models/users.dao.php";
require_once 'config/config.php';

function getPageLogin()
{

    if (isset($_SESSION['acces']) && !empty($_SESSION['acces']) && $_SESSION['acces'] === "admin") {
        header("Location: admin");
    }
    $data = [
        'email_err' => '',
        'password_err' => '',
    ];

    if (isset($_POST['user_email']) && !empty($_POST['user_email']) &&
        isset($_POST['password']) && !empty($_POST['password'])) {
        $login = Securite::secureHTML($_POST['user_email']);
        $password = Securite::secureHTML($_POST['password']);
        if (findUserByEmail($login)) {
            if (isConnexionValid($login, $password)) {
                $_SESSION['acces'] = "admin";
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


