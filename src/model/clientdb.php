<?php
    require_once "db.php";

    function addClient($nom, $prenom, $adresse, $numTel)
    {
        $sql ="INSERT INTO client (nom, prenom, adresse, numTel)  VALUES ( '$nom', '$prenom', '$adresse', $numTel)" ;
        var_dump($sql);

        $conn = getConnexion();
       return $conn->exec($sql); // exec c'est pour les requètes mises à jour
    }

    function updateClient($idCli, $nom, $prenom, $adresse, $numTel)
    {
        $sql ="UPDATE client SET nom = $nom, prenom = $prenom, adresse = $adresse, numTel = $numTel WHERE idcli  = $idCli" ;
        $conn = getConnexion();
        return $conn->exec($sql);
    }

    function deleteClient($idCli)
    {
        $sql = "DELETE FROM client where idCli = $idCli";
        $conn = getConnexion();
        return $conn->exec($sql);
    }

    function listClient()
    {
        $sql ="SELECT * FROM client" ;
        $conn = getConnexion();
        return $conn->query($sql);
    }


?>

