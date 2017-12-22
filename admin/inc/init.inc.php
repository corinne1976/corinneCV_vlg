<?php
$hote='localhost';// chemin vers le serveur
$bdd='sitecv';// le nom de la base de données
$utilisateur='root';// le nom de l'utilisateur pour se donnecter
$passe='';// le mot de passe de l'utilisateur local pc

try{

    $pdoCV = new pdo ('mysql:host='.$hote.';dbname='.$bdd, $utilisateur, $passe) or die(print_r($bdd->errorInfo()));// $pdo est le nom de la variable de la connexion qui sert partout ou l'on doit se servir de cette connexion
    $pdoCV ->exec("SET NAMES utf8");
} catch (Exception $e) {
  die('Erreur : ' . $e->getMessage());
}
 ?>
