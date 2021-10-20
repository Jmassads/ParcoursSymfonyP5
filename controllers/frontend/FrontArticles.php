<?php

require_once "models/ArticleManager.class.php";
require_once "models/CommentManager.class.php";

class FrontArticles
{

    private $articleManager;
    private $commentManager;

    public function __construct()
    {
        $this->commentManager = new CommentManager;
        $this->articleManager = new ArticleManager;
        $this->articleManager->chargementArticles();
    }

    public function afficherArticles()
    {
        $articles = $this->articleManager->getArticles();
        require "views/front/blog.view.php";
    }

    public function afficherArticle($id)
    {
        $article = $this->articleManager->getArticleById($id);
        $commentaires = $this->commentManager->getCommentsByArticleId($id);
        $_SESSION['previous'] = 'http://'. $_SERVER['HTTP_HOST']. $_SERVER['REQUEST_URI'];
        if (isset($_POST['deconnexion'])) {
            session_destroy();
            header("Location: http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
        }

        if (isset($_POST['sendcomment'])) {
            $comment = Securite::secureHTML($_POST['comment']);
            $article_id = Securite::secureHTML($_POST['article_id']);
            $status = 0;
            $datePosted = date("Y-m-d H:i:s", time());
            $this->commentManager->insertCommentIntoBD($comment, $datePosted, $_SESSION['user_id'], $article_id, $status);
            Helper::flash('comment_message', "Votre commentaire est en attente de validation");
        }

        require "views/front/article.view.php";
    }

}
