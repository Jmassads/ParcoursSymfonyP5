<?php

require_once "models/UsersManager.class.php";

class Users
{
   
    /**
     * @var ArticleManager
     */
    private $articleManager;
    /**
     * @var CommentManager
     */
    private $CommentManager;
    /**
     * @var usersManager
     */
    private $userManager;

    public function __construct()
    {
        $this->userManager = new usersManager;
        $this->articleManager = new ArticleManager;
        $this->CommentManager = new CommentManager;
    }

    public function getPageLogin()
    {

        if (isset($_SESSION['acces']) && !empty($_SESSION['acces']) && $_SESSION['acces'] === "admin") {
            redirect('admin');
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
                        redirect('admin');
                    }

                    if ($user['user_role'] == 2) {
                        $_SESSION['user_id'] = $user['user_id'];
                        $_SESSION['acces'] = "author";
                        if (!empty($_SESSION['previous'])) {
                            header('Location: ' . $_SESSION['previous']);
                        } else {
                            redirect('blog');
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

    public function logout()
    {
        if (isset($_POST['deconnexion']) && $_POST['deconnexion'] === "true") {
            session_destroy();
            redirect('login');
        }
    }

    public function getPageAdmin()
    {
        $numberArticles = $this->articleManager->countArticles();
        $numberComments = $this->CommentManager->countComments();
        if (!isset($_SESSION['acces'])) {
            redirect('login');
        }

        if ($_SESSION['acces'] == 'author') {
            die('vous ne pouvez pas acceder a cette page');
        }

        require_once "views/back/adminAccueil.view.php";
    }

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
                        header('Location: ' . $_SESSION['previous']);

                    } else {
                        die('Something went wrong');


                    }
                }


            } else {
            }
        }
        require_once "views/back/inscription.view.php";
    }

    public function afficherUtilisateurs()
    {
        $users = $this->userManager->getUsers();
        require_once "views/back/adminUsers.view.php";
    }

    public function suppressionUser($id)
    {
        $this->userManager->suppressionUserBD($id);
        redirect('admin/users');
    }

}