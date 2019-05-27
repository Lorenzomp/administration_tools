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

//Récupération du choix de la page
if (isset($_POST['submit_page'])){
    global $choix_page;
    $choix_page = $_POST['choix_page'];
}

//Modification des textes
if (isset($_POST['submit_modifier'])){
    $numero_emplacement = $_POST['numero_emplacement'];
    $texte_a_modifier = $_POST['texte_a_modifier'];
    $page_a_modifier = $_POST['page_a_modifier'];
    $sql = "UPDATE contenu_pages SET texte = '". $texte_a_modifier ."' WHERE contenu_pages.page = '". $page_a_modifier ."' and contenu_pages.numero = ". $numero_emplacement .";";
    $bdd->query($sql);
}
?>
<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Espace d'administration</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="comptes_utilisateurs.php">Comptes utilisateurs<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">Contenu des pages<span class="sr-only">(current)</span></a>
            </li>
        </ul>
    </div>
</nav>

<!-- contenu page -->
<div class="container">

    <!-- titre -->
    <h1 style="margin-top: 50px; margin-bottom: 30px">Contenu des pages</h1>

    <!--Selection de la page -->
    <h5 style="margin-top: 50px; margin-bottom: 30px">Choix de la page</h5>
    <form class="row" action="" method="post">
        <div class="col-6">
            <select name="choix_page" multiple class="form-control" >
                <?php
                //Récupération et affichage des pages
                $sql =  "SELECT DISTINCT page FROM contenu_pages ORDER BY page";
                foreach ($bdd->query($sql) as $row){
                    global $page;
                    $page = $row['page'];
                    //inclusion ligne texte
                    echo "<option value='". $page ."'>". $page ."</option>";
                }
                ?>
            </select>
        </div>
        <div class="col-2">
            <input style="margin-top: 2em" class="btn btn-success" type="submit" name="submit_page" value="Valider">
        </div>
    </form>

    <h5 style="margin-top: 50px; margin-bottom: 30px">Modification des textes</h5>
    <!-- Tableau -->
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">Page</th>
            <th scope="col">Numéro</th>
            <th scope="col">Textes</th>
            <th scope="col">Modification</th>
        </tr>
        </thead>
        <tbody>
        <?php
        //Récupération des comptes utilsateurs
        if (isset($choix_page)){
            $sql =  "SELECT * FROM contenu_pages WHERE page='". $choix_page ."' ORDER BY numero";
        }else{
            $sql =  "SELECT * FROM contenu_pages ORDER BY page";

        }
        foreach ($bdd->query($sql) as $row){
            global $page;
            $page = $row['page'];
            global $numero_emplacement;
            $numero_emplacement = $row['numero'];
            global $texte;
            $texte = $row['texte'];
            //inclusion ligne texte
            include 'ligne_texte.php';
        }
        ?>
        </tbody>
    </table>



</div>

</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>