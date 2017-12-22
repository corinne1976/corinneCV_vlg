<?php

/*
* connexion.php
* connexion à la BDD
*/
//on créé une nouvelle connexion dans un bloc TRY

$hote='localhost';// chemin vers le serveur
$bdd='sitecv';// le nom de la base de données
$utilisateur='root';// le nom de l'utilisateur pour se donnecter
$passe='';// le mot de passe de l'utilisateur local pc

try {
  $bdd = new pdo ('mysql:host='.$hote.';dbname='.$bdd, $utilisateur, $passe) or die(print_r($bdd->errorInfo()));
  $bdd->exec('SET NAMES utf8'); //on force la prise en charge de l'UTF8
} catch (Exception $e) {
  die('Erreur : ' . $e->getMessage());
}
