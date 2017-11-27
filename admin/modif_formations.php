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
// mise à jour d'une compétence
if (isset($_POST['f_titre'])) { // par le nom du premier input
    $id_formation = $_POST['id_formation'];
    $titre = addslashes($_POST['f_titre']);
    $soustitre = addslashes($_POST['f_soustitre']);
    $dates = addslashes($_POST['f_dates']);
    $description = addslashes($_POST['f_description']);
    $pdoCV -> exec("UPDATE t_formations SET f_titre = '$titre', f_soustitre ='$soustitre', f_dates ='$dates', f_description ='$description' WHERE id_formation = '$id_formation'"); // SQL OK
    header('location: formations.php');
    exit();
}
// je récupère la formation :
$id_formation = $_GET['id_formation']; // par l'id et $_GET
$resultat = $pdoCV -> query("SELECT * FROM t_formations WHERE id_formation ='$id_formation'"); // la requête est égale à m'id
$ligne_formation = $resultat->fetch();
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <?php
        $resultat = $pdoCV -> query("SELECT * FROM t_utilisateurs WHERE id_utilisateur = '$id_utilisateur'");
        $ligne_utilisateur = $resultat -> fetch();
        ?>
        <title>Admin : <?= $ligne_utilisateur['pseudo']; ?></title>
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css?family=Concert+One" rel="stylesheet">

        <link rel="stylesheet" href="css/style_admin.css">
    </head>
    <body>
        <h1>Admin : <?= $ligne_utilisateur['prenom']; ?></h1>
        <hr>
        <h2 class="well">Modification d'une formation</h2>
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-warning">
                <div class="panel-body">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                          <div><?= $ligne_formation['f_titre']; ?></div>
                        </div>
                    </div>
                      <form action="modif_formation.php" method="post">

                          <div class="form-group">
                            <label for="f_titre">Titre :</label><br>
                            <input type="text" name="f_titre" value="<?= $ligne_formation['f_titre']; ?>"><br><br>
                          </div>

                          <div class="form-group">
                            <label for="f_soustitre">Soustitre :</label><br>
                            <input type="text" name="f_soustitre" value="<?= $ligne_formation['f_soustitre']; ?>"><br><br>
                          </div>

                          <div class="form-group">
                            <label for="f_dates">Dates :</label><br>
                            <input type="text" name="f_dates" value="<?= $ligne_formation['f_dates']; ?>"><br><br>
                          </div>

                          <div class="form-group">
                            <label for="f_description">Description :</label><br>
                            <input type="text" name="f_description" value="<?= $ligne_formation['f_description']; ?>"><br><br>
                          </div>

                          <input hidden name="id_formation" value="<?= $ligne_formation['id_formation']; ?>">

                          <input type="submit" class="btn btn-warning" value="Mettre à jour">
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
  <?php include('inc/footer.inc.php'); ?>
