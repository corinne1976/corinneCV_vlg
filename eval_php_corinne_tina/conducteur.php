<?php
require('connexion.php');

$resultat = $pdo -> query("SELECT * FROM conducteur");
$ligne_conducteur = $resultat -> fetch(PDO::FETCH_ASSOC);

if(isset($_POST['prenom'])){
    if(!empty($_POST['prenom']) && !empty($_POST['nom'])){
        $prenom = addslashes($_POST['prenom']);
        $nom = addslashes($_POST['nom']);
        $pdo -> exec("INSERT INTO conducteur (id_conducteur , prenom, nom) VALUES (NULL, '$prenom', '$nom')");
        header("location:conducteur.php");
        exit();

    }// ferme if n'est pas vide

} // ferme le if isset insertion


if(isset($_GET['id_conducteur'])){
    $efface = $_GET['id_conducteur'];
    $resultat = " DELETE FROM conducteur WHERE id_conducteur = '$efface' ";
    $pdo ->query($resultat);
    header("location: conducteur.php");
} // ferme le if isset supression



 ?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title ></title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">



</head>
<!-- contenu du site -->

<body>

    <nav class="navbar navbar-inverse ">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="conducteur.php">Conducteur</a></li>
                    <li><a href="vehicule.php">Vehicule</a></li>
                    <li><a href="association.php">Association</a></li>
                </ul>

            </div><!-- /.container-fluid -->

        </nav>
        <div class="container">
            <?php
            $resultat = $pdo -> prepare("SELECT * FROM conducteur");// requete de selection de la table t_compérences ou l'id est == a 1 donc corinne
            $resultat -> execute();// execution de la requete
            $nbr_conducteur =  $resultat -> rowCount();
            ?>
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
            <thead>
                <h1 class="panel-title center"> Il y a <?= $nbr_conducteur; ?> conducteurs</h1><br><!--$_nombres de compétences resutats de notre requete -->
              <tr>
                <th>id_conducteur</th>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Modification</th>
                <th>Suppression</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                  <?php while($ligne_conducteur = $resultat -> fetch(PDO::FETCH_ASSOC) ) {?>
                <td><?php echo $ligne_conducteur['id_conducteur'] ;?></td>
                <td><?php echo $ligne_conducteur['prenom'] ;?></td>
                <td><?php echo $ligne_conducteur['nom'] ;?></td>
                <td><a href="modif_conducteur.php?id_conducteur=<?= $ligne_conducteur['id_conducteur']; ?>"><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></a></td>
                <td><a href="conducteur.php?id_conducteur=<?= $ligne_conducteur['id_conducteur']; ?>"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></a></td>
              </tr>
                  <?php } ?>
            </tbody>
          </table>
        <hr>
    </div>

</div>


<div class="col-md-12">

    <div class="panel-info">
        <!--formulaire d'insertion-->
        <div class="panel-body">
            <div class="form-group">
                <form action="conducteur .php" method="post">
                    <div class="form-group">
                        <label for="prenom"> Prenom:</label><br>
                        <input type="text" name="prenom" id="prenom" placeholder="prenom" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nom"> Nom :</label><br>
                        <input type="text" name="nom" id="nom" placeholder="nom" class="form-control">
                    </div>
                    <button type="submit" class="btn-block">ajouter ce conducteur</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>

</html>
</body>
