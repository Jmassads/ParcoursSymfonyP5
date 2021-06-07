<?php

require_once "models/ArticleManager.class.php";
require_once "models/users.dao.php"; // a changer
require_once "public/utile/formatage.php";

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
        $articleTitle = trim($_POST['articleTitle']);
        $articleExcerpt = trim($_POST['articleExcerpt']);
        $articleContent = trim($_POST['articleContent']);
        $category = $_POST['articleCategory'];
        $dateCreation = date("Y-m-d H:i:s", time());
        if (isset($articleTitle) && !empty($articleTitle) &&
            isset($articleExcerpt) && !empty($articleExcerpt) &&
            isset($articleContent) && !empty($articleContent)
        ) {
            $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            if ($this->articleManager->insertArticleIntoBD($articleTitle, $articleExcerpt, $articleContent, $dateCreation, $category)) {
                flash('article_message', "L'article a été ajouté");
                redirect('admin/articles');

            } else {



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

        if (isset($_POST['submit'])) {
            if ($this->articleManager->updateArticleIntoBD($id, $articleTitle, $articleExcerpt, $articleContent, $dateModification, $category)) {
                flash('article_message', "L'article a été modifié");
                redirect('admin/articles');

            } else {


            }
        }
        require "views/back/adminArticleModif.view.php";
    }

    public function suppressionArticle($id)
    {
        $this->articleManager->suppressionArticleBD($id);
        flash('article_message', "L'article a été supprimé");
        redirect('admin/articles');
    }


}