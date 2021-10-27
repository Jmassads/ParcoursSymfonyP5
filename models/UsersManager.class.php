<?php
require_once "Model.class.php";

class UsersManager extends Model
{

    public function findUserByEmail($user_email)
    {
        $req = '
    SELECT * 
    FROM Users 
    where user_email = :user_email';
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":user_email", $user_email, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        // Check if email exists
        if ($user) {
            return $user;
        } else {
            return false;
        }
    }

    public function getPasswordUser($user_email)
    {

        $req = '
    SELECT * 
    FROM Users 
    where user_email = :user_email';
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":user_email", $user_email, PDO::PARAM_STR);
        $stmt->execute();
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $admin;
    }

    public function isConnexionValid($user_email, $password)
    {
        $user = $this->getPasswordUser($user_email);
        return password_verify($password, $user['user_password']);
    }

    public function insertUserIntoBD($userFirstname, $userLastname, $userEmail, $userPassword, $userRole)
    {
        $req = 'INSERT INTO users (user_firstname, user_lastname, user_email, user_password, user_role)
    values (:firstname, :lastname, :email, :password, :role)
    ';
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":firstname", $userFirstname, PDO::PARAM_STR);
        $stmt->bindValue(":lastname", $userLastname, PDO::PARAM_STR);
        $stmt->bindValue(":email", $userEmail, PDO::PARAM_STR);
        $stmt->bindValue(":password", $userPassword, PDO::PARAM_STR);
        $stmt->bindValue(":role", $userRole, PDO::PARAM_INT);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        if ($resultat > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getUsers()
    {
        $req = $this->getBdd()->prepare("
        SELECT * FROM Users 
      ");
        $req->execute();
        $users = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $users;
    }

    public function getUserbyId($id){
        $req = "
        SELECT * FROM Users
        where user_id = :id
      ";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $user;
    }

    public function getUserRoles(){
        $req = $this->getBdd()->prepare("
        SELECT * FROM UserRole 
      ");
        $req->execute();
        $userRoles = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $userRoles;
    }

    public function updateUserIntoBD($userid, $prenom, $nom, $roleid){
        $req = '
    update users
    set user_firstname = :prenom , user_lastname = :nom , user_role = :roleid
    where user_id = :userid
    ';
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":userid", $userid, PDO::PARAM_INT);
        $stmt->bindValue(":prenom", $prenom, PDO::PARAM_STR);
        $stmt->bindValue(":nom", $nom, PDO::PARAM_STR);
        $stmt->bindValue(":roleid", $roleid, PDO::PARAM_INT);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        if ($resultat > 0) {
            return true;
        }
        {
            return false;
        }
    }

    public function suppressionUserBD($id)
    {
        $req = "
        DELETE from users where user_id = :idUser
        ";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idUser", $id, PDO::PARAM_INT);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
    }
}
