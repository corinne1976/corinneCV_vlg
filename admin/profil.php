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
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <?php
        $resultat = $pdoCV -> query("SELECT * FROM t_utilisateurs WHERE id_utilisateur = '$id_utilisateur'");
        $ligne_utilisateur = $resultat -> fetch();
        ?>
        <title>Profil</title>
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link rel="stylesheet" href="css/style.css">

        <link href="https://fonts.googleapis.com/css?family=Concert+One" rel="stylesheet">
    </head>
</html>
<body>
<?php include('inc/nav.inc.php'); ?>
<div class="container">
             <div class="row">
                 <div class="panel panel-default">
                 <div class="panel-heading"><h3 ><?php echo $ligne_utilisateur['pseudo'] ;?></h3></div>
                  <div class="panel-body">
                 <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
                  <img alt="image de profil" src="img/avatar.jpg" class="img-circle img-responsive">


                 </div>
                 <div class="col-md-8 col-xs-12 col-sm-6 col-lg-8" >
                     <div class="container" >
                       <h4><?php echo $ligne_utilisateur['prenom'] ;?> <?php echo $ligne_utilisateur['nom'] ;?></h4>



                     </div>
                      <hr>
                     <ul class="list-unstyled">
                       <li><span class="glyphicon glyphicon-user" style="width:25px;"></span><?php echo $ligne_utilisateur['adresse'] ;?> <?php echo $ligne_utilisateur['code-postal'] ;?> <?php echo $ligne_utilisateur['ville'] ;?></li>
                       <li><span class="glyphicon glyphicon-envelope" style="width:25px;"></span><?php echo $ligne_utilisateur['email'] ;?></li>
                       <li><span class="glyphicon glyphicon-phone-alt" style="width:25px;"></span><?php echo $ligne_utilisateur['telephone'] ;?></li>
                     </ul>
                     <hr>
                     <!-- <div class="col-sm-5 col-xs-6 tital " >Date Of Joining: 15 Jun 2016</div> -->
                 </div>
           </div>
       </div>
       </div>
       </body>
