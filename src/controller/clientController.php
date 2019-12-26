<?php

require_once '../model/clientdb.php';
/*extract($_POST); // Extraire les clés d'accès d'un tableau associatif
//$nom = $_POST['nom'];
$result = addClient('$nom', '$prenom', '$adresse', 'tel');
if ($result != 0)
{
    updateClient('$idCli');
}
header("location:client");
*/


session_start();
if (isset($_POST["envoyer"])) {
    $nom = htmlspecialchars($_POST["nom"]);
    $prenom = htmlspecialchars($_POST["prenom"]);
    $adresse = htmlspecialchars($_POST["adresse"]);
    $numTel = htmlspecialchars($_POST["numTel"]);
    $idCli=htmlspecialchars($_POST["idCli"]);
    $result = "";

    if ($idCli == "") {
        $result = addClient($nom, $prenom, $adresse, $numTel);
    } else {

        $result = updateClient($idCli, $nom, $prenom, $adresse, $numTel);
    }


    if ($result == 1) {//insertion reussie OK
        header("location:../index.php");
    } else {
        echo "Erreur lors de l'enregistrement";
    }


} else if (isset($_POST['deco'])) { //Deconnexion

    unset($_SESSION['connectedUser']);
    header("Location:../index.php");
}
