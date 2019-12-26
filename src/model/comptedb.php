<?php
require_once "db.php";

    function addCompte($numero, $solde, $idCli)
    {
        $sql = "INSERT INTO compte (solde,idCli) VALUES('$solde', $idCli) ";
        $conn = getConnexion();
        return $conn->exec($sql); // exec: pour les requètes mises à jour
    }
    function updateCompte($numero, $solde)
    {
        $sql ="UPDATE compte SET  solde = $solde WHERE numero = $numero   " ;
        $conn = getConnexion();
        return $conn->exec($sql);
    }

    function deleteCompte($numero)
    {
        $sql = "DELETE FROM compte WHERE numero = $numero";
    }

    function listCompte(){
        $sql = "SELECT *  FROM compte, client
        WHERE compte.idCli=client.idCli
        ORDER BY client.nom";
        $conn = getConnexion();
        return $conn->query($sql);
    }

?>



