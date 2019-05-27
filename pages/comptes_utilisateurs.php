<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration</title>
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
<?php
//connexion base de donnée
//Connexion directe avec PDO()
$bdd = new PDO('mysql:dbname=administration_tools;host=localhost', 'root', '');
// set the PDO error mode to exception
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//Ajout d'utilisateur
include 'creation_utilisateur.php';
include 'suppression_utilisateur.php';
?>
<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Espace d'administration</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Comptes utilisateurs<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contenu_pages.php">Contenu des pages</a>
            </li>
        </ul>
    </div>
</nav>

<!-- contenu page -->
<div class="container">

    <!-- titre -->
    <h1 style="margin-top: 50px; margin-bottom: 30px">Modification des comptes utilisateurs</h1>


<!-- Tableau -->
<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Mot de passe</th>
        <th scope="col">Suppression</th>
    </tr>
    </thead>
    <tbody>
<?php
//Récupération des comptes utilsateurs
$sql =  'SELECT * FROM comptes ORDER BY id';
foreach ($bdd->query($sql) as $row){
    global $id;
    $nom = $row['id'];
    global $password;
    $password = $row['password'];
    //inclusion ligne utilisateur
    include 'ligne_utilisateur.php';
}
?>
    </tbody>
</table>

<!-- Ajout d'un utilisateur -->
    <h1 style="margin-top: 50px; margin-bottom: 30px">Création d'utilisateur</h1>
    <form action="" method="post">
        <div class="form-group row">
            <div class="col-1">
                <label style="widows: 100%; right: 10px; position: absolute; font-size: 1.5em;">ID</label>
            </div>
            <div class="col-4">
                <input name="id" style="widows: 100%;" type="text" class="form-control" placeholder="Entrer le nouvel ID">
            </div>
            <div class="col-2">
                <label style="widows: 100%; right: 10px; position: absolute; font-size: 1.5em;">Mot de passe</label>
            </div>
            <div class="col-3">
                <input name="password" style="width: 100%;"  type="text" class="form-control" placeholder="Et son mot de passe">
            </div>
            <div class="col-2">
                <input style="width: 100%;" name="add_user" type="submit" class="btn btn-success" value="Créer">
            </div>
        </div>
    </form>



</div>

</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>