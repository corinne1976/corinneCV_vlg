<?php

$hote='localhost';
$bdd='sitecv';
$utilisateur='root';
$passe='';

$pdoCV = new PDO('mysql:host='.$hote.';dbname='.$bdd, $utilisateur, $passe);
$pdoCV -> exec("SET NAMES utf8");
