<?php
    session_start(); // demarrage de la session

    require('connexion.php');

    if (isset($_SESSION['connexion']) && $_SESSION['connexion'] == 'connecté') {// on établie que la variable de $_session est passée contient bien le terme "connexion"

        $id_utilisateur = $_SESSION['id_utilisateur'];
        $prenom = $_SESSION['prenom'];
        $nom = $_SESSION['nom'];

        // echo $_SESSION['connexion'];
        // var-dump( $_SESSION);

    }else {
        header('location:authentification.php');
    }


    // Gestion des contenus de la BDD compétence

    // Insertion d'une compétence
    if(isset($_POST['competence'])){ // Si on a posté une nouvelle compétence
        if(!empty($_POST['competence'])&& !empty($_POST['c_niveau'])){ // Si compétence n'est pas vide
            $competence = addslashes($_POST['competence']);
            $c_niveau = addslashes($_POST['c_niveau']);
            $bdd -> exec("INSERT INTO t_competences (id_competence, competence, c_niveau, utilisateur_id) VALUES (NULL, '$competence', '$c_niveau', '$id_utilisateur')"); // mettre $id_utilisateur quand on l'aura dans la variable de session
            header("location: competences.php");
            exit();

        }// ferme if n'est pas vide

    } // ferme le if isset insertion

    // Supression d'une compétence
    if(isset($_GET['id_competence'])){ // on récupère la compétence par son ID dans l'url
        $efface = $_GET['id_competence'];
         $resultat = " DELETE FROM t_competences WHERE id_competence = '$efface' ";
         $bdd ->query($resultat);
        header("location: competences.php");
    } // ferme le if isset supression

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <head>
        <?php
        $resultat = $bdd -> query("SELECT * FROM t_utilisateurs WHERE id_utilisateur = '1'");
        $ligne_utilisateur = $resultat -> fetch();
        ?>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Admin : <?= ($ligne_utilisateur['pseudo']); ?></title>
        <!-- ck ckeditor -->

        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link rel="stylesheet" href="css/style_admin.css">

        <link href="https://fonts.googleapis.com/css?family=Concert+One" rel="stylesheet">
        <script src="https://cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>

    </head>
</head>
<body>

    <?php  include('inc/header.inc.php');
    include('inc/nav.inc.php');?>

    <div class="container"><!-- debut du container bootrap-->

        <?php
        $resultat = $bdd -> query("SELECT * FROM t_utilisateurs WHERE id_utilisateur = '1'");
        $ligne_utilisateur = $resultat -> fetch();
            // $ligne_competence = $resultat -> fetch();
        ?>
        <div class="page-header well"><!-- encadrement du tableau-->
        <h1>Admin <?= $ligne_utilisateur['prenom']?></h1><!-- insertion de mon preénom en php-->
        </div>
        <?php
        $resultat = $bdd -> prepare("SELECT * FROM t_competences WHERE utilisateur_id ='1'");
        $resultat->execute();
        $nbr_competences = $resultat->rowCount();


?>
        <!-- Fil d'ariane -->
        <ol class="breadcrumb">
            <li><a href="index.php">Accueil</a></li>
            <li><a href="experiences.php">Expériences</a></li>
            <li><a href="realisations.php">Réalisations</a></li>
            <li><a href="Formations.php">Formations</a></li>
            <li><a href="loisirs.php">Loisirs</a></li>
            <li class="active">Compétences</li>
        </ol>
        <h2 class="centrer">Les compétences :</h2>
        <div class="row"><!-- déclaration de la  grande colonne-->
            <div class="col-md-8"><!-- division de la collone avec un un col md 8 qui correspond a 60% de notre container-->
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?= $nbr_competences; ?> compétences</h3><!--$_nombres de compétences resutats de notre requete -->
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
                                                    <input type="text" name="competence" id="competence" placeholder="Insérez votre compétence" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="niveau"> Niveau :</label><br>
                                                    <input type="text" name="c_niveau" id="niveau" placeholder="Insérez votre niveau" class="form-control" required>
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

<body>
</html>

        <?php include('inc/footer.inc.php'); ?>
