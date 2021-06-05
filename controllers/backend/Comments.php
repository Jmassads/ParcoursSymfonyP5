<?php



require_once "models/CommentManager.class.php";
require_once "dist/utile/formatage.php";

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

    public function afficherCommentaires(){
        $comments = $this->CommentManager->getComments();
        require "views/back/adminComments.view.php";
    }

    public function accepterCommentaire($id){
        $status = 1;
        if ($this->CommentManager->acceptComment($id, $status)) {
            redirect('admin/commentaires');
        }

    }



}