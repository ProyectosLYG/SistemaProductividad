<?php
    session_start();

    include '../../build/config/connection.php';
    $_SESSION['errores'] = "";
    $errores = [];
    $conn = connect();

    $ppRegex = "/^(?:[1-9][0-9]{0,3})$/";
    $isbnRegex = "/^(?:\d{1,5}[ -]\d{1,7}[ -]\d{1,7}[ -][0-9X]|(978|979)[ -]\d{1,5}[ -]\d{1,7}[ -]\d{1,6}[ -]\d)$/";
    
    $id_res = $SESSION['user'];

    (!isset($_POST['tituloCapitulo']) || empty($_POST['tituloCapitulo'])) ? $errores .= "El titulo del capítulo es obligatorio." : $ttuloCapitulo = $_POST['tituloCapitulo']; 

    (!isset($_POST['resumen']) || empty($_POST['resumen'])) ? $errores[] .= "El resumen del libro es obligatorio." : $resumen = $_POST['resmun'];

    (!isset($_POST['autores']) || empty($_POST['autores'])) ? $errores[] .= "Los autores del capítulo son obligatorios." : $autores = $_POST['autores'];

    (!isset($_POST['posicionAutorCapitulo'])) ? $posicion = '0' : $posicion = $_POST['posicionAutorCapitulo'];

    (!isset($_POST['pp_inicio']) || !isset($_POST['pp_final']) || empty($_POST['pp_inicio']) || empty($_POST['pp_final'])) ? $errores[] .= "el rango de paginas es obligatorio" : ($pp_inicio = $_POST['pp_inicio']) && ($pp_final = $_POST['pp_final']);

    (!preg_match($ppRegex, $pp_inicio) || !preg_match($ppRegex, $pp_final)) ? $errores[] .= "El rango de las páginas debe ser un nuúmero entero positivo." : (($pp_inicio > $pp_final) ? $errores[] .= "El inicio de las paginas no puede ser mayor al final." : $rangoPags = $pp_inicio . '-' . $pp_final);

    (!isset($_POST['sectorEstrategico']) || empty($_POST['sectorEstrategico'])) ? $errores[] .= "El sector estratégico es obligatorio." : $sector = $_POST['sectorEstrategico'];

    (!isset($_POST['areaConocimiento']) || empty($_POST['areaConocimiento'])) ? $errores[] .= "El area de conocimiento es oblligatorio." : $area = $_POST['areaConocimiento'];

    
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
        
    