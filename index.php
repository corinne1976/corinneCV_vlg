<?php
require 'admin/connexion.php';
require 'Contact.class.php';

// on vérifie que le formulaire a été poste
if (!empty($_POST)) {// on éclate le tableau avec la methode extract(), ce qui nous permets d'accèder aux champs par des variables
    extract($_POST);
    $valid = (empty($nom) || empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL) || empty($sujet) || empty($message))
    ? false : true;// écriture ternaire if else

    if ($valid) {// si tous les champs sont renseignés
        $contact = new Contact();// on crée un nouvel objet (ou instance ) de la class Contact.class.phpinfo
        $contact->insertContact($nom, $email, $sujet, $message);
        unset($nom);
        unset($email);
        unset($sujet);
        unset($message);
    }
}

$resultat = $bdd -> prepare("SELECT * FROM t_competences");// requete de selection de la table t_compérences ou l'id est == a 1 donc corinne
$resultat -> execute();// execution de la requete
$ligne_competences =  $resultat -> fetchAll(PDO::FETCH_ASSOC);
?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content=" Corinne Tina Intégratrice développeuse web en recherche de stage">
    <meta name="keywords" content="Intégrateur, développeur, html, css, php,">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title >Mon Cv</title>
    <link href="https://fonts.googleapis.com/css?family=Lobster|Roboto:300i,400,400i,500,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Spectral+SC" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Merienda" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Paaji" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<!-- contenu du site -->
<body>
    <header class="container-fluid header"><!-- debut header avec bootstrap-->
        <div class="container"><!--debut div container-->
            <div class="row centrer">
            <a href="index.php" id="logo">Corinne tina </a>
            <nav class="menu"><!--debut nav class menu-->
                <a href="#">Accueil</a><!--lien Acceuil-->
                <a href="#apropos">À propos</a><!--lien a propos-->
                <a href="#realisations">Réalisations</a><!--lien réalisations-->
                <a href="#contact">Contact</a><!--lien contact vers le footer-->
            </div>
            </nav><!--fin nav class menu-->
        </div><!-- fin div container -->
    </header><!-- fin  header-->
    <section class="container-fluid banner"> <!-- debut banniere-->
        <div class="inner-banner">
            <h1 id="holder"></h1>
            <a href="https://www.facebook.com/corinne.tina.5"><i class="fa fa-facebook-official vert fa-lg" aria-hidden="true"></i></a>
            <a href="https://twitter.com/corinnetina76"><i class="fa fa-twitter vert fa-lg" aria-hidden="true"></i></a>
            <a href="https://github.com/corinne1976/corinneCV_vlg"><i class="fa fa-github vert fa-lg" aria-hidden="true"></i></a>
            <a href="https://www.linkedin.com/in/corinne-tina-8609a6146/"><i class="fa fa-linkedin vert fa-lg" aria-hidden="true"></i></a><br>
            <a href="#contact"><button class="btn btn-custom vert fa-lg">Contactez-moi</i></button></a>

        </div>
    </section><!-- fin banniere-->
    <section class="container-fluid  jumbotron apropos"><!-- debut apropos bootstrap  avec le container fluid les articles seront collés-->
        <div class="container jumbotron">

            <h3 id="apropos">À Propos</h3>
            <div class="row">
                <article class="col-md-4 col-lg-4 col-xs-12 col-sm-12"><!-- les articles vont s'aligner sur 3 colonnes et en petit (xs)et moyen (sm) ecran en full screen .-->
                    <h2><i>Compétence</i>s</h2>
                    <!-- <h4>HTML</h4> -->
                    <?php
                    foreach($ligne_competences as $corinne){
                    ?>
                    <div class="brown"> <?= $corinne['competence'] ?> </div>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: <?= $corinne['c_niveau']; ?>%">
                            <?= $corinne['c_niveau']; ?>
                        </div>
                    </div>

                <?php } ?>

                </article>
                <article class="col-md-4 col-lg-4 col-xs-12 col-sm-12"><!-- les articles vont s'aligner sur 3 colonnes et en petit (xs)et moyen (sm) ecran en full screen .-->
                    <h2><i>Parcours pro</i></h2>
                    <p class="roboto">Depuis juin 2017 : <br>Intégratrice developpeuse web : <br>Le Poles Villeneuve la Garenne<br>Réalisation d'un site dynamique perso</p><br>
                    <p class="roboto">1999 à 2013 : <br>Luz Optique, Gnfa, Carglass<br>Gestion de la facturation, Aptitude rédactionnelle, conseiller gérer et fidéliser un portefeuille de clients</p>

                </article>
                <article class="col-md-4 col-lg-4 col-xs-12 col-sm-12"><!-- les articles vont s'aligner sur 3 colonnes et en petit (xs)et moyen (sm) ecran en full screen .-->
                    <h2><i>Certifications</i></h2>
                    <p class="roboto">2017-2018 : <br>Webforce3 Certifications Intégrateur développeur web Webforce3</p><br>
                    <p class="roboto">1995-1996 :<br>Baccalauréat secrétariat</p>
                    <p class="roboto">1994-1995 :<br>BEP-CAP secrétariat</p>

                </article>
            </div>
        </div>

    </section><!-- fin a propos-->

    <section class=" container-fluid realisations"><!-- debut realisations-->
        <div class="container"><!-- debut container-->
            <h3 id="realisations">Réalisations</h3>
            <article class="col-md-6 col-lg-6 col-xs-12 col-sm-12 item-realisations">
                <img  class=" img-thumbnail img-rounded responsive" src="img/site.PNG" width="100%"alt="">
            </article>
            <article class="col-md-6 col-lg-6 col-xs-12 col-sm-12 item-realisations">
                <img  class="img-thumbnail img-rounded responsive" src="img/site2.PNG" width="100%"alt="">
            </article>
        </div><!-- fin container-->
    </section><!-- fin réalisations-->

    <footer class="container-fluid footer"><!-- debut footer-->
        <div class="container"><!-- debut container-->
            <h3 id="contact">Contact</h3>
            <div class="row"><!-- debut row-->
                <div class=" col-md-6 col-lg-6 col-xs-12 col-sm-12 contact"><!-- debut div class contact-->
                    <form action="#" method="POST">
                    <div class="form-group">
                        <label for="nom">Nom:</label>
                        <input type="text" class="form-control" name="nom" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email : </label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="sujet">Sujet:</label>
                        <input type="text" class="form-control" name="sujet" placeholder="Objet de votre message" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Message:</label>
                        <textarea class="form-control" rows="5" name="message"></textarea>
                    </div>
                    <button type="submit" class="btn btn-default largeur">Envoyer</button>
                </form>

                </div><!-- fin div class contact-->
                <div class="col-md-4 col-lg-4 col-xs-12 col-sm-12 col-md-offset-2 top">
                    <i class="fa fa-phone-square blanc" aria-hidden="true"></i><span class="blanc"> 06.24.47.87.98</span><br>
                    <i class="fa fa-envelope-o blanc" aria-hidden="true"></i><span class="blanc">tinacorinne@yahoo.fr</span>


                </div>
            </div><!-- fin row--><br>
            <div class="class row">
                <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                    <p class="center">Copyright Tina Corinne <?= date('Y') ?><a href="admin/authentification.php"> Admin</a></p>
                    <p>

                    </p>
                </div>
            </div>
        </div><!-- fin container-->
    </footer><!-- fin footer-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>
