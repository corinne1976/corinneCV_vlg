<?php
require('connexion.php');

session_start(); // demarrage de la session

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
if (isset($_POST['f_titre'])){ // Si on a posté une nouvelle form.
    if (!empty($_POST['f_titre'])&& !empty($_POST['f_soustitre'])&& !empty($_POST['f_dates'])&& !empty($_POST['f_description'])) {
      $f_titre = addslashes($_POST['f_titre']);
      $f_soustitre = addslashes($_POST['f_soustitre']);
      $f_dates = addslashes($_POST['f_dates']);
      $f_description = addslashes($_POST['f_description']);

      $bdd -> exec("INSERT INTO t_formations VALUES (NULL, '$f_titre', '$f_soustitre', '$f_dates', '$f_description', '$id_utilisateur')"); // mettre $id_utilisateur quand on l'aura dans la variable de session
      header("location: formations.php");
      exit();
    }
    else {
        $msg .= '<p style="background:#6A0000; color:white; width:48%">Veuillez renseigner le champs !</p>';
    }
} // ferme le if(isset) du form

// Suppression d'un loisir
if (isset($_GET['id_formation'])) { // on récupère la comp. par son id dans l'url
    $efface =  $_GET['id_formation'];

    $resultat = "DELETE FROM t_formations WHERE id_formation = '$efface'";
    $bdd -> query($resultat); // on peut avec exec aussi si on veut
    header("location: formations.php"); // pour revenir sur la page

} // ferme le if(isset)

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <?php
        $resultat = $bdd -> query("SELECT * FROM t_utilisateurs WHERE id_utilisateur = '$id_utilisateur'");
        $ligne_utilisateur = $resultat -> fetch();
        ?>
        <title>Admin : <?= ($ligne_utilisateur['pseudo']); ?></title>

        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link rel="stylesheet" href="css/style.css">

        <link href="https://fonts.googleapis.com/css?family=Concert+One" rel="stylesheet">
    </head>
    <body>
        <?php
        $resultat = $bdd -> prepare("SELECT * FROM t_formations WHERE utilisateur_id ='$id_utilisateur'");
        $resultat->execute();
        $nbr_formations = $resultat->rowCount();

        // $ligne_competence = $resultat -> fetch();
?>
<?php include('inc/nav.inc.php'); ?>
<div class="container">
    <div class="page-header">
        <h1>Admin : <?= ($ligne_utilisateur['prenom']); ?></h1>
    </div>
    <ol class="breadcrumb">
        <li><a href="index.php">Accueil</a></li>
        <li><a href="realisations.php">Réalisations</a></li>
        <li><a href="experiences.php">Experiences</a></li>
        <li><a href="competences.php">Competences</a></li>
        <li><a href="loisirs.php">Loisirs</a></li>
        <li class="active">Formations</li>
</ol>
    <div class="row">
        <div class="col-md-8">
            <h2 class="centrer">Les formations :</h2>
            <h4 class="well">J'ai <?= $nbr_formations;?> formation<?= ($nbr_formations>1)?'s':''?></h4>
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
                        <?php while ($ligne_formation = $resultat -> fetch()) { ?>
                            <td><?= $ligne_formation['f_titre'];?></td>
                            <td><?= $ligne_formation['f_soustitre'];?></td>
                            <td><?= $ligne_formation['f_dates'];?></td>
                            <td><?= $ligne_formation['f_description'];?></td>
                            <td><a href="formations.php?id_formation=<?= $ligne_formation['id_formation'];?>"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></a></td>
                            <td><a href="modif_formations.php?id_formation=<?= $ligne_formation['id_formation'];?>"><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></a></td>
                    </tr>
                        <?php } ?>
                    </table>
            </div>
        <div class="col-md-4">
            <div class="panel panel-info">
                <div class="panel-body">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div>Insertion d'une formation :</div>
                        </div>
                    </div>
                        <form action="formations.php" method="post">
                            <fieldset>
                                <?= $msg; ?>
                                <div class="form-group">
                                    <label for="disabledSelect">Titre</label>
                                    <input type="text" name="f_titre" id="f_titre" placeholder="Insérer un titre" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="disabledSelect">Soustitre</label>
                                    <input type="text" name="f_soustitre" id="f_soustitre" placeholder="Insérer un soustitre" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="disabledSelect">Dates</label>
                                    <input type="text" name="f_dates" id="f_dates" placeholder="Insérer une date" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="disabledSelect">Description</label>
                                    <textarea name="f_description" id="f_description" class="form-control" placeholder="Insérer une description"></textarea>
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
