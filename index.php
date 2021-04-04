<?php
require_once "controllers/frontend.controller.php";


try {
    if (isset($_GET['page']) && !empty($_GET['page'])) {

        switch ($_GET['page']) {
            case "accueil":
                getPageAccueil();
                break;
            case "blog":
                getPageBlog();
                break;
            case "article":
                getPageArticle();
                break;
        }
    } else {
        getPageAccueil();
    }
} catch (Exception $e) {

}

