<?php
session_start();
require_once "controllers/frontend.controller.php";
require_once "controllers/backend.controller.php";
require_once "config/Securite.class.php";

//$hash = password_hash('', PASSWORD_DEFAULT);
//echo $hash;

try {
    if (isset($_GET['page']) && !empty($_GET['page'])) {
        $page = Securite::secureHTML($_GET['page']);
        switch ($page) {
            case "accueil":
                getPageAccueil();
                break;
            case "blog":
                getPageBlog();
                break;
            case "article":
                getPageArticle();
                break;
            case "login":
                getPageLogin();
                break;
            case "admin":
                getPageAdmin();
                break;
            case "adminArticles":
                getPageAdminArticles();
                break;
            case "genererArticlesAdminAjout": getPageAdminArticlesAjout();
                break;
            case "genererArticlesAdminModif": getPageAdminArticlesModif();
                break;
            case "test":
                getTest();
                break;
            case "error404":
            default: throw new Exception("La page n'existe pas");
        }
    } else {
        getPageAccueil();
    }
} catch (Exception $e) {
    $errorMessage = $e->getMessage();
    require "views/commons/erreur.view.php";
}

