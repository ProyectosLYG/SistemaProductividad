<?php 
    include "../../config/connection.php";

    $db = connect();
    $userId = $_SESSION['user'];
    $errores[] = "";
    $ppRegex = "/^(?:[1-9][0-9]{0,3})$/";

    /*
    tituloArticulo
    nombreRevista
    autoresArticulo
    propositoAutor
    resumen
    estadoArticulo
    fechaArticulo
    sectorArticulo
    areaConocimiento
    tipoArticulo
    pp_inicio
    pp_final
    indiceRegistro
    issn
    */


    //validacion de campos
    (!isset($_POST['tituloArticulo']) || empty($_POST['tituloArticulo'])) ? $errores[] = "El titulo del articulo es obligatorio" : $tituloArticulo = $_POST['tituloArticulo'];

    (!isset($_POST['nombreRevista']) || empty($_POST['nombreRevista'])) ? $errores[] = "El nombre de la revista es obligatorio." : $nombreRevista = $_POST['nombreRevista'];

    (!isset($_POST['autoresArticulo']) || empty($_POST['autoresArticulo'])) ? $error[] = "Los autores son obligatorios." : $autoresArticulo = $_POST['autoresArticulo'];

    (!isset($_POST['propositoAutor']) || empty($_POST['propositoAutor'])) ? $errores[] = "El proposito del autor es obligatorio." : $propositoAutor = $_POST['propositoAutor'];