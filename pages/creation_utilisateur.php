<?php
if (isset($_POST['add_user'])){
    //Récupération des variables POST
    $id = $_POST['id'];
    $password = $_POST['password'];
    //Ajout du compte utilsateur
    $sql =  "INSERT INTO comptes (id, password) VALUES ('". $id ."', '". $password ."');";
    $bdd->query($sql);
}
?>


