<?php

/*
* connexion.php
* connexion à la BDD
*/
//on créé une nouvelle connexion dans un bloc TRY
try {
  $bdd = new PDO('mysql:host=db715954295.db.1and1.com; dbname=db715954295', 'dbo715954295', 'Imanijanaye2003#') or die(print_r($bdd->errorInfo()));
  $bdd->exec('SET NAMES utf8'); //on force la prise en charge de l'UTF8
} catch (Exception $e) {
  die('Erreur : ' . $e->getMessage());
}
