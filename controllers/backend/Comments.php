<?php

require_once "models/CommentManager.class.php";


class Comments
{

    private $CommentManager;
    /**
     * On instancie la classe CommentManager (model)
     */
    public function __construct()
    {
        $this->CommentManager = new CommentManager;
    }

    /**
     * On recupere tous les commentaires pour les afficher
     */
    public function afficherCommentaires()
    {
        $comments = $this->CommentManager->getComments();
        require "views/back/adminComments.view.php";
    }

    /**
     * On recupere 1 commentaire pour l'afficher
     */
    public function afficherCommentaire($id)
    {
        $comment = $this->CommentManager->getCommentById($id);
        require "views/back/adminComment.view.php";
    }

    /**
     * On change le status du commentaire dans la BDD (on l'accepte) pour qu'il s'affiche en front
     */
    public function accepterCommentaire($id)
    {
        $status = 1;
        if ($this->CommentManager->acceptComment($id, $status)) {
            flash('comment_message', "Le commentaire a été accepté");
            redirect('admin/commentaires');
        }
    }

    /**
     * On supprime un commentaire dans la BDD
     */
    public function suppressionCommentaire($id)
    {
        $this->CommentManager->suppressionCommentBD($id);
        flash('comment_message', "Le commentaire a été supprimé");
        redirect('admin/commentaires');
    }

}
