<?php

require_once '../model/comptedb.php';
extract($_POST); // Extraire les clés d'accès d'un tableau associatif
//$nom = $_POST['nom'];
$result = addCompte('', '$solde', '$idCli');
if ($result != 0)
{
    updateClient('$idCli');
}
header("location:compte");
