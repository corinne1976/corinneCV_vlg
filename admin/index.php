<?php require'connexion.php'; ?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <?php 
    
    $sql = $pdoCV->query("SELECT * FROM t_utilisateurs");
    $ligne_utilisateur = $sql->fetch();
      
     ?>
    <title>Admin : <?php echo($ligne_utilisateur['pseudo']); ?>rénom nom</title>
  </head>
  <body>
    <h1><?php echo ($ligne_utilisateur['prenom']); ?>Admin</h1>
  </body>
</html>