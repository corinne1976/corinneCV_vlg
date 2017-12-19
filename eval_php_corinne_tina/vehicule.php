<?php
require('connexion.php');

$resultat = $pdo -> query("SELECT * FROM vehicule");
$ligne_vehicule = $resultat -> fetch(PDO::FETCH_ASSOC);

if(isset($_POST['marque'])){
    if(!empty($_POST['marque']) && !empty($_POST['modele']) && !empty($_POST['couleur']) && !empty($_POST['immatriculation'])){
        $marque = addslashes($_POST['marque']);
        $modele = addslashes($_POST['modele']);
        $couleur = addslashes($_POST['couleur']);
        $immatriculation = addslashes($_POST['immatriculation']);
        $pdo -> exec("INSERT INTO conducteur (id_vehicule , marque, modele, couleur, immatriculation) VALUES (NULL, '$marque', '$modele', '$couleur', '$immatricumation')");
        header("location:véhicule.php");
        exit();
    }// ferme if n'est pas vide

} // ferme le if isset insertion


if(isset($_GET['id_vehicule'])){
    $efface = $_GET['id_vehicule'];
    $resultat = " DELETE FROM vehicule WHERE id_vehicule = '$efface' ";
    $pdo ->query($resultat);
    header("location: vehicule.php");
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
            <div class="row">
                <?php
                $resultat = $pdo -> prepare("SELECT * FROM vehicule");// requete de selection de la table t_compérences ou l'id est == a 1 donc corinne
                $resultat -> execute();// execution de la requete
                $nbr_vehicule =  $resultat -> rowCount();
                ?>
                <div class="col-md-12">
                    <table class="table">
                        <h1 class="panel-title center"> Il y a <?= $nbr_vehicule; ?> véhicules</h1><br>
            <thead>
              <tr>
                <th>id_Véhivule</th>
                <th>Marque</th>
                <th>Modele</th>
                <th>Couleur</th>
                <th>Immatriculation</th>
                <th>Modification</th>
                <th>Suppression</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                  <?php while($ligne_vehicule = $resultat -> fetch(PDO::FETCH_ASSOC) ) {?>
                <td><?php echo $ligne_vehicule['id_vehicule'] ;?></td>
                <td><?php echo $ligne_vehicule['marque'] ;?></td>
                <td><?php echo $ligne_vehicule['modele'] ;?></td>
                <td><?php echo $ligne_vehicule['couleur'] ;?></td>
                <td><?php echo $ligne_vehicule['immatriculation'] ;?></td>
                <td><a href="modif_vehicule.php?id_vehicule=<?= $ligne_vehicule['id_vehicule']; ?>"><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></td>
                <td><a href="vehicule.php?id_vehicule=<?= $ligne_vehicule['id_vehicule']; ?>"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> </button> </a></td>
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
                <form action="" method="post">
                    <div class="form-group">
                        <label for="marque"> Marque:</label><br>
                        <input type="text" name="marque" id="marque" placeholder="marque" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="modele">Modele :</label><br>
                        <input type="text" name="modele" id="modele" placeholder="modele" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="couleur"> Couleur :</label><br>
                        <input type="text" name="couleur" id="couleur" placeholder="couleur" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="immatriculation"> Immatriculation :</label><br>
                        <input type="text" name="immatriculation" id="immatriculation" placeholder="immatriculation" class="form-control">
                    </div>
                    <button type="submit" class="btn-block">ajouter ce véhicule</button>
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
