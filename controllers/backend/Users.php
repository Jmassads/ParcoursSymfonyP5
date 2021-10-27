<?php

require_once "models/UsersManager.class.php";

/**
 * Class Users
 */
class Users
{
    /**
     * On instancie les classes UsersManager, ArticleManager et CommentManager
     */
    private $articleManager;
    private $CommentManager;
    private $userManager;

    public function __construct()
    {
        $this->userManager = new usersManager;
        $this->articleManager = new ArticleManager;
        $this->CommentManager = new CommentManager;
    }

    /**
     * On vérifie le login et on fait une redirection vers l'admin ou le blog en fonction du role de l'utilisateur
     * @throws Exception
     */
    public function getPageLogin()
    {

        if(Securite::verificationAccess()){
            helper::redirect('admin');
        }


        $data = [
            'email_err' => '',
            'password_err' => '',
        ];

        if (isset($_POST['user_email']) && !empty($_POST['user_email']) &&
            isset($_POST['password']) && !empty($_POST['password'])) {
            $email = Securite::secureHTML($_POST['user_email']);
            $password = Securite::secureHTML($_POST['password']);
            if ($this->userManager->findUserByEmail($email)) {
                $user = $this->userManager->findUserByEmail($email);
                if ($this->userManager->isConnexionValid($email, $password)) {
                    if ($user['user_role'] == 1) {
                        $_SESSION['user_id'] = $user['user_id'];
                        $_SESSION['acces'] = "admin";
                        Securite::genereCookiePassword();
                        helper::redirect('admin');
                    }

                    if ($user['user_role'] == 2) {
                        $_SESSION['user_id'] = $user['user_id'];
                        $_SESSION['acces'] = "author";
                        if (!empty($_SESSION['previous'])) {
                            header('Location: ' . $_SESSION['previous']);
                        } else {
                            helper::redirect('blog');
                        }

                    }

                } else {
                    $data['password_err'] = 'mot de passe incorrect';
                }
            } else {
                $data['email_err'] = 'utilisateur non trouvé';
            }

        } else {
        }
        require_once "views/back/login.view.php";
    }

    /**
     * Cette fonction permet de se deconnecter
     */
    public function logout()
    {

        if (isset($_POST['deconnexion']) && $_POST['deconnexion'] === "true") {
            session_destroy();
            helper::redirect('login');
        }
    }

    /**
     * On affiche le nombre d'articles et de commentaires sur le dashboard
     */
    public function getPageAdmin()
    {
        $numberArticles = $this->articleManager->countArticles();
        $numberComments = $this->CommentManager->countComments();

        if(Securite::verificationAccess()){
            require_once "views/back/adminAccueil.view.php";
        } else {
            throw new Exception("Vous n'avez pas le droit d'accéder à cette page");
        }

    }

    /**
     *
     */
    public function getPageInscription()
    {
        if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['user_lastname']) && !empty($_POST['user_firstname']) &&
                isset($_POST['user_password']) && !empty($_POST['user_email'])) {
                $firstname = Securite::secureHTML($_POST['user_firstname']);
                $lastname = Securite::secureHTML($_POST['user_lastname']);
                $email = Securite::secureHTML($_POST['user_email']);
                $password = password_hash(Securite::secureHTML($_POST['user_password']), PASSWORD_DEFAULT);
                if ($this->userManager->findUserByEmail($email)) {
                    $data['email_err'] = 'Cet email est déjà pris';
                } else {
                    if ($this->userManager->insertUserIntoBD($firstname, $lastname, $email, $password, 2)) {
                        $_SESSION['acces'] = "author";
                        helper::redirect('login');
                    }
                }


            } else {
            }
        }
        require_once "views/back/inscription.view.php";
    }

    /**
     *
     */
    public function afficherUtilisateurs()
    {
        $users = $this->userManager->getUsers();
        require_once "views/back/adminUsers.view.php";
    }

    /**
     * @param $id
     */
    public function modificationUser($id)
    {
        $userRoles = $this->userManager->getUserRoles();
        $user = $this->userManager->getUserbyId($id);

        $prenom = Securite::secureHTML($_POST['firstname']);
        $nom = Securite::secureHTML($_POST['lastname']);
        $role = $_POST['userRole'];

        if (isset($_POST['submit'])) {

            if ($this->userManager->updateUserIntoBD($id, $prenom, $nom, $role)) {
                Helper::flash('user_message', "L'utilisateur a été modifié");
                helper::redirect('admin/users');
            }
        }

        require_once "views/back/adminUserModif.view.php";
    }

    /**
     * @param $id
     */
    public function suppressionUser($id)
    {
        $this->userManager->suppressionUserBD($id);
        helper::redirect('admin/users');
    }
}

