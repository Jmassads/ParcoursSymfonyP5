<?php



require_once "models/ArticleManager.class.php";
require_once "models/users.dao.php"; // a changer
require_once "dist/utile/formatage.php";

class Articles
{
    private $articleManager;

    public function __construct()
    {
        $this->articleManager = new ArticleManager;
        $this->articleManager->chargementArticles();
    }

    public function afficherArticles()
    {
        $articles = $this->articleManager->getArticles();
        require "views/back/adminArticles.view.php";
    }

    public function ajoutArticle()
    {
        $categoriesArticle = $this->articleManager->getCategoriesArticle();
        if (isset($_POST['articleTitle']) && !empty($_POST['articleTitle']) &&
            isset($_POST['articleExcerpt']) && !empty($_POST['articleExcerpt']) &&
            isset($_POST['articleContent']) && !empty($_POST['articleContent'])
        ) {

            $articleTitle = Securite::secureHTML($_POST['articleTitle']);
            $articleExcerpt = Securite::secureHTML($_POST['articleExcerpt']);
            $articleContent = Securite::secureHTML($_POST['articleContent']);
            $category = $_POST['articleCategory'];
            $dateCreation = date("Y-m-d H:i:s", time());

            if ($this->articleManager->insertArticleIntoBD($articleTitle, $articleExcerpt, $articleContent, $dateCreation, $category)) {
                redirect('admin/articles');
                $alert = "La création de l'article est effectuée";
                $alertType = ALERT_SUCCESS;
            } else {
                die('not working');
                throw new Exception("L'insertion en BD n'a pas fonctionné");
                $alert = "La création de l'article na pas fonctionnée";
                $alertType = ALERT_DANGER;

            }
        }
        require "views/back/adminArticlesAjout.view.php";
    }

    public function modificationArticle($id)
    {
        $categoriesArticle = $this->articleManager->getCategoriesArticle();
        $article = $this->articleManager->getArticleById($id);
        $articleTitle = Securite::secureHTML($_POST['articleTitle']);
        $articleExcerpt = Securite::secureHTML($_POST['articleExcerpt']);
        $articleContent = Securite::secureHTML($_POST['articleContent']);
        $category = $_POST['categoryArticle'];
        $dateModification = date("Y-m-d H:i:s", time());

        if(isset($_POST['submit'])){
            if ($this->articleManager->updateArticleIntoBD($id, $articleTitle, $articleExcerpt, $articleContent, $dateModification, $category)) {
                redirect('admin/articles');
                $alert = "La modification de l'article est effectuée";
                $alertType = ALERT_SUCCESS;
            } else {

                throw new Exception("La modification en BD n'a pas fonctionné");
                $alert = "La création de l'article na pas fonctionnée";
                $alertType = ALERT_DANGER;

            }
        }
        require "views/back/adminArticleModif.view.php";
    }

    public function suppressionArticle($id){
        $this->articleManager->suppressionArticleBD($id);
        redirect('admin/articles');
    }


}