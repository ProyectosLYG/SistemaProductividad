<?php session_start(); 
    !isset($_SESSION['user']) && !isset($_SESSION['role']) ? $_SESSION['role'] = 'guest': 0;

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="./build/css/app.css">
    <link rel="icon" href="./build/img/escudo_isc.png" type="image/x-icon">
    <title>Desempeño ISC</title>
</head>