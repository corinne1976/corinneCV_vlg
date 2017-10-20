<?php
require('connexion.php');
$resultat = $pdoCV -> query("SELECT * FROM t_utilisateurs WHERE id_utilisateur = '1'");
$ligne_utilisateur = $resultat -> fetch(PDO::FETCH_ASSOC);

// Gestion des contenus de la BDD compétence

// Insertion d'une compétence
if(isset($_POST['competence'])){ // Si on a posté une nouvelle compétence
    if(!empty($_POST['competence']) && !empty($_POST['c_niveau'])){ // Si compétence n'est pas vide
        $competence = addslashes($_POST['competence']);
        $c_niveau = addslashes($_POST['c_niveau']);
        $pdoCV -> exec("INSERT INTO t_competences (id_competence, competence, c_niveau, utilisateur_id) VALUES (NULL, '$competence', '$c_niveau', '1')"); // mettre $id_utilisateur quand on l'aura dans la variable de session
        header("location: competences.php");
        exit();

    }// ferme if n'est pas vide

} // ferme le if isset insertion

// Supression d'une compétence
if(isset($_GET['id_competence'])){ // on récupère la compétence par son ID dans l'url
    $efface = $_GET['id_competence'];
    $resultat = " DELETE FROM t_competences WHERE id_competence = '$efface' ";
    $pdoCV ->query($resultat);
    header("location: competences.php");
} // ferme le if isset supression

include('inc/header.inc.php');
include('inc/nav.inc.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Admin : <?= $ligne_utilisateur['pseudo']?> </title>
    </head>
</head>
<body>
    <div class="container">
        <div class="page-header well">
            <h1>Admin <?= $ligne_utilisateur['prenom']?></h1>
            <p>Texte</p>
        </div>

        <?php
        $resultat = $pdoCV -> prepare("SELECT * FROM t_competences WHERE utilisateur_id = '1'");
        $resultat -> execute();
        $nbr_competences =  $resultat -> rowCount();
        ?>
        <h2> Les compétences</h2>
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?= $nbr_competences; ?> compétences</h3>
                    </div>

                    <div class="panel-body">

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Compétences</th>
                                    <th scope="col">Niveau en %</th>
                                    <th scope="col">Modification</th>
                                    <th scope="col">Suppression</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php while($ligne_competence = $resultat -> fetch(PDO::FETCH_ASSOC) ) {?>
                                        <td><?php echo $ligne_competence['competence'] ;?></td>
                                        <td><?php echo $ligne_competence['c_niveau']; ?></td>
                                        <td><a href="modif_competence.php?id_competence=<?= $ligne_competence['id_competence']; ?>"><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> </button> </a></td>
                                        <td><a href="competences.php?id_competence=<?= $ligne_competence['id_competence']; ?>"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> </button> </a></td>
                                    </tr>
                                <?php } ?>
                            </table>
                            <hr>

                        </div>

                    </div>

                </div>



                        <div class="col-md-4">
                            <div class="well">

                                <div class="panel-info">
                                    <div class="panel-heading">
                                        <p>Insersion d'une compétence</p>
                                    </div>

                                    <!--formulaire d'insertion-->
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <form action="competences.php" method="post">
                                                <div class="form-group">
                                                    <label for="competence"> Compétence :</label><br>
                                                    <input type="text" name="competence" id="competence" placeholder="Insérez votre compétence" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="niveau"> Niveau :</label><br>
                                                    <input type="text" name="c_niveau" id="niveau" placeholder="Insérez votre niveau" class="form-control">
                                                </div>
                                                <button type="submit" class="btn btn-info btn-block">Inscrire</button>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

</body>
</html>

        <?php include('inc/footer.inc.php'); ?>
