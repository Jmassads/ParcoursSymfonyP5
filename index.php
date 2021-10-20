<?php
session_start();

/**
 * On importe les fichiers du dossier config
 */

require_once "config/config.php";
require_once "config/Securite.class.php";
require_once 'config/Helper.class.php';

/**
 * On importe les fichiers du dossier controllers
 */
require_once "controllers/frontend/FrontArticles.php";
require_once "controllers/frontend/FrontAccueil.php";
/**
 * On instancie les classes pour ensuite utiliser les méthodes dans le try and catch
 */
$accueilController = new FrontAccueil();
$articleController = new FrontArticles();


require_once "controllers/backend/Articles.php";
require_once "controllers/backend/Users.php";
require_once "controllers/backend/Comments.php";
require_once "controllers/backend/Categories.php";
$adminArticleController = new Articles();
$adminCommentController = new Comments();
$adminCategoriesController = new Categories();
$userController = new Users;

/**
 * L'instruction try... catch regroupe des instructions à exécuter
 */
try {
    if (empty($_GET['page'])) {
        /**
         * On affiche la page d'accueil
         */
        $accueilController->afficherPageAccueil();
    } else {
        $url = explode("/", filter_var($_GET['page']), FILTER_SANITIZE_URL);
        // http://localhost:8888/blog/?page=accueil page accueil
        // http://localhost:8888/blog/?page=blog page blog
        // .htaccess rewrite rule : RewriteRule ^(.*)$ index.php?page=$1
        switch ($url[0]) {
            case "accueil":
                /**
                 * On affiche la page d'accueil
                 */
                $accueilController->afficherPageAccueil();
                break;
            case "blog":
                if (empty($url[1])) {
                    /**
                     * On affiche la page page des articles
                     */
                    $articleController->afficherArticles();
                } else if ($url[1] === "article") {
                    /**
                     * On affiche un article
                     */
                    $articleController->afficherArticle($url[2]);
                } else {
                    throw new Exception("La page n'existe pas");
                }
                break;
            case "login":
                if (empty($url[1])) {
                    /**
                     * On affiche la page de login
                     */
                    $userController->getPageLogin();
                } else {
                    throw new Exception("La page n'existe pas");
                }
                break;
            case "inscription":
                if (empty($url[1])) {
                    /**
                     * On affiche la page d'inscription
                     */
                    $userController->getPageInscription();
                } else {
                    throw new Exception("La page n'existe pas");
                }
                break;
            case "admin":
                $userController->logout();
                if (empty($url[1])) {
                    /**
                     * On affiche le dashboard (admin)
                     */
                    $userController->getPageAdmin();
                } else if ($url[1] === "articles") {
                    if (empty($url[2])) {
                        /**
                         * On affiche les articles dans l'admin
                         */
                        $adminArticleController->afficherArticles();
                    } elseif ($url[2] == "ajouter") {
                        /**
                         * On affiche la page pour ajouter un article
                         */
                        $adminArticleController->ajoutArticle();
                    } elseif ($url[2] == "modificationArticle") {
                        /**
                         * On affiche la page pour modifier un article
                         */
                        $adminArticleController->modificationArticle($url[3]);
                    } elseif ($url[2] == "suppressionArticle") {
                        /**
                         * On supprime l'article sélectionné
                         */
                        $adminArticleController->suppressionArticle($url[3]);
                    }
                } else if ($url[1] === 'commentaires') {
                    if (empty($url[2])) {
                        /**
                         * On affiche la page des commentaires
                         */
                        $adminCommentController->afficherCommentaires();
                    } elseif ($url[2] == "accepterCommentaire") {
                        /**
                         * On accepte le commentaire
                         */
                        $adminCommentController->accepterCommentaire($url[3]);
                    } elseif ($url[2] == "afficherCommentaire") {
                        /**
                         * On affiche le commentaire
                         */
                        $adminCommentController->afficherCommentaire($url[3]);
                    } elseif ($url[2] == "suppressionCommentaire") {
                        /**
                         * On supprime le commentaire
                         */
                        $adminCommentController->suppressionCommentaire($url[3]);
                    }

                } elseif ($url[1] === 'users') {
                    if (empty($url[2])) {
                        /**
                         * On affiche les utilisateurs
                         */
                        $userController->afficherUtilisateurs();
                    } elseif ($url[2] == "suppressionUser") {
                        /**
                         * On supprime un utilisateur
                         */
                        $userController->suppressionUser($url[3]);
                    }
                } elseif ($url[1] === 'categories') {
                    if (empty($url[2])) {
                        /**
                         * On affiche les catégories
                         */
                        $adminCategoriesController->afficherCategories();
                    } elseif ($url[2] == "ajouter") {
                        /**
                         * On affiche la page pour ajouter une catégorie
                         */
                        $adminCategoriesController->ajoutCategorie();
                    } elseif ($url[2] == "modificationCategory") {
                        /**
                         * On affiche la page pour modifier une catégorie
                         */
                        $adminCategoriesController->modificationCategory($url[3]);
                    } elseif ($url[2] == "suppressionCategory") {
                        /**
                         * On supprime la catégorie
                         */
                        $adminCategoriesController->suppressionCategory($url[3]);
                    }
                }

                break;
            default:
                throw new Exception("La page n'existe pas");
        }
    }
} catch (Exception $e) {
    $msg = $e->getMessage();
    require "views/front/error.view.php";
}
