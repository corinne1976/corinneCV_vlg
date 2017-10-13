<?php require'connexion.php'; ?>
<?php 
$msg = '';
// gestion  des contenus de la Bdd.
// insertion d'une compétence.
if (isset($_POST['competence'])) {// si on a post" une nouvelle compétence
if ($_POST['competence'] !='' && $_POST['c_niveau'] !='') {// verifie si le formulaire n'est pas vide
$competence = addslashes($_POST['competence']);// pour les apostrophes addslashes va mettre un anti -slash
$c_niveau = addslashes($_POST['c_niveau']);// pour les apostrophes addslashes va mettre un anti -slash
$pdoCV->exec("INSERT INTO t_competences VALUES (NULL,'$competence','$c_niveau', '1')");// insersion d'une requete
// mettre id utilisateur 

}//ferme le if n'est pas vide
}// ferme le if isset du form


// supression d'une competence

if(isset($_GET['id_competence'])) {// on recupere la compétence dans son id dans l'url
  $efface = $_GET['id_competence'];// je mets cela dans une variable 
  $sql = " DELETE FROM t_competences WHERE id_competence = '$efface'  ";
  $pdoCV->query($sql);// on peut avec exec aussi si on veut 
  header("location: competence.php");// redirection vers la page
  exit();//sortie 
}// ferme le if isset 
else {// boucle afin d'afficher un message d'erreur si le champs n'est pas remplie
  $msg.= '<p style="padding:5px; background:pink; width:20%">Veuillez renseigner ce champs</p>';
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <?php 
  
  $sql = $pdoCV->query("SELECT * FROM t_utilisateurs ");
  $ligne_utilisateur = $sql->fetch();
  
  ?>
  <title> Admin  : <?php echo($ligne_utilisateur['pseudo']); ?>prénom nom</title>
</head>
<body>
  <h1> Admin du site cv de <?php echo($ligne_utilisateur['pseudo']); ?> Admin</h1>
  <p>texte</p>
  <hr>
  <?php 
  
  $sql = $pdoCV->prepare("SELECT * FROM t_competences WHERE utilisateur_id = '1'");
  $sql->execute();
  $nbr_competences = $sql->rowCount();
  // $ligne_competence = $sql->fetch();
  
  
  ?>
  <h2>Il y a <?php echo $nbr_competences; ?> compétence<?= ($nbr_competences>1)?'s':''?> dans la table. </h2>
  <table border="4px solid black with:20px">
    <tr>
      <th>Compétences</th>
      <th>Niveau en %</th>  
      <th>Supression</th>
      <th>Modification</th>
    </tr>
    <tr>
      <?php while($ligne_competence = $sql->fetch()){ ?>
        <td><?php echo $ligne_competence['competence']; ?></td>
        <td><?php echo $ligne_competence['c_niveau']; ?></td>
        <td><a href="competence.php?id_competence=<?php echo $ligne_competence['id_competence'];?>">supprimer</a></td>
        <td><a href="modif_competence.php?id_competence=<?php echo $ligne_competence['id_competence']; ?>">modifier</a></td>
        
        
      </tr>
    <?php } ?>
  </table>
  <hr>
  <h3>Insertion d'une compétence</h3>
  <?= $msg; ?><!-- echo pour afficher le message -->
  <form action="competence.php" method="post">
    <label for="competence">Compétence</label>
    <input type="text" name="competence" id="competence" placeholder="Insèrer une compétence !">
    <input type="text" name="c_niveau" id="c_niveau" placeholder="Insèrer le niveau">
    <input type="submit" value="Envoyer">
  </form>
  
</body>
</html>