<?php
    require_once '../model/clientdb.php';
    extract($_GET);
    $resultat = deleteClient($idCli);
    header("location:client");
?>
