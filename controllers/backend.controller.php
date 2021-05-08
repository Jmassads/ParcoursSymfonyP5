<?php

require_once "models/article.dao.php";
require_once "models/users.dao.php";
require_once 'config/config.php';
require_once "dist/utile/formatage.php";

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

function getPageAdminArticles($require ="", $alert="",$alertType="",$data=""){
    $adminUsers = getAdminUsers();
    $categoriesArticle = getCategoriesArticle();
    require_once "views/back/adminArticles.view.php";
    if($require !=="") require_once $require;
}

function getPageAdminArticlesAjout(){
    $alert = "" ;
    $alertType="";
    $adminUsers = getAdminUsers();
    $categoriesArticle = getCategoriesArticle();
    if(isset($_POST['articleTitle']) && !empty($_POST['articleTitle']) &&
        isset($_POST['articleExcerpt']) && !empty($_POST['articleExcerpt']) &&
        isset($_POST['articleContent']) && !empty($_POST['articleContent'])
    ) {
        $articleTitle = Securite::secureHTML($_POST['articleTitle']);
        $articleExcerpt = Securite::secureHTML($_POST['articleExcerpt']);
        $articleContent = Securite::secureHTML($_POST['articleContent']);
        $category = $_POST['articleCategory'];
        $adminUser = $_POST['adminUser'];
        $date = date("Y-m-d H:i:s", time());

        if(insertArticleIntoBD($articleTitle, $articleExcerpt, $articleContent, $date, $date, $adminUser, $category, 2)){
            $alert = "La création de l'article est effectuée";
            $alertType = ALERT_SUCCESS;
        }else {
            throw new Exception("L'insertion en BD n'a pas fonctionné");
            $alert = "La création de l'article na pas fonctionnée";
            $alertType = ALERT_DANGER;

        }
    }
    getPageAdminArticles("views/back/adminArticlesAjout.view.php", $alert,$alertType);
}

function getPageAdminArticlesModif(){
    $alert = "";
    $alertType="";
    $data = [];
    if(isset($_POST['etape']) && $_POST['etape'] >= 2) {
        $categoryArticle = Securite::secureHTML($_POST['categoryArticle']);
        $data['articles'] = getArticlesbyCategory((int) $categoryArticle);
    }
    if(isset($_POST['etape']) && $_POST['etape'] >= 3) {
        $article = Securite::secureHTML($_POST['article']);
        $data['article'] = getArticleById($article);
    }

    if(isset($_POST['etape']) && $_POST['etape'] >= 4) {

        $articleTitle = Securite::secureHTML($_POST['articleTitle']);
        $articleExcerpt = Securite::secureHTML($_POST['articleExcerpt']);
        $articleContent = Securite::secureHTML($_POST['articleContent']);
        $category = $_POST['categoryArticle'];
        $adminUser = $_POST['adminUser'];
        $date = date("Y-m-d H:i:s", time());
        $articleid = $data['article']['article_id'];

        if(updateArticleIntoBD($articleid, $articleTitle, $articleExcerpt, $articleContent, $date, $adminUser, $category)){
            $alert = "La modification de l'article est effectuée";
            $alertType = ALERT_SUCCESS;
        }else {
            throw new Exception("La modification en BD n'a pas fonctionné");
            $alert = "La création de l'article na pas fonctionnée";
            $alertType = ALERT_DANGER;

        }

    }
    getPageAdminArticles("views/back/adminArticlesModif.view.php",$alert,$alertType,$data);
}

function getPageArticlesSup(){
    $alert = "";
    $alertType="";
    if(isset($_GET['sup'])){
        try{
            deleteArticleFromBD(Securite::secureHTML($_GET['sup']));
            $alert = "La suppression de l'actualité a fonctionnée";
            $alertType = ALERT_SUCCESS;
        } catch(Exception $e){
            $alert = "La suppression de l'actualité n'a pas fonctionnée";
            $alertType = ALERT_DANGER;
        }
    }
    getPageAdminArticles("",$alert,$alertType);
}


