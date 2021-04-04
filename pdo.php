<?php

const HOST_NAME = "localhost";
const DATABASE_NAME = "mon_site";
const USER_NAME = "root";
const PASSWORD = "root";

function connexionPDO(){
    try{
        $bdd = new PDO("mysql:host=".HOST_NAME.";dbname=".DATABASE_NAME .";charset=utf8", USER_NAME, PASSWORD);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        return $bdd;

    } catch (PDOException $e){
        $message = "Erreur PDO avec les message : " . $e->getMessage();
        die($message);
    }
}
