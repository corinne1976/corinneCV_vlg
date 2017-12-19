<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title ></title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">



</head>
<!-- contenu du site -->

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
                <a class="navbar-brand" href="index.php"></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="conducteur.php">Conducteur</a></li>
                    <li><a href="vehicule.php">Vehicule</a></li>
                    <li><a href="association.php">Association</a></li>
                </ul>

            </div><!-- /.container-fluid -->

        </nav>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
            <thead>
              <tr>
                <th>id_association</th>
                <th>Conducteur</th>
                <th>Véhicule</th>
                <th>Modification</th>
                <th>Suppression</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> </button></td>
                <td><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> </button> </a></td>
              </tr>
            </tbody>
          </table>
        <hr>
    </div>

</div>


<div class="col-md-4">

    <div class="panel-info">
        <!--formulaire d'insertion-->
        <div class="panel-body">
            <div class="form-group">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="conducteur"> conducteur</label><br>
                        <select class="form-control">
                            <option>Choisir le conducteur</option>
                            <option>#</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="modele">Véhicule :</label><br>
                        <select class="form-control">
                            <option> choisir le vehicule</option>
                            <option>#</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="association">Association :</label><br>
                        <input type="text" name="association" id="association" placeholder="association" class="form-control">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>

</html>
</body>
