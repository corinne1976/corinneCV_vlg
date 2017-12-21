<?php
session_start();// à mettre dans toutes les pages de l'Admin
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
?>

<?php
$msg = '';

// gestion des contenus de la BDD compétences

//insertion d'une formation
if (isset($_POST['e_titre'])) { // Si on a posté une nouvelle form.
    if ($_POST['e_titre']!='' && $_POST['e_soustitre']!='' && $_POST['e_dates']!='' && $_POST['e_description']!='') {
      $e_titre = addslashes($_POST['e_titre']);
      $e_soustitre = addslashes($_POST['e_soustitre']);
      $e_dates = addslashes($_POST['e_dates']);
      $e_description = addslashes($_POST['e_description']);

      $pdoCV -> exec("INSERT INTO t_experiences VALUES (NULL, '$e_titre', '$e_soustitre', '$e_dates', '$e_description', '$id_utilisateur')"); // mettre $id_utilisateur quand on l'aura dans la variable de session
      header("location: experiences.php");
      exit();
    }
    else {
        $msg .= '<p style="background:#6A0000; color:white; width:72%">Veuillez renseigner les champs !</p>';
    }
} // ferme le if(isset) du form

// Suppression d'un loisir
if (isset($_GET['id_experience'])) { // on récupère la comp. par son id dans l'url
    $efface =  $_GET['id_experience'];

    $resultat = "DELETE FROM t_experiences WHERE id_experience = '$efface'";
    $pdoCV -> query($resultat); // on peut avec exec aussi si on veut
    header("location: experiences.php"); // pour revenir sur la page

} // ferme le if(isset)

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <?php
        $resultat = $pdoCV -> query("SELECT * FROM t_utilisateurs WHERE id_utilisateur = '$id_utilisateur'");
        $ligne_utilisateur = $resultat -> fetch();
        ?>
        <title>Admin : <?= ($ligne_utilisateur['pseudo']); ?></title>

        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link rel="stylesheet" href="css/style_admin.css">

        <link href="https://fonts.googleapis.com/css?family=Concert+One" rel="stylesheet">
    </head>
    <body>
        <?php
        $resultat = $pdoCV -> prepare("SELECT * FROM t_experiences WHERE utilisateur_id ='$id_utilisateur'");
        $resultat->execute();
        $nbr_experience = $resultat->rowCount();

        // $ligne_competence = $resultat -> fetch();
?>
<?php include('inc/nav.inc.php'); ?>
<div class="container">
    <div class="page-header">
        <h1>Admin : <?= ($ligne_utilisateur['prenom']); ?></h1>
    </div>
    <!-- Fil d'ariane -->
    <ol class="breadcrumb">
        <li><a href="index.php">Accueil</a></li>
        <li><a href="realisations.php">Réalisations</a></li>
        <li><a href="Formations.php">Formations</a></li>
        <li><a href="Competences.php">Competences</a></li>
        <li><a href="loisirs.php">Loisirs</a></li>
        <li class="active">Expériences</li>
    </ol>

    <div class="row">
        <div class="col-md-8">
            <h2 class="centrer">Les expériences :</h2>
            <h4 class="well">J'ai <?= $nbr_experience;?> experience<?= ($nbr_experience>1)?'s':''?></h4>
        </div>
        <div class="row">
            <div class="col-md-8">
                <table border="2" class="table table-condensed table-hover">
                    <tr>
                        <th>Titre</th>
                        <th>Soustitre</th>
                        <th>Dates</th>
                        <th>Description</th>
                        <th>Suppression</th>
                        <th>Modification</th>
                    </tr>
                    <tr>
                        <?php while ($ligne_experience = $resultat -> fetch()) { ?>
                            <td><?= $ligne_experience['e_titre'];?></td>
                            <td><?= $ligne_experience['e_soustitre'];?></td>
                            <td><?= $ligne_experience['e_dates'];?></td>
                            <td><?= $ligne_experience['e_description'];?></td>
                            <td><a href="experiences.php?id_experience=<?= $ligne_experience['id_experience'];?>"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></a></td>
                            <td><a href="modif_experience.php?id_experience=<?= $ligne_experience['id_experience'];?>"><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></a></td>
                    </tr>
                        <?php } ?>
                    </table>
            </div>
        <div class="col-md-4">
            <div class="panel panel-info">
                <div class="panel-body">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div>Insertion d'une réalisation :</div>
                        </div>
                    </div>
                        <form action="experiences.php" method="post">
                            <fieldset>
                                <?= $msg; ?>
                                <div class="form-group">
                                    <label for="disabledSelect">Titre</label>
                                    <input type="text" name="e_titre" id="e_titre" placeholder="Insérer un titre" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="disabledSelect">Soustitre</label>
                                    <input type="text" name="e_soustitre" id="e_soustitre" placeholder="Insérer un soustitre" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="disabledSelect">Dates</label>
                                    <input type="text" name="e_dates" id="e_dates" placeholder="Insérer une date" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="disabledSelect">Description</label>
                                    <textarea name="e_description" id="e_description" class="form-control" placeholder="Insérer une description"></textarea>
                                </div>

                                <input type="submit" class="btn btn-primary" value="Insérez">

                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<?php include('inc/footer.inc.php'); ?>
