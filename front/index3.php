
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
                <a href="#apropos">A propos</a><!--lien a propos-->
                <a href="#realisations">Réalisations</a><!--lien Portfolio-->
                <a href="#contact">Contact</a><!--lien Portfolio-->

            </nav><!--fin nav class menu-->
        </div><!-- fin div container -->
    </header><!-- fin  header-->
    <section class="container-fluid banner"> <!-- debut banniere-->
        <div class="ban">
            <!-- <h1 id="holder"></h1> -->
            <img src="img/fleur.jpg" alt="banniere du site">
        </div>
        <div class="inner-banner">
            <h1 id="holder"></h1>
            <button class="btn btn-custom">Découvrez moi</button>
        </div>
    </section><!-- fin banniere-->

    <section class="container-fluid apropos"><!-- debut apropos bootstrap  avec le container fluid les articles seront collés-->
        <div class="container">

            <div class="row">
                <article class="col-md-4 col-lg-4 col-xs-12 col-sm-12"><!-- les articles vont s'aligner sur 3 colonnes et en petit (xs)et moyen (sm) ecran en full screen .-->
                    <h2>Compétences</h2>
                    <p>html</p>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="70"
                        aria-valuemin="0" aria-valuemax="100" style="width:70%">
                        <!-- <span class="sr-only">70% Complete</span> -->
                    </div>
                </div>
                <p>css</p>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="60"
                    aria-valuemin="0" aria-valuemax="100" style="width:60%">
                    <!-- <span class="sr-only">70% Complete</span> -->
                </div>
            </div>
            <p>php</p>
            <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="30"
                aria-valuemin="0" aria-valuemax="100" style="width:30%">
                <!-- <span class="sr-only">70% Complete</span> -->
            </div>
            </article>
            <article class="col-md-4 col-lg-4 col-xs-12 col-sm-12"><!-- les articles vont s'aligner sur 3 colonnes et en petit (xs)et moyen (sm) ecran en full screen .-->
                <h2>experiences</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </article>
            <article class="col-md-4 col-lg-4 col-xs-12 col-sm-12"><!-- les articles vont s'aligner sur 3 colonnes et en petit (xs)et moyen (sm) ecran en full screen .-->
                <h2>Formations</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </article>
        </div>
    </div>

</section><!-- fin a propos-->

<section class=" container-fluid realisations"><!-- debut realisations-->
    <div class="container"><!-- debut container-->
        <h3>Réalisations</h3>
        <article class="col-md-6 col-lg-6 col-xs-12 col-sm-12 item-realisations">
            <img  class="responsive" src="img/site.PNG" width="100%"alt="">
        </article>
        <article class="col-md-6 col-lg-6 col-xs-12 col-sm-12 item-realisations">
            <img  class="responsive" src="img/site2.PNG" width="100%"alt="">
        </article>
    </div><!-- fin container-->
</section><!-- fin réalisations-->

<footer class="container-fluid footer"><!-- debut footer-->
    <div class="container"><!-- debut container-->
        <div class="row"><!-- debut row-->
            <div class="contact"><!-- debut div class contact-->
                <form class="contact-form" action="" method="post"><!-- debut formulaire-->
                    <input type="text" name="nom" placeholder="nom" required>
                    <input type="email" name="email" placeholder="email" required>
                    <input type="text" name="sujet" placeholder="sujet" required>
                    <textarea name="message" rows="5" placeholder="message" required></textarea>
                    <input class="button" type="submit">
                </form><!-- fin formulmaire-->
            </div><!-- fin div class contact-->
        </div><!-- fin row-->
    </div><!-- fin container-->
</footer><!-- fin footer-->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
</body>
</html>
