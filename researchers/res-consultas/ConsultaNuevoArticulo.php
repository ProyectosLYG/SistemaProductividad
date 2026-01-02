<?php 
    session_start();
    include "../../build/config/connection.php";
    $conn = connect();
    $userId = $_SESSION['user'];
    $_SESSION['errores'] = "";
    $errores = [];
    $ppRegex = "/^(?:[1-9][0-9]{0,3})$/";

    /*
    id_res,
    tituloArticulo,
    nombreRevista,
    autoresArticulo,
    propositoAutor,
    resumen,
    estadoArticulo,
    fechaArticulo,
    casaEditorial,
    sectorArticulo,
    areaConocimiento,
    tipoArticulo,
    rangoPaginas,
    indiceRegistro,
    issn
    */

/*     echo '<pre>';
    echo var_dump($_POST);
    echo '</pre>';
    exit; */

    //validacion de campos
    (!isset($_POST['tituloArticulo']) || empty($_POST['tituloArticulo'])) ? $errores[] = "El titulo del articulo es obligatorio" : $tituloArticulo = $_POST['tituloArticulo'];

    (!isset($_POST['nombreRevista']) || empty($_POST['nombreRevista'])) ? $errores[] = "El nombre de la revista es obligatorio." : $nombreRevista = $_POST['nombreRevista'];

    (!isset($_POST['autoresArticulo']) || empty($_POST['autoresArticulo'])) ? $errores[] = "Los autores son obligatorios." : $autoresArticulo = $_POST['autoresArticulo'];

    (!isset($_POST['propositoAutor']) || empty($_POST['propositoAutor'])) ? $errores[] = "El proposito del autor es obligatorio." : $propositoAutor = $_POST['propositoAutor'];

    (!isset($_POST['resumen']) || empty($_POST['resumen'])) ? $errores[] = "El resumen es obligatorio." : $resumen = $_POST['resumen'];

    (!isset($_POST['estadoArticulo']) || empty($_POST['estadoArticulo'])) ? $errores[] = "Por favor indique el estado del articulo." : $estado = $_POST['estadoArticulo'];

    (!isset($_POST['fechaArticulo']) || empty($_POST['fechaArticulo'])) ? $errores[] = "La fecha es obligatoria" : $fecha = $_POST['fechaArticulo'];

    (!isset($_POST['casaEditorial']) || empty($_POST['casaEditorial'])) ? $errores[] = "La casa editorial es obligatoria." : $casaEditorial = $_POST['casaEditorial'];

    (!isset($_POST['sectorArticulo']) || empty($_POST['sectorArticulo'])) ? $errores[] = "Por favor, indique el sector del articulo.": $sector = $_POST['sectorArticulo'];

    (!isset($_POST['areaConocimiento']) || empty($_POST['areaConocimiento'])) ? $errores[] = "Por favor, indique el area de conocimiento." : $area = $_POST['areaConocimiento'];

    (!isset($_POST['tipoArticulo']) || empty($_POST['tipoArticulo'])) ? $errores[] = "El tipo de articulo es obligatorio." : $tipo = $_POST['tipoArticulo'];

    (!isset($_POST['pp_inicio']) || !isset($_POST['pp_final']) || empty($_POST['pp_inicio']) || empty($_POST['pp_final'])) ? $errores[] = "El rango de paginas el obligatorio." : ($pp_inicio = $_POST['pp_inicio'] && $pp_final = $_POST['pp_final']);

    (!preg_match($ppRegex, $pp_inicio) || !preg_match($ppRegex, $pp_final)) ? $errores[] = "El rango de las paginas debe ser un numero entero positivo." : (((int)$pp_inicio > (int)$pp_final) ? $errores[] = "El rango inicial no puede ser mayor al rango final." : $rangoPags = $pp_inicio . '-' . $pp_final);

    (!isset($_POST['indiceRegistro']) || empty($_POST['indiceRegistro'])) ? $errores[] = "El indice de registro es obligatorio."  : $indice = $_POST['indiceRegistro'];

    (!isset($_POST['issn']) || empty($_POST['issn'])) ? $errores[] = "El ISSN es obligatorio." : $issn = $_POST['issn'];


    if(!empty($errores)){
        $_SESSION['errores'] = $errores;
        header("Location: ../nuevo-articulo.php");
        exit;
    }


    $sql = "INSERT INTO articulos
    (
    userId,
    tituloArticulo,
    nombreRevista,
    autoresArticulo,
    propositoAutor,
    resumen,
    estadoArticulo,
    fechaArticulo,
    casaEditorial,
    sectorArticulo,
    areaConocimiento,
    tipoArticulo,
    rangoPaginas,
    indiceRegistro,
    issn
    ) VALUES (
    :id_res,
    :tituloArticulo,
    :nombreRevista,
    :autoresArticulo,
    :propositoAutor,
    :resumen,
    :estado,
    :fecha,
    :casaEditorial,
    :sector,
    :area,
    :tipo,
    :rangoPags,
    :indice,
    :issn
    )";

    try{
        $stmt = $conn->prepare($sql);
        $stmt -> execute([
            'id_res' => $userId,
            'tituloArticulo' => $tituloArticulo,
            'nombreRevista' => $nombreRevista,
            'autoresArticulo' => $autoresArticulo,
            'propositoAutor' => $propositoAutor,
            'resumen' => $resumen,
            'estado' => $estado,
            'fecha' => $fecha,
            'casaEditorial' => $casaEditorial,
            'sector' => $sector,
            'area' => $area,
            'tipo' => $tipo,
            'rangoPags' => $rangoPags,
            'indice' => $indice,
            'issn' => $issn

        ]);
        $res = $stmt-> rowCount();

        if($res > 0){
            header("Location: ../articulos.php");
            exit;
        }else{
            echo "Error al insertar el articulo.";
            exit;
        }

    }catch(PDOException $e){
        echo "Error: " . $e->getMessage();
        exit;
    }