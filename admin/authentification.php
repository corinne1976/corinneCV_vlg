<?php
require('connexion.php');?>
<?php
session_start();

$msg_authentification='';


 // pour se deconnecter de l'Admin
  if (isset($_GET['quitter'])) {// on recupere avec le get depuil l'url.
      $_SESSION['connexion']='';// on vide les variuable de session , les information sont vidées
      $_SESSION['id_utilisateur']='';// on vide les variuable de session , les information sont vidées
      $_SESSION['prenom']='';// on vide les variuable de session , les information sont vidées
      $_SESSION['nom']='';// on vide les variuable de session , les information sont vidées

    unset($_SESSION['connexion']);// unset detruit les variables spécifiées
      session_destroy();
      header('location: authentification.php');


  } //ferme le if isset

 if (isset($_POST['connexion'])) {// on envoie le form avec le name du button on a cliquer dessus
     $email = addslashes($_POST['email']);// verification ajout d'un slashes
     $mdp = addslashes($_POST['mdp']);
     $sql = $bdd->prepare(" SELECT * FROM t_utilisateurs WHERE email='$email' AND mdp='$mdp'");// on verufue courriel et mdp
     $sql->execute();
     $nbr_utilisateurs = $sql->rowCount();// on compte si il est dans la table, le compte répond 1 si il est et 0 si il n'y est pas

     if ($nbr_utilisateurs==0) {// il n'y est pas.

         $msg_authentification="Erreur d'authentification";

     }else {// on le trouve , il est inscrit
         $ligne_utilisateur = $sql->fetch();// va chercher le chercher.

         $_SESSION['connexion']='connecté';
         $_SESSION['id_utilisateur']=$ligne_utilisateur['id_utilisateur'];// dans la session je lui passe des information qui seronts retransmises dans chaques pages
         $_SESSION['prenom']=$ligne_utilisateur['prenom'];// dans la session je lui passe des information qui seronts retransmises dans chaques pages
         $_SESSION['nom']=$ligne_utilisateur['nom'];// dans la session je lui passe des information qui seronts retransmises dans chaques pages

         header('location: index.php');
         // exit();

     }
 }// ferme le if isset

// print_r($_POST);
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Authentification : admin</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>


<body>
    <div class="container">
        <div class="container-fuid">
            <div class="panel panel-info">
                <div class="panel-body">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="jumbotron">

                                <h1>Authentification</h1>
                                <!-- debut du formulaire d'authentification à l'admin -->
                                <form action="authentification.php" method="post">
                                    <label for="email">Courriel</label>
                                    <input type="email" name="email" placeholder="Votre courriel" required>
                                    <br>
                                    <label for="mdp">Mot de Passe</label>
                                    <input type="password" name="mdp"  placeholder="Votre mot de passe"  required>
                                    <br>
                                    <button name="connexion" type="submit">Connexion à votre admin.</button>
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
