<?php


function connect(){

    $host = 'localhost';
    $user = 'root';
    $pwd = '428655'; //slime1234
    $db = 'desemp';
    $charset = "utf8mb4";

    $dbc = "mysql:host=$host;dbname=$db;charset=$charset";
    $opt = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    try{
        $conn = new PDO($dbc, $user, $pwd, $opt);
        return $conn;
    }catch(PDOException $e){
        echo "Connexion fallida: " . $e->getMessage();
        exit;
    }
}