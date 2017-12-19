<?php
require('connexion.php');

$id_conducteur = $_GET['id_conducteur']; // par l'id et get
$resultat = $pdo-> query("SELECT * FROM conducteur");
$ligne_conducteur = $resultat -> fetch();

$resultat = $pdo-> query("SELECT * FROM conducteur");
$ligne_conducteur = $resultat -> fetch();


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
            <label for="prenom">Prénom :</label><br>
            <input type="text" name="prenom" id ="prenom" value="<?= $ligne_conducteur['prenom'] ?>"><br><br>

            <label for="nom">Nom :</label><br>
            <input type="text" name="nom" id= "nom" value="<?= $ligne_conducteur['nom'] ?>"><br><br>

            <input type="submit" name="" value="Modifier">
        </form>
    </body>
</html>
