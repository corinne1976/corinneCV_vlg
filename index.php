<?php
require 'connexion.php';
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

 ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title ></title>
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display+SC" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/style2.css">

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
            <div class="row">
            <a href="index.html" class="logo">Corinne tina </a>
            <nav class="menu"><!--debut nav class menu-->
                <a href="#">Accueil</a><!--lien Acceuil-->
                <a href="#apropos">A propos</a><!--lien a propos-->
                <a href="#realisations">Réalisations</a><!--lien réalisations-->
                <a href="#contact">Contact</a><!--lien contact vers le footer-->
            </div>
            </nav><!--fin nav class menu-->
        </div><!-- fin div container -->
    </header><!-- fin  header-->
    <section class="container-fluid banner"> <!-- debut banniere-->
        <div class="ban">
            <!-- <h1 id="holder"></h1> -->
            <img  class="img-responsive" src="img/bureau.jpg" alt="banniere du site">
        </div>
        <div class="inner-banner">
            <h1 id="holder"></h1>
            <button class="btn btn-custom">Contactez moi</i></button>
        </div>
    </section><!-- fin banniere-->
    <section class="container-fluid  jumbotron apropos"><!-- debut apropos bootstrap  avec le container fluid les articles seront collés-->
        <div class="container jumbotron">
            <?php
       $resultat = $pdo -> prepare("SELECT * FROM t_competences WHERE utilisateur_id ='1'");
       $resultat->execute();
       /*$ligne_competence = $resultat -> fetch();*/
       ?>
            <span id="apropos">A Propos</span>
            <div class="row">
                <article class="col-md-4 col-lg-4 col-xs-12 col-sm-12"><!-- les articles vont s'aligner sur 3 colonnes et en petit (xs)et moyen (sm) ecran en full screen .-->
                    <h2>Compétences</h2>
                        <hr>
                    <h4>HTML</h4>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width: 60%;">
                            60%
                        </div>
                    </div>
                    <h4>CSS</h4>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width: 60%;">
                            50%
                        </div>
                    </div>
                    <h4>PHP</h4>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width: 50%;">
                            40%
                        </div>
                    </div>
                    <h4>Bootstrap</h4>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width: 50%;">
                            50%
                        </div>
                    </div>
                    <h4>Sql</h4>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width: 50%;">
                            50%
                        </div>
                    </div>
                </article>
                <article class="col-md-4 col-lg-4 col-xs-12 col-sm-12"><!-- les articles vont s'aligner sur 3 colonnes et en petit (xs)et moyen (sm) ecran en full screen .-->
                    <h2>Parcours pro</h2>
                        <hr>
                    <p class="roboto">Depuis juin 2017 : <br>Intégratrice developpeuse web : <br>Le Poles Villeneuve la Garenne<br>Réalisation d'un site dynamique perso</p><br>
                    <p class="roboto">De 1999 à 2013 : <br>Luz Optique, Gnfa, Carglass<br>Gestion de la facturation, Aptitude rédactionnelle, Conseiller gérer et fidéliser un portefeuille de clients</p>

                </article>
                <article class="col-md-4 col-lg-4 col-xs-12 col-sm-12"><!-- les articles vont s'aligner sur 3 colonnes et en petit (xs)et moyen (sm) ecran en full screen .-->
                    <h2>Certifications</h2>
                        <hr>
                    <p class="roboto"> De 2017-2018 : <br>Webforce3 Certifications Intégrateur développeur web Webforce3</p><br>
                    <p class="roboto"> De 1995-1996 :<br>Baccalauréat secrétariat</p>

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
            <span id="contact">Contact</span>
            <div class="row"><!-- debut row-->
                <div class=" col-md-6 col-lg-6 col-xs-12 col-sm-12 contact"><!-- debut div class contact-->
                    <form action="" method="POST">
                    <div class="form-group">
                        <label for="nom">Nom:</label>
                        <input type="text" class="form-control" name="nom">
                    </div>
                    <div class="form-group">
                        <label for="email">Email : </label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label for="sujet">Sujet:</label>
                        <input type="text" class="form-control" name="sujet" placeholder="Objet de votre message">
                    </div>
                    <div class="form-group">
                        <label for="message">Message:</label>
                        <textarea class="form-control" rows="5" name="message"></textarea>
                    </div>
                    <button type="submit" class="btn btn-default">Envoyer</button>
                </form>

                </div><!-- fin div class contact-->
            </div><!-- fin row-->
            <div class="class row">
                <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                    <p>Copyright Tina Corinne 2017</p>
                </div>
            </div>
        </div><!-- fin container-->
    </footer><!-- fin footer-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>
