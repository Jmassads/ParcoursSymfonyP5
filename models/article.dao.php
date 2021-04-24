
<?php
require_once 'pdo.php';

function getArticles(){
    $bdd = connexionPDO();
    $stmt = $bdd->prepare("
       SELECT * FROM articles
       INNER JOIN categories on articles.category_id = categories.category_id
       INNER JOIN adminusers on articles.user_id = adminusers.user_id 
       ");
    $stmt->execute();
    $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $articles;
}

function getArticlesbyCategory($category){
    $bdd = connexionPDO();
    $req = '
    SELECT * 
    FROM articles
    where category_id = :category
    ';
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":category",$category,PDO::PARAM_STR);
    $stmt->execute();
    $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $articles;
}

function getArticleById($idArticle){
    $bdd = connexionPDO();
    $req = 'SELECT * FROM articles 
    INNER JOIN categories on articles.category_id = categories.category_id
    INNER JOIN adminusers on articles.user_id = adminusers.user_id 
    where article_id = :idArticle
    ';
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":idArticle",$idArticle);
    $stmt->execute();
    $article = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $article;
}

function getCategoriesArticle(){
    $bdd = connexionPDO();
    $stmt = $bdd->prepare("
       SELECT * FROM categories
       ");
    $stmt->execute();
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $categories;
}

function getAdminUsers(){
    $bdd = connexionPDO();
    $stmt = $bdd->prepare("
       SELECT * FROM adminUsers
       ");
    $stmt->execute();
    $adminUsers = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $adminUsers;
}

function insertArticleIntoBD($articleTitle, $articleExcerpt, $articleContent, $dateCreation, $dateModification, $userID, $categoryID, $imageID){
    $bdd = connexionPDO();
    $req = '
    INSERT INTO articles (article_title, article_excerpt, article_content, date_creation, date_modification, user_id, category_id, id_image)
    values (:title, :excerpt, :content, :date_creation, :date_modification, :userID, :categoryID, :imageID)
    ';
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":title",$articleTitle,PDO::PARAM_STR);
    $stmt->bindValue(":excerpt",$articleExcerpt,PDO::PARAM_STR);
    $stmt->bindValue(":content",$articleContent,PDO::PARAM_STR);
    $stmt->bindValue(":date_creation",$dateCreation, PDO::PARAM_STR);
    $stmt->bindValue(":date_modification",$dateModification, PDO::PARAM_STR);
    $stmt->bindValue(":userID",$userID,PDO::PARAM_INT);
    $stmt->bindValue(":categoryID",$categoryID,PDO::PARAM_INT);
    $stmt->bindValue(":imageID",$imageID,PDO::PARAM_INT);
    $resultat = $stmt->execute();
    $stmt->closeCursor();
    if($resultat >0) return true;
    else return false;
}

function updateArticleIntoBD($articleid, $articleTitle, $articleExcerpt, $articleContent, $dateModification, $userID, $categoryID){
    $bdd = connexionPDO();
    $req = '
    update articles
    set article_title = :title, article_excerpt = :excerpt, article_content = :content, date_modification = :dateModification, user_id = :userID, category_id= :categoryID
    where article_id = :articleid
    ';
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":articleid",$articleid,PDO::PARAM_INT);
    $stmt->bindValue(":title",$articleTitle,PDO::PARAM_STR);
    $stmt->bindValue(":excerpt",$articleExcerpt,PDO::PARAM_STR);
    $stmt->bindValue(":content", $articleContent,PDO::PARAM_STR);
    $stmt->bindValue(":dateModification", $dateModification,PDO::PARAM_STR);
    $stmt->bindValue(":userID",$userID,PDO::PARAM_INT);
    $stmt->bindValue(":categoryID",$categoryID,PDO::PARAM_INT);
    $resultat = $stmt->execute();
    $stmt->closeCursor();
    if($resultat > 0) return true;
    return false;
}

function test(){
    $bdd = connexionPDO();
    $req = 'INSERT INTO articles(article_title, article_excerpt, article_content, date_creation, date_modification, category_id, id_image, user_id) VALUES(\'test\', \'test\', \'test\', \'2021-02-14 20:31:14\', \'2021-02-14 20:31:14\', 2, 2, 1)';
    $stmt = $bdd->prepare($req);
    $stmt->execute();

  die('this is working');

}

function test2(){
    $bdd = connexionPDO();
    $req = '
    update articles
    set article_title = \'julia\', article_excerpt = \'test\', article_content = \'test\', date_modification = \'2021-02-14 20:31:14\', user_id = 1, category_id= 1
    where article_id = 1
    ';
    $stmt = $bdd->prepare($req);
    $stmt->execute();

    die('this is working');

}
