<?php

require_once "models/ArticleManager.class.php";


class Articles
{
    private $articleManager;

    /**
     * On instancie la classe ArticleManager (model)
     */
    public function __construct()
    {
        $this->articleManager = new ArticleManager;
        $this->articleManager->chargementArticles();
    }

    /**
     * On recupere tous les articles pour les afficher
     */
    public function afficherArticles()
    {

        $articles = $this->articleManager->getArticles();
        require "views/back/adminArticles.view.php";
    }


    /**
     * On ajoute un article dans le BDD
     */
    public function ajoutArticle()
    {

        $categoriesArticle = $this->articleManager->getCategoriesArticle();
        $articleTitle = trim($_POST['articleTitle']);
        $articleExcerpt = trim($_POST['articleExcerpt']);
        $articleContent = trim($_POST['articleContent']);
        $category = $_POST['articleCategory'];
        $dateCreation = date("Y-m-d H:i:s", time());
        $userID = $_SESSION['user_id'];
        if (isset($_POST['submit'])) {
            if (isset($articleTitle) && !empty($articleTitle) &&
                isset($articleExcerpt) && !empty($articleExcerpt) &&
                isset($articleContent) && !empty($articleContent)
            ) {


                if ($this->articleManager->insertArticleIntoBD($articleTitle, $articleExcerpt, $articleContent, $dateCreation, $category, $userID)) {
                    Helper::flash('article_message', "L'article a été ajouté");
                    helper::redirect('admin/articles');
                }
            }
        }

        require "views/back/adminArticlesAjout.view.php";
    }


    /**
     * @param $id
     * @throws Exception
     * On modifie un article dans le BDD
     */
    public function modificationArticle($id)
    {
        $categoriesArticle = $this->articleManager->getCategoriesArticle();
        $article = $this->articleManager->getArticleById($id);
        $articleTitle = trim($_POST['articleTitle']);
        $articleExcerpt = trim($_POST['articleExcerpt']);
        $articleContent = trim($_POST['articleContent']);
        $category = $_POST['categoryArticle'];
        $dateModification = date("Y-m-d H:i:s", time());

        if (isset($_POST['submit'])) {
            if ($this->articleManager->updateArticleIntoBD($id, $articleTitle, $articleExcerpt, $articleContent, $dateModification, $category)) {
                Helper::flash('article_message', "L'article a été modifié");
                helper::redirect('admin/articles');
            }
        }
        require "views/back/adminArticleModif.view.php";
    }

    /**
     * @param $id
     * On supprime un article dans le BDD
     */
    public function suppressionArticle($id)
    {
        $this->articleManager->suppressionArticleBD($id);
        Helper::flash('article_message', "L'article a été supprimé");
        helper::redirect('admin/articles');
    }
}

