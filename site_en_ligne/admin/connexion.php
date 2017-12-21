<?php

$hote='db715954295.db.1and1.com';
$bdd='db715954295';
$utilisateur='dbo715954295';
$passe='Imanijanaye2003#';

$pdoCV = new PDO('mysql:host='.$hote.';dbname='.$bdd, $utilisateur, $passe);
$pdoCV -> exec("SET NAMES utf8");
