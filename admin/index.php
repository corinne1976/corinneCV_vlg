<?php
require('connexion.php');
$resultat = $pdoCV -> query("SELECT * FROM t_utilisateurs WHERE id_utilisateur = '1'");
$ligne_utilisateur = $resultat -> fetch(PDO::FETCH_ASSOC);

include('inc/header.inc.php');
include('inc/nav.inc.php');
?>

<?php
$resultat = $pdoCV -> query("SELECT * FROM t_competences");
$ligne_competence = $resultat -> fetch(PDO::FETCH_ASSOC);
?>

<div class="container">
    <div class="page-header well">
        <h1>Admin <?= $ligne_utilisateur['prenom']?></h1>
        <h2>Accueil Admin</h2>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">il y a 9 compétences</h3>
                </div>

                <div class="panel-body">

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Compétences</th>
                                <th scope="col">Niveau en %</th>
                                <th scope="col">Supression</th>
                                <th scope="col">Modification</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">coucou</th>
                                <td>100</td>
                                <td><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> </button></td>
                                <td><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></td>
                            </tr>
                            <tr>
                                <th scope="row">toto</th>
                                <td>100</td>
                                <td><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> </button></td>
                                <td><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                            <tr>
                                <th scope="row">Vélo</th>
                                <td>80</td>
                                <td><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                    </button></td>
                                    <td><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
            <div class="col-md-4">
                <div class="well">

                    <div class="panel-info">
                        <div class="panel-heading">
                            <p>Insersion d'une compétence</p>
                        </div>
                        <div class="panel-body">

                            <div class="form-group">
                                <form type="#" name="competence" method="post">
                                    <div class="form-group">
                                        <label for="competence">Competences</label>
                                        <input type="text" name="competences"  id="competences"placeholder="inserer une compétence" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="c_niveau">Niveau</label>
                                        <input type="text" name="c_niveau"  id="c_niveau" placeholder="Insérer un niveau" class="form-control">
                                    </div>
                                    <button type="submit" class="btn btn-info btn-block">Inscrire</button>

                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>




    <?php include('inc/footer.inc.php'); ?>
