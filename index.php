<?php
session_start();
//ini_set('display_errors', '1');
//ini_set('display_startup_errors', '1');
//error_reporting(E_ALL ^ E_NOTICE);

define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") .
    "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));
require_once "config/config.php";
require_once "config/Securite.class.php";
require_once 'config/Helper.php';

require_once "controllers/frontend/FrontArticles.php";
require_once "controllers/frontend/FrontAccueil.php";
$accueilController = new FrontAccueil();
$articleController = new FrontArticles();


require_once "controllers/backend/Articles.php";
require_once "controllers/backend/Users.php";
require_once "controllers/backend/Comments.php";
$adminArticleController = new Articles();
$adminCommentController = new Comments();
$userController = new Users;


try {
    if (empty($_GET['page'])) {
        $accueilController->afficherPageAccueil();
    } else {
        $url = explode("/", filter_var($_GET['page']), FILTER_SANITIZE_URL);
        switch ($url[0]) {
            case "accueil":
                $accueilController->afficherPageAccueil();
                break;
            case "blog":
                if (empty($url[1])) {
                    $articleController->afficherArticles();
                } else if ($url[1] === "article") {
                    $articleController->afficherArticle($url[2]);
                }
                break;
            case "login":
                if (empty($url[1])) {
                    $userController->getPageLogin();
                }
                break;
            case "inscription":
                if (empty($url[1])) {
                    $userController-> getPageInscription();
                }
                break;
            case "admin":
                $userController->logout();
                if (empty($url[1])) {
                    $userController->getPageAdmin();
                } else if ($url[1] === "articles") {
                    if (empty($url[2])) {
                        $adminArticleController->afficherArticles();
                    } elseif ($url[2] == "ajouter") {
                        $adminArticleController->ajoutArticle();
                    } elseif ($url[2] == "modificationArticle") {
                        $adminArticleController->modificationArticle($url[3]);
                    } elseif ($url[2] == "suppressionArticle") {
                        $adminArticleController->suppressionArticle($url[3]);
                    }
                } elseif ($url[1] === 'commentaires') {
                    if (empty($url[2])) {
                        $adminCommentController->afficherCommentaires();
                    } elseif ($url[2] == "accepterCommentaire") {
                        $adminCommentController->accepterCommentaire($url[3]);
                    } elseif ($url[2] == "afficherCommentaire") {
                        $adminCommentController->afficherCommentaire($url[3]);
                    } elseif ($url[2] == "suppressionCommentaire") {
                        $adminCommentController->suppressionCommentaire($url[3]);
                    }

                } elseif ($url[1] === 'users') {
                    if (empty($url[2])) {
                        $userController->afficherUtilisateurs();
                    } elseif ($url[2] == "suppressionUser") {
                        $userController->suppressionUser($url[3]);
                    }
                }

                break;
            default:
                throw new Exception("La page n'existe pas");
        }
    }
} catch (Exception $e) {
    $msg = $e->getMessage();
    require "views/front/accueil.view.php";
}
