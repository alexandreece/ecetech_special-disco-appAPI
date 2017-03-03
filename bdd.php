<?php
/**
 * Created by PhpStorm.
 * User: adri-laptop
 * Date: 22/02/17
 * Time: 11:32
 */
//Fonction de connection a la bdd
function connectBDD()
{
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=lamapp;charset=utf8', 'root', '');
    } catch (Exeption $e) {
        die('Erreur : ' . $e->getMessage());
    }
    return $bdd;
}

//Fonction de creation d'un uuid unique pour les utilisateurs
function uuid()
{
    //Génération d'un nombre aléatoire
    do {
        $cstrong = true;
        $bytes = openssl_random_pseudo_bytes(4, $cstrong);
        $uuid = bin2hex($bytes) . "-";

        $bytes = openssl_random_pseudo_bytes(2, $cstrong);
        $uuid = $uuid . bin2hex($bytes) . "-";

        $bytes = openssl_random_pseudo_bytes(2, $cstrong);
        $uuid = $uuid . bin2hex($bytes) . "-";

        $bytes = openssl_random_pseudo_bytes(2, $cstrong);
        $uuid = $uuid . bin2hex($bytes) . "-";

        $cstrong = true;
        $bytes = openssl_random_pseudo_bytes(6, $cstrong);
        $uuid = $uuid . bin2hex($bytes);
    } while (checkUUID($uuid));

    return $uuid;
}

//Fonction de vérification de l'uuid dans la bdd
function checkUUID($uuid)
{
    $bdd = connectBDD();
    $query = $bdd->prepare('SELECT * FROM Score WHERE idTeam = :id');
    $query->execute(array(':id' => $uuid));
    if ($query->rowCount() > 0) {
        return true;
    } else {
        return false;
    }
}

//Fonction de creation d'une nouvelle equipe
function newInsc($NomTeam, $Score, $NbPlayer, $Niveau )
{
    //connection a la bdd
    $bdd = connectBDD();
    //creation de l'uid
    $IdTeam = uuid();

    //preparation de la requete
    $query = $bdd->prepare('INSERT INTO `Score`(`IdTeam`, `NomTeam`, `Score`, `Date`, `NbPlayer`, `Niveau`) VALUES (:NomTeam, :Score, :NbPlayer, :Niveau)');
    $query->execute(array(
        'idTeam' => $IdTeam,
        'NomTeam' => $NomTeam,
        'Score' => $Score,
        'NbPlayer' => $NbPlayer,
        'Niveau' => $Niveau
    ));
}

//Fonction de recuperation de tous les utilisateurs de la base de données
function getAll()
{
    $bdd = connectBDD();
    $data = $bdd->query('SELECT * FROM Score');
    return $data;
}

//fonction de récupération des 10 meilleurs équipes
function getBestTeam()
{
    $bdd = connectBDD();
    $data = $bdd->query('SELECT `NomTeam`, `Score`, `Date`, `NbPlayer`, `Niveau` FROM `Score` ORDER BY Score DESC LIMIT 10');
    return $data;
}
//fonction de récupération des 10 pires équipes
function getWorstTeam()
{
    $bdd = connectBDD();
    $data = $bdd->query('SELECT `NomTeam`, `Score`, `Date`, `NbPlayer`, `Niveau` FROM `Score` ORDER BY Score ASC LIMIT 10');
    return $data;
}

//fonction de récupération des 10 meilleurs équipes débutantes
function getBestBeginnerTeam()
{
    $bdd = connectBDD();
    $data = $bdd->query('SELECT `NomTeam`, `Score`, `Date`, `NbPlayer`, `Niveau` FROM `Score` WHERE Niveau =1  ORDER BY Score DESC LIMIT 10');
    return $data;
}

//fonction de récupération des 10 pires équipes débutantes
function gegWorstBeginnerTeam()
{
    $bdd = connectBDD();
    $data = $bdd->query('SELECT `NomTeam`, `Score`, `Date`, `NbPlayer`, `Niveau` FROM `Score` WHERE Niveau =1  ORDER BY Score ASC LIMIT 10');
    return $data;
}

//fonction de récupération des 10 meilleurs équipes intermédiaires
function getBestMiddleTeam()
{
    $bdd = connectBDD();
    $data = $bdd->query('SELECT `NomTeam`, `Score`, `Date`, `NbPlayer`, `Niveau` FROM `Score` WHERE Niveau =2  ORDER BY Score DESC LIMIT 10');
    return $data;
}

//fonction de récupération des 10 pires équipes intermédiaires
function getWorstMiddleTeam()
{
    $bdd = connectBDD();
    $data = $bdd->query('SELECT `NomTeam`, `Score`, `Date`, `NbPlayer`, `Niveau` FROM `Score` WHERE Niveau =2  ORDER BY Score ASC LIMIT 10');
    return $data;
}

//fonction de récupération des 10 meilleurs équipes difficiles
function getBestHardTeam()
{
    $bdd = connectBDD();
    $data = $bdd->query('SELECT `NomTeam`, `Score`, `Date`, `NbPlayer`, `Niveau` FROM `Score` WHERE Niveau =3 ORDER BY Score DESC LIMIT 10');
    return $data;
}

//fonction de récupération des 10 pires équipes difficiles
function getWorstHardTeam()
{
    $bdd = connectBDD();
    $data = $bdd->query('SELECT `NomTeam`, `Score`, `Date`, `NbPlayer`, `Niveau` FROM `Score` WHERE Niveau =3  ORDER BY Score ASC LIMIT 10');
    return $data;
}

