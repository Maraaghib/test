<?php
    function getConnexion()
    {
        $host = 'localhost'; // Adresse IP de la machine dont on a installé MSQL
        $user = 'root';
        $password = '';
        $dbname = 'banqueDuPeuple';

        $dsn ="mysql:host =$host;dbname=$dbname";
        try {
            $db = new PDO($dsn, $user, $password);
        }catch (PDOExeption $ex){
            die('Error : '.$ex->getMessage());
        }
        return $db;
    }
    

?>