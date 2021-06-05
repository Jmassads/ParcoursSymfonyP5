<?php
require_once "Model.class.php";

class UsersManager extends Model
{

    function findUserByEmail($user_email)
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

    function getPasswordUser($user_email)
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

    function isConnexionValid($user_email, $password)
    {
        $user = $this->getPasswordUser($user_email);
        return password_verify($password, $user['user_password']);
    }

    function insertUserIntoBD($userFirstname, $userLastname, $userEmail, $userPassword, $userRole)
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
        if ($resultat > 0) return true;
        else return false;
    }


}