<?php

require_once "Model.class.php";

class CommentManager extends Model
{

    public function getComments()
    {
        $req = $this->getBdd()->prepare("
        SELECT * FROM commentaires 
      ");
        $req->execute();
        $comments = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $comments;
    }

    public function acceptComment($id, $status)
    {
        $req = '
    update commentaires
    set comment_status = :status
    where commentaire_id = :commentID
    ';
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":commentID", $id, PDO::PARAM_INT);
        $stmt->bindValue(":status", $status, PDO::PARAM_INT);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        if ($resultat > 0) return true;
        return false;
    }

    public function getCommentsByArticleId($articleid){
        $req = $this->getBdd()->prepare("SELECT * FROM commentaires 
INNER JOIN Users on commentaires.user_id = Users.user_id
        where article_id = :articleid
        AND comment_status = 1");
        $req->bindValue(":articleid",$articleid,PDO::PARAM_INT);
        $req->execute();
        $comments = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $comments;
    }

    public function insertCommentIntoBD($contenu, $user_id, $article_id, $status){
        $req = 'INSERT INTO commentaires (contenu, user_id, article_id, comment_status)
    values (:contenu, :user_id, :article_id, :comment_status)
    ';
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":contenu",$contenu,PDO::PARAM_STR);
        $stmt->bindValue(":user_id",$user_id,PDO::PARAM_INT);
        $stmt->bindValue(":article_id",$article_id,PDO::PARAM_INT);
        $stmt->bindValue(":comment_status",$status,PDO::PARAM_INT);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        if($resultat >0) return true;
        else return false;
    }


}