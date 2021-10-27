<?php


require_once "Model.class.php";
require_once "Article.class.php";

/**
 * Class ArticleManager
 */
class ArticleManager extends Model
{
    /**
     * @var
     */
    private $articles; // tableau d'articles

    /**
     * @param $article
     */
    public function ajoutArticle($article)
    {
        $this->articles[] = $article;
    }

    /**
     * @return mixed
     */
    public function getArticles()
    {
        return $this->articles;
    }


    /**
     * Fonction qui permet de récupérer tous les articles
     */
    public function chargementArticles()
    {
        $req = $this->getBdd()->prepare("
        SELECT * FROM articles 
        INNER JOIN categories on articles.category_id = categories.category_id
        INNER JOIN users on articles.user_id = users.user_id
      ");
        $req->execute();
        $articles = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach ($articles as $article) {
            $article = new Article($article['article_id'], $article['article_title'], $article['article_excerpt'], $article['article_content'], $article['date_creation'], $article['date_modification'], $article['category_id'], $article['category_title'], $article['user_id'], $article['user_firstname'],$article['user_lastname'] );

            $this->ajoutArticle($article);
        }
    }

    /**
     * @param $id
     * @return mixed
     * @throws Exception
     */
    public function getArticleById($id)
    {

        for ($i = 0, $count = count($this->articles); $i < $count; $i++) {
            if ($this->articles[$i]->getId() === $id) {
                return $this->articles[$i];
            }
        }
        throw new Exception("L'article n'existe pas");

    }

    /**
     * @return mixed
     */
    public function getCategoriesArticle()
    {
        $req = $this->getBdd()->prepare("SELECT * FROM categories");
        $req->execute();
        $categories = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $categories;
    }

    /**
     * @param $articleTitle
     * @param $articleExcerpt
     * @param $articleContent
     * @param $dateCreation
     * @param $categoryID
     * @param $userId
     * @return bool
     */
    public function insertArticleIntoBD($articleTitle, $articleExcerpt, $articleContent, $dateCreation, $categoryID, $userId)
    {
        $req = 'INSERT INTO articles (article_title, article_excerpt, article_content, date_creation,category_id, user_id)
    values (:title, :excerpt, :content, :date_creation, :categoryID, :userID)
    ';
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":title", $articleTitle, PDO::PARAM_STR);
        $stmt->bindValue(":excerpt", $articleExcerpt, PDO::PARAM_STR);
        $stmt->bindValue(":content", $articleContent, PDO::PARAM_STR);
        $stmt->bindValue(":date_creation", $dateCreation, PDO::PARAM_STR);
        $stmt->bindValue(":categoryID", $categoryID, PDO::PARAM_INT);
        $stmt->bindValue(":userID", $userId, PDO::PARAM_INT);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        if ($resultat > 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $articleid
     * @param $articleTitle
     * @param $articleExcerpt
     * @param $articleContent
     * @param $dateModification
     * @param $categoryID
     * @return bool
     * bindValue() va elle directement une valeur à un paramètre nommé
     */
    public function updateArticleIntoBD($articleid, $articleTitle, $articleExcerpt, $articleContent, $dateModification, $categoryID)
    {
        $req = '
    update articles
    set article_title = :title, article_excerpt = :excerpt, article_content = :content, date_modification = :dateModification, category_id= :categoryID
    where article_id = :articleid
    ';
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":articleid", $articleid, PDO::PARAM_INT);
        $stmt->bindValue(":title", $articleTitle, PDO::PARAM_STR);
        $stmt->bindValue(":excerpt", $articleExcerpt, PDO::PARAM_STR);
        $stmt->bindValue(":content", $articleContent, PDO::PARAM_STR);
        $stmt->bindValue(":dateModification", $dateModification, PDO::PARAM_STR);
        $stmt->bindValue(":categoryID", $categoryID, PDO::PARAM_INT);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        if ($resultat > 0) {
            return true;
        }
        {
            return false;
        }
    }

    /**
     * @param $id
     */
    public function suppressionArticleBD($id)
    {
        $req = "
        DELETE from articles where article_id = :idArticle
        ";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idArticle", $id, PDO::PARAM_INT);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
    }

    /**
     * @return mixed
     */
    public function countArticles()
    {
        $req = $this->getBdd()->prepare("
        SELECT * FROM articles 
      ");
        $req->execute();
        $articles = $req->rowCount();
        $req->closeCursor();
        return $articles;
    }
}

