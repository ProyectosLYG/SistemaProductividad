<?php

    include '../../build/config/connection.php';

    $conn = connect();

    $id_res = $SESSION['user'];
    $tituloCapitulo = $_POST['tituloCapitulo'];
    $resumen = $_POST['resumen'];
    $autores = $_POST['autores'];
    $posicion = $_POST['posicionAutorCapitulo'];
    $rangoPags = $_POST['pp_inicio'] .'-'- $_POST['pp_final'];
    $sector = $_POST['sectorEstratégico'];
    $area = $_POST['areaConocimiento'];
    $tituloLibro = $_POST['tituloLibro'];
    $edicion = $_POST['edicion'];
    $casaEditorial = $_POST['casaEditorial'];
    $fechaPublicacion = $_POST['fechaPublicacion'];
    $isbn = $_POST['isbn'];
    $editorial = $_POST['editorial'];
    $evidencia1 = $_POST['evidencia1'];
    $evidencia2 = $_POST['evidencia2'];
    $evidencia3 = $_POST['evidencia3'];

    $sql = "INSERT INTO chap_book 
    (
    id_res,
    tituloCapitulo, 
    resumen, 
    autores, 
    posicionAutor, 
    paginas, 
    sectorEstrategico, 
    areaConocimiento, 
    tituloLibro, 
    edicion, 
    casaEditorial, 
    fechaPublicacion, 
    isbn, 
    editorial, 
    evidencia1, 
    evidencia2, 
    evidencia3
    ) VALUES (
    :id_res,
    :tituloCapitulo,
    :resumen,
    :autores,
    :posicionAutor,
    :paginas,
    :sectorEstrategico,
    :areaConocimiento,
    :tituloLibro,
    :edicion,
    :casaEditorial,
    :fechaPublicacion,
    :isbn,
    :editorial,
    :evidencia1,
    :evidencia2,
    :evidencia3
    );";
    try{

        $stmt = $conn->prepare($sql);
        $stmt -> execute([
            'id_res' => $id_res,
            'tituloCapitulo' => $tituloCapitulo,
            'resumen' => $resumen,
            'autores' => $autores,
            'posicionAutor' => $posicion,
            'paginas' => $rangoPags,
            'sectorEstrategico' => $sector,
            'areaConocimiento' => $area,
            'tituloLibro' => $tituloLibro,
            'edicion' => $edicion,
            'casaEditorial' => $casaEditorial,
            'fechaPublicacion' => $fechaPublicacion,
            'isbn' => $isbn,
            'editorial' => $editorial,
            'evidencia1' => $evidencia1,
            'evidencia2' => $evidencia2,
            'evidencia3' => $evidencia3
        ]);
        $res = $stmt -> rowCount();
        if($res > 0){
            header("Location: ../../index.php");
        }else{
            echo "Error al insertar el capítulo del libro.";
            exit;
        }
    }catch(PDOException $e){
        echo "Error: " . $e->getMessage();
        exit;
    }
        
    