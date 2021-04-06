<?php

function findUserByEmail($user_email)
{
    $bdd = connexionPDO();
    $req = '
    SELECT * 
    FROM users 
    where user_email = :user_email';
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":user_email", $user_email, PDO::PARAM_STR);
    $stmt->execute();
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    // Check if email exists
    if ($admin) {
        return true;
    } else {
        return false;
    }
}

function getPasswordUser($user_email)
{
    $bdd = connexionPDO();
    $req = '
    SELECT * 
    FROM users 
    where user_email = :user_email';
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":user_email", $user_email, PDO::PARAM_STR);
    $stmt->execute();
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $admin;
}

function isConnexionValid($user_email, $password)
{
    $admin = getPasswordUser($user_email);
    return password_verify($password, $admin['user_password']);
}