<?php

require_once 'config/config.php';
require_once("models/article.dao.php");

function getPageAccueil(){
    require_once "views/front/accueil.view.php";
}

function getPageBlog(){
    $articles = getArticles();
    require_once "views/front/blog.view.php";
}

function getPageArticle(){
    $article = getArticleById($_GET['idArticle']);
    require_once "views/front/article.view.php";
}
