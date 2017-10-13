<?php require'connexion.php'; ?>
<?php 
// je recupère la compétence
$id_competence = $_GET['id_competence'];// par l'id $_GET
$sql = $pdoCV->query(" SELECT * FROM t_competences WHERE id_competence='$id_competence'");// la requete est égal a l'id 
$ligne_competence = $sql->fetch();

 ?>
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
  <h1>Admin du site cv de<?php echo($ligne_utilisateur['pseudo']); ?>Admin</h1>
  <p>texte</p>
  <hr>
  
  <h2>Modification d'une compétence</h2>
  <p><?php echo ($ligne_competence['competence']); ?></p>
  
</body>
</html>