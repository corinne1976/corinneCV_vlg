<?php
require('connexion.php');


$id_vehicule = $_GET['id_vehicule']; // par l'id et get
$resultat = $pdo-> query("SELECT * FROM vehicule");
$ligne_vehicule = $resultat -> fetch();

$resultat = $pdo-> query("SELECT * FROM vehicule");
$ligne_vehicule = $resultat -> fetch();


?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
    </head>
    <body>


        <form action="#" method="post">
            <label for="prenom">Marque :</label><br>
            <input type="text" name="marque" id ="marque" value="<?= $ligne_vehicule['marque'] ?>"><br><br>

            <label for="nom">Modele :</label><br>
            <input type="text" name="modele" id= "modele" value="<?= $ligne_vehicule['modele'] ?>"><br><br>

            <label for="nom">couleur :</label><br>
            <input type="text" name="couleur" id= "nom" value="<?= $ligne_vehicule['couleur'] ?>"><br><br>

            <label for="nom">immatriculation :</label><br>
            <input type="text" name="immatriculation" id= "immatriculation" value="<?= $ligne_vehicule['immatriculation'] ?>"><br><br>
            <input type="submit" name="" value="Modifier">
        </form>
    </body>
</html>
