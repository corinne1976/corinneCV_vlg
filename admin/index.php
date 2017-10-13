<?php require'connexion.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <?php 
  
  $sql = $pdoCV->query("SELECT * FROM t_utilisateurs WHERE id_utilisateur = '1'");
  $ligne_utilisateur = $sql->fetch();
  
  ?>
  <title>Admin  : <?php echo($ligne_utilisateur['pseudo']); ?>prénom nom</title>
</head>
<body>
  <h1>Admin du site cv de <?php echo($ligne_utilisateur['pseudo']); ?></h1>
  <p>texte</p>
  <hr>
  
  <h2>Acceuil admin</h2>
  
</body>
</html>