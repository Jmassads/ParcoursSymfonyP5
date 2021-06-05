<?php



require_once "Model.class.php";
require_once "Article.class.php";

class ArticleManager extends Model
{
    private $articles; // tableau d'articles'

    public function ajoutArticle($article)
    {
        $this->articles[] = $article;
    }

    public function getArticles()
    {
        return $this->articles;
    }

    public function chargementArticles()
    {
        $req = $this->getBdd()->prepare("
        SELECT * FROM articles 
        INNER JOIN categories on articles.category_id = categories.category_id
      ");
        $req->execute();
        $articles = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        foreach ($articles as $article) {
            $article = new Article($article['article_id'], $article['article_title'], $article['article_excerpt'], $article['article_content'], $article['date_creation'], $article['date_modification'], $article['user_id'], $article['category_id'], $article['user_firstname'], $article['user_lastname'], $article['category_title'], $article['url_image']);
            $this->ajoutArticle($article);
        }
    }

    public function getArticleById($id)
    {

        for ($i = 0; $i < count($this->articles); $i++) {
            if ($this->articles[$i]->getId() === $id) {
                return $this->articles[$i];
            }
        }
        throw new Exception("L'article n'existe pas");
    }

    public function getCategoriesArticle()
    {
        $req = $this->getBdd()->prepare("SELECT * FROM categories");
        $req->execute();
        $categories = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $categories;
    }

    public function insertArticleIntoBD($articleTitle, $articleExcerpt, $articleContent, $dateCreation, $categoryID){
        $req = 'INSERT INTO articles (article_title, article_excerpt, article_content, date_creation,category_id)
    values (:title, :excerpt, :content, :date_creation, :categoryID)
    ';
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":title",$articleTitle,PDO::PARAM_STR);
        $stmt->bindValue(":excerpt",$articleExcerpt,PDO::PARAM_STR);
        $stmt->bindValue(":content",$articleContent,PDO::PARAM_STR);
        $stmt->bindValue(":date_creation",$dateCreation, PDO::PARAM_STR);
        $stmt->bindValue(":categoryID",$categoryID,PDO::PARAM_INT);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        if($resultat >0) return true;
        else return false;
    }

    public function updateArticleIntoBD($articleid, $articleTitle, $articleExcerpt, $articleContent, $dateModification, $categoryID){
        $req = '
    update articles
    set article_title = :title, article_excerpt = :excerpt, article_content = :content, date_modification = :dateModification, category_id= :categoryID
    where article_id = :articleid
    ';
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":articleid",$articleid,PDO::PARAM_INT);
        $stmt->bindValue(":title",$articleTitle,PDO::PARAM_STR);
        $stmt->bindValue(":excerpt",$articleExcerpt,PDO::PARAM_STR);
        $stmt->bindValue(":content", $articleContent,PDO::PARAM_STR);
        $stmt->bindValue(":dateModification", $dateModification,PDO::PARAM_STR);
        $stmt->bindValue(":categoryID",$categoryID,PDO::PARAM_INT);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        if($resultat > 0) return true;
        return false;
    }

    public function suppressionArticleBD($id){
        $req = "
        DELETE from articles where article_id = :idArticle
        ";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idArticle",$id,PDO::PARAM_INT);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
    }




}