<?php

require_once "Model.class.php";

class CategoryManager extends Model
{
    public function getCategories()
    {
        $req = $this->getBdd()->prepare("
        SELECT * FROM Categories
      ");
        $req->execute();
        $categories = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $categories;
    }

    public function getCategoryById($id)
    {
        $req = "
        SELECT * FROM categories
        where category_id = :idCategory
      ";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idCategory", $id, PDO::PARAM_INT);
        $stmt->execute();
        $comment = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $comment;
    }

    public function insertCategoryIntoBD($category)
    {
        $req = 'INSERT INTO categories (category_title)
    values (:title)
    ';
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":title", $category, PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        if ($resultat > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function updateCategoryIntoBD($categoryid, $category)
    {
        $req = '
    update categories
    set category_title = :title
    where category_id = :categoryid
    ';
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":categoryid", $categoryid, PDO::PARAM_INT);
        $stmt->bindValue(":title", $category, PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        if ($resultat > 0) {
            return true;
        }
        {
            return false;
        }
    }

    public function suppressionCategoryBD($id)
    {
        $req = "
        DELETE from categories where category_id = :idCategory
        ";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idCategory", $id, PDO::PARAM_INT);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
    }
}

