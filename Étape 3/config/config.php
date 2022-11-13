<!--
    Auteur: Mael Mane
    Date de créaton: 19/10/2022
    Dernière modifcation: 12/11/2022
    Modifié par: Mael Mane
-->


<?php
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', 'root');
    define('DB_NAME','partagedoc');

    try{
        $pdo = new PDO("mysql:host=" .DB_SERVER. ";dbname=" .DB_NAME, DB_USERNAME, DB_PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e){
        die("ERREUR: " . $e->getMessage());
    }
?>