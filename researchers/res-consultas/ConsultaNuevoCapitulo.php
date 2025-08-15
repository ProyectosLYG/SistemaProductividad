<?php
    session_start();
    include '../../build/config/connection.php';
    $_SESSION['errores'] = "";
    $errores = [];
    $conn = connect();

    //RegEx para validar campos de isbn y páginas
    $ppRegex = "/^(?:[1-9][0-9]{0,3})$/";
    $isbnRegex = "/^(?:\d{1,5}[ -]\d{1,7}[ -]\d{1,7}[ -][0-9X]|(978|979)[ -]\d{1,5}[ -]\d{1,7}[ -]\d{1,6}[ -]\d)$/";
    $fileSizeLimit = 3 * 1024 * 1024;
    $acceptedTypes = ['image/jpg', 'image/png', 'image/jpeg'];
    $imgQuantity = 0;
    $imageFolder = "../projectImages";
    $imageNames = [];
    $imageName ='';
    $evidencia = ['','',''];
    $id_res = $_SESSION['user'];

    // echo "<pre>";
    // var_dump($_POST);
    // echo "</pre>";
    // echo "<br>";
    // echo "<pre>";
    // var_dump($_FILES);
    // echo "</pre>";
    // exit;
    //validacion de archivos

    foreach($_FILES['imgCapituloLibro']['error'] as $i => $error){
        if($error === UPLOAD_ERR_OK && !empty($_FILES['imgCapituloLibro']['name'][$i])){
            if(!in_array($_FILES['imgCapituloLibro']['type'][$i], $acceptedTypes)){
                $errores[] = "Solo se aceptan archivos de tipo jpeg y png.";
                break;
            }else{
                if($_FILES['imgCapituloLibro']['size'][$i] > $fileSizeLimit){
                    $errores[] = "El tamaño del archivo no debe exceder los 5MB.";
                    break;
                }
            }
            $imgQuantity ++;
            $imageNames[] = [
                'tmp' => $_FILES['imgCapituloLibro']['tmp_name'][$i] , 
                'ext' => pathinfo($_FILES['imgCapituloLibro']['name'][$i], PATHINFO_EXTENSION)];
        }
    }
    if($imgQuantity > 3 || $imgQuantity < 1){
        $errores[] = "Debe subir de 1 a 3 imágenes.";
    }
    

    //validacion de campos
    (!isset($_POST['tituloCapitulo']) || empty($_POST['tituloCapitulo'])) ? $errores[] = "El titulo del capítulo es obligatorio." : $tituloCapitulo = $_POST['tituloCapitulo']; 

    (!isset($_POST['resumenCapitulo']) || empty($_POST['resumenCapitulo'])) ? $errores[] = "El resumen del libro es obligatorio." : $resumen = $_POST['resumenCapitulo'];

    (!isset($_POST['autoresCapitulo']) || empty($_POST['autoresCapitulo'])) ? $errores[] = "Los autores del capítulo son obligatorios." : $autores = $_POST['autoresCapitulo'];

    (!isset($_POST['posicionAutorCapitulo'])) ? $posicion = '0' : $posicion = $_POST['posicionAutorCapitulo'];

    (!isset($_POST['pp_inicio']) || !isset($_POST['pp_final']) || empty($_POST['pp_inicio']) || empty($_POST['pp_final'])) ? $errores[] = "El rango de páginas es obligatorio" : ($pp_inicio = $_POST['pp_inicio']) && ($pp_final = $_POST['pp_final']);

    (!preg_match($ppRegex, $pp_inicio) || !preg_match($ppRegex, $pp_final)) ? $errores[] = "El rango de las páginas debe ser un número entero positivo." : (($pp_inicio > $pp_final) ? $errores[] = "El inicio de las paginas no puede ser mayor al final." : $rangoPags = $pp_inicio . '-' . $pp_final);

    (!isset($_POST['sectorEstrategico']) || empty($_POST['sectorEstrategico'])) ? $errores[] = "El sector estratégico es obligatorio." : $sector = $_POST['sectorEstrategico'];

    (!isset($_POST['areaConocimiento']) || empty($_POST['areaConocimiento'])) ? $errores[] = "El area de conocimiento es oblligatorio." : $area = $_POST['areaConocimiento'];

    (!isset($_POST['tituloLibro']) || empty($_POST['tituloLibro'])) ? $errores[] = "El titulo del libro es obligatorio." : $tituloLibro = $_POST['tituloLibro'];

    (!isset($_POST['edicion']) || empty($_POST['edicion'])) ? $errores[] = "Es necesario indicar la edicion." : $edicion = $_POST['edicion'];

    (!isset($_POST['casaEditorial']) || empty($_POST['casaEditorial'])) ? $errores[] = "Es necesario indicar la casa editorial." : $casaEditorial = $_POST['casaEditorial'];

    (!isset($_POST['fechaPublicacion']) || empty($_POST['fechaPublicacion'])) ? $errores[] = "La fecha de publicación es obligatoria." : $fechaPublicacion = $_POST['fechaPublicacion'];

    (!isset($_POST['isbn']) || empty($_POST['isbn'])) ? $errores[] = "El ISBN es obligatorio." :  $isbn = $_POST['isbn'];

    $editorial = $_POST['editorial'] ?? '';

    if(empty($errores)){
        if(!is_dir($imageFolder)){
            mkdir($imageFolder);
        }
        foreach($imageNames as $i => $temp){
            $imageTmpName = md5(uniqid((rand()), true));
            $imageName = $imageTmpName . '.' . $temp['ext'];
            move_uploaded_file($temp['tmp'], $imageFolder . '/' . $imageName );
            $evidencia[$i] = $imageName;
        }
    }else{
        $_SESSION['errores'] = $errores;
        header("Location: ../nuevo-capitulo-libro.php");
        exit;
    }

    
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
            'evidencia1' => $evidencia[0],
            'evidencia2' => $evidencia[1],
            'evidencia3' => $evidencia[2]
        ]);
        $res = $stmt -> rowCount();
        if($res > 0){
            header("Location: ../libros.php");
            exit;
        }else{
            echo "Error al insertar el capítulo del libro.";
            exit;
        }
    }catch(PDOException $e){
        echo "Error: " . $e->getMessage();
        exit;
    }
        
    