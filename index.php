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
        }
    } else {
        getPageAccueil();
    }
} catch (Exception $e) {

}

