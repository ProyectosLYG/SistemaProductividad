<?php

    include '../../build/config/connection.php';

    $conn = connect();

    $tituloCapitulo = "";
    $resumen ="";
    $autores = "";
    $posicion = "";
    $rangoPags = "";
    $sector = "";
    $areaConocimiento = "";
    $tituloLibro = "";
    $edicion ="";
    $casaEditorial ="";
    $fechaPublicacion = "";
    $isbn = "";
    $editorial = "";
    $evidencia1 = "";
    $evidencia2 = "";
    $evidencia3 = "";

    $sql = "INSERT INTO chap_book (tituloCapitulo,resumen, autores, posicionAutor, paginas, sectorEstrategico, areaConocimiento, tituloLibro, edicion, casaEditorial, fechaPublicacion, isbn, editorial, evidencia1, evidencia2, evidencia3 ) VALUES ";

