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

// mise à jour d'une compétence
if (isset($_POST['e_titre'])) { // par le nom du premier input
    $id_experience = $_POST['id_experience'];
    $titre = addslashes($_POST['e_titre']);
    $soustitre = addslashes($_POST['e_soustitre']);
    $dates = addslashes($_POST['e_dates']);
    $description = addslashes($_POST['e_description']);

    $bdd -> exec("UPDATE t_experiences SET e_titre = '$titre', e_soustitre ='$soustitre', e_dates ='$dates', e_description ='$description' WHERE id_experience = '$id_experience'"); // SQL OK
    header('location: experiences.php');
    exit();
}

// je récupère la formation :
$id_experience = $_GET['id_experience']; // par l'id et $_GET
$resultat = $bdd -> query("SELECT * FROM t_experiences WHERE id_experience ='$id_experience'"); // la requête est égale à m'id
$ligne_experience = $resultat->fetch();

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <?php
        $resultat = $bdd -> query("SELECT * FROM t_utilisateurs WHERE id_utilisateur = '$id_utilisateur'");
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
        <h2 class="well">Modification d'une experience</h2>
        <div class="col-md-4">
            <div class="panel panel-warning">
                <div class="panel-body">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                          <div><?= $ligne_experience['e_titre']; ?></div>
                        </div>
                    </div>
                      <form action="modif_experience.php" method="post">

                          <div class="form-group">
                            <label for="e_titre">Titre :</label><br>
                            <input type="text" name="e_titre" value="<?= $ligne_experience['e_titre']; ?>"><br><br>
                          </div>

                          <div class="form-group">
                            <label for="e_soustitre">Soustitre :</label><br>
                            <input type="text" name="e_soustitre" value="<?= $ligne_experience['e_soustitre']; ?>"><br><br>
                          </div>

                          <div class="form-group">
                            <label for="e_dates">Dates :</label><br>
                            <input type="text" name="e_dates" value="<?= $ligne_experience['e_dates']; ?>"><br><br>
                          </div>

                          <div class="form-group">
                            <label for="e_description">Description :</label><br>
                            <input type="text" name="e_description" value="<?= $ligne_experience['e_description']; ?>"><br><br>
                          </div>

                          <input hidden name="id_experience" value="<?= $ligne_experience['id_experience']; ?>">

                          <input type="submit" class="btn btn-warning" value="Mettre à jour">
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
