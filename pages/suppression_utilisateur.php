<?php
//Suppression
if (isset($_POST['submit'])){
    //Récupération de l'ID
    $id_user = $_POST['id_user'];
    //Récupération des comptes utilsateurs
    $sql =  "DELETE FROM comptes WHERE comptes.id ='" . $id_user . "'";
    $bdd->query($sql);
    header('Refresh: 0');}
?>