<?php



require_once "models/CommentManager.class.php";
require_once "public/utile/formatage.php";

class Comments
{

    /**
     * @var CommentManager
     */
    private $CommentManager;

    public function __construct()
    {
        $this->CommentManager = new CommentManager;
    }

    public function afficherCommentaires()
    {
        $comments = $this->CommentManager->getComments();
        require "views/back/adminComments.view.php";
    }

    public function afficherCommentaire($id)
    {
        $comment = $this->CommentManager->getCommentById($id);
        require "views/back/adminComment.view.php";
    }

    public function accepterCommentaire($id)
    {
        $status = 1;
        if ($this->CommentManager->acceptComment($id, $status)) {
            flash('comment_message', "Le commentaire a été accepté");
            redirect('admin/commentaires');
        }
    }

    public function suppressionCommentaire($id)
    {
        $this->CommentManager->suppressionCommentBD($id);
        flash('comment_message', "Le commentaire a été supprimé");
        redirect('admin/commentaires');
    }



}