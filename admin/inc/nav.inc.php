
<body>
    <nav class="navbar navbar-inverse ">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><?= $ligne_utilisateur['pseudo']?></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="utilisateur.php">Mon profil <span class="sr-only">(current)</span></a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Parcours <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="experiences.php">Expériences</a></li>
                            <li><a href="realisations.php">Réalisations</a></li>
                            <li><a href="formations.php">Formations</a></li>
                            <li><a href="competences.php">Compétences</a></li>
                            <li><a href="loisirs.php">Loisirs</a></li>
                        </ul>
                    </li>

                </ul>

            <ul>
                <li><a href="authentification.php?quitter=oui">Deconnexion</a></li>
            </ul>
        </div><!-- /.container-fluid -->

    </nav>
