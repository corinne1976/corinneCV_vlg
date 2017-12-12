<?php
//créé un formulaire
//Formulaire/index.php
// on récupère la classe Contact
require('Contact.class.php');

// on vérifie que le formulaire a été posté
if (!empty($_POST))
{
	// on éclate le $_POST en tableau qui permet d'accéder directement aux champs par des variables
    extract($_POST);

    // on effectue une validation des données du formulaire et on vérifie la validité de l'email
     $valid = (empty($nom) || empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL) || empty($sujet) || empty($message)) ? false : true; // écriture ternaire pour if / else
     $erreurnom = (empty($nom)) ? 'Indiquez votre nom' : null;
     $erreuremail = (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) ? 'Entrez un email valide' : null;
     $erreursujet = (empty($sujet)) ? 'Indiquez un sujet' : null;
     $erreurmessage = (empty($message)) ? 'Parlez donc !!' : null;

    // si tous les champs sont correctement renseignés
    if ($valid)
    {
    	// on crée un nouvel objet (ou une instance) de la class Contact.class.php
        $contact = new Contact();
        // on utilise la méthode insertContact pour insérer en BDD
        $contact->insertContact($nom, $email, $sujet, $message);
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
            <a href="index.html" class="logo">Mon Portfolio</a>
            <nav class="menu"><!--debut nav class menu-->
                <a href="#">Acceuil</a><!--lien Acceuil-->
                <a href="#">A propos</a><!--lien a propos-->
                <a href="#">Portfolio</a><!--lien Portfolio-->
                <a href="#">Contact</a><!--lien Portfolio-->

            </nav><!--fin nav class menu-->
        </div><!-- fin div container -->
    </header><!-- fin  header-->
    <section class="container-fluid banner"> <!-- debut banniere-->
        <div class="ban">
            <!-- <h1 id="holder"></h1> -->
            <img src="img/fleur.jpg" alt="banniere du site">
        </div>
        <div class="inner-banner">
            <h2>Bienvenue sur mon portfolio !</h2>
            <button class="btn btn-custom">Contactez moi !</button>
        </div>
    </section><!-- fin banniere-->

    <section class="container-fluid apropos"><!-- debut apropos bootstrap  avec le container fluid les articles seront collés-->
        <div class="container">

        <div class="row">
            <article class="col-md-4 col-lg-4 col-xs-12 col-sm-12"><!-- les articles vont s'aligner sur 3 colonnes et en petit (xs)et moyen (sm) ecran en full screen .-->
            <h2>Formations</h2>
            <hr class="grey">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </article>
            <article class="col-md-4 col-lg-4 col-xs-12 col-sm-12"><!-- les articles vont s'aligner sur 3 colonnes et en petit (xs)et moyen (sm) ecran en full screen .-->
            <h2>experiences</h2>
            <hr class="grey">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </article>
            <article class="col-md-4 col-lg-4 col-xs-12 col-sm-12"><!-- les articles vont s'aligner sur 3 colonnes et en petit (xs)et moyen (sm) ecran en full screen .-->
            <h2>Loisirs</h2>
            <hr class="grey">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </article>
        </div>
    </div>

    </section><!-- fin a propos-->

    <section class=" container-fluid realisations"><!-- debut realisations-->
        <div class="container">
            <h3>Réalisations</h3>
            <article class="col-md-3 col-lg-3 col-xs-12 col-sm-12">
                <img src="img/avatar.jpg" alt="">
            </article>
            <article class="col-md-3 col-lg-3 col-xs-12 col-sm-12">
                <img src="img/avatar.jpg" alt="">
            </article>
            <article class="col-md-3 col-lg-3 col-xs-12 col-sm-12">
                <img src="img/avatar.jpg" alt="">
            </article>
            <article class="col-md-3 col-lg-3 col-xs-12 col-sm-12">
                <img src="img/avatar.jpg" alt="">
            </article>
        </div>
    </section><!-- fin réalisations-->

    <footer class="container-fluid footer"><!-- debut footer-->
    </footer><!-- fin footer-->
    <!-- <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script> -->
</body>

<footer class="container-fluid footer">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <img src="grass.jpg" alt="photo de nature" style="height: 71vh; width: 27vw; border-radius: 1%">
                </div><!-- /.col-md-4 -->
                <div class="col-md-6 offset-2">
                    <h3>Formulaire de contact</h3>
                    <h5>Réalisé en POO</h5>
                    <form action="index3.php" method="POST">
                        <div class="form-group">
                            <label for="nom">Nom :</label>
                            <span class="error"><?php if (isset($erreurnom)) echo $erreurnom; ?></span>
                            <input class="form-control" type="text" name="nom" value="<?php if(isset($nom)) echo $nom; ?>">
                        </div>
                        <div class="form-group">
                           <label for="email">Email :</label>
                           <span class="error"><?php if (isset($erreuremail)) echo $erreuremail; ?></span>
                           <input id="email" class="form-control" type="text" name="email" value="<?php if (isset($email)) echo $email; ?>">
                       </div>
                       <div class="form-group">
                           <label for="sujet">Sujet :</label>
                           <span class="error"><?php if (isset($erreursujet)) echo $erreursujet; ?></span>
                           <input class="form-control" type="text" name="sujet" value="<?php if (isset($sujet)) echo $sujet; ?>">
                       </div>
                       <div class="form-group">
                            <label for="message">Message :</label>
                            <span class="error"><?php if (isset($erreurmessage)) echo $erreurmessage; ?></span>
                            <textarea class="form-control" name="co_message" cols="30" rows="10"><?php if (isset($message)) echo $message; ?></textarea>
                        </div>

                         <input type="submit" class="btn btn-outline-info btn-block btn-submit" value="Envoyer" />

                    </form><!-- /form -->
                </div><!-- /.col-md-6 col-md-offset-2 -->
            </div><!-- /.row -->
        </div><!-- /.card-body -->
    </div><!-- /.card -->
</footer>
</html>
