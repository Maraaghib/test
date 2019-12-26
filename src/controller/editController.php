<?php
    require_once '../model/clientdb.php';
    extract($_GET);
    $resultat = updateClient($idCli, $nom, $prenom, $adresse, $numTel);
    header("location:client");
?>

