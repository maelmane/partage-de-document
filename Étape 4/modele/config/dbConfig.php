<?php
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', 'root');
    define('DB_NAME','application');

    try{
        $cnx = new PDO("mysql:host=" .DB_SERVER. ";dbname=" .DB_NAME, DB_USERNAME, DB_PASSWORD);
        $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e){
        die("ERREUR: " . $e->getMessage());
    }
?>