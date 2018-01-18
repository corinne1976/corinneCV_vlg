<?php

require('connexion.php');

session_start(); // demarrage de la session

if (isset($_SESSION['connexion']) && $_SESSION['connexion'] == 'connecté') {// on établie que la variable de $_session est passée contient bien le terme "connexion"

    $id_utilisateur = $_SESSION['id_utilisateur'];
    $prenom = $_SESSION['prenom'];
    $nom = $_SESSION['nom'];

     // echo $_SESSION['connexion'];
     // var_dump($_SESSION);

}else {
    header('location: authentification.php');
}


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <?php
    $resultat = $bdd -> query("SELECT * FROM t_utilisateurs WHERE id_utilisateur = '$id_utilisateur'");
    $ligne_utilisateur = $resultat -> fetch();
    ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title >Admin : <?= ($ligne_utilisateur['pseudo']); ?></title>
    <link href="https://fonts.googleapis.com/css?family=Barlow+Condensed" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <?php include('inc/nav.inc.php'); ?>
    <div class="container">

    <h1>Admin : <?= ($ligne_utilisateur['prenom']); ?></h1><br>
    <div class="col-xs-12 col-sm-6 col-md-offset-3 col-sm-offset-3">

    </div>
    <img src="img/paysage4.jpg" class="img-circle col-xs-10 col-sm-6 col-md-offset-3 col-sm-offset-1" alt="Cinque Terre" width="100%" height="500">
</div>

</body>
</html>
<?php include('inc/footer.inc.php'); ?>
