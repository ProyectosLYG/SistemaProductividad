<?php


function connect(){

    $dir = 'localhost';
    $user = 'root';
    $pwd = '428655';
    $db = 'desemp';

    $conn = mysqli_connect($dir, $user, $pwd, $db);

    if(!$conn){
        echo "Hubo un error en la base de datos.";
    }else{
        return $conn;
    }
}