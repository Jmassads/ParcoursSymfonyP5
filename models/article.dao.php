
<?php
require_once 'pdo.php';

function getArticles(){
    $bdd = connexionPDO();
    $stmt = $bdd->prepare("
       SELECT * FROM articles
       INNER JOIN categories on articles.category_id = categories.category_id
       INNER JOIN users on articles.user_id = users.user_id 
       INNER JOIN Image on articles.id_image = Image.id_image;
       ");
    $stmt->execute();
    $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $articles;
}

function getArticleById($idArticle){
    $bdd = connexionPDO();
    $req = 'SELECT * FROM articles 
    INNER JOIN categories on articles.category_id = categories.category_id
    INNER JOIN users on articles.user_id = users.user_id 
    INNER JOIN Image on articles.id_image = Image.id_image
    where article_id = :idArticle
    ';
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":idArticle",$idArticle);
    $stmt->execute();
    $article = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $article;
}

