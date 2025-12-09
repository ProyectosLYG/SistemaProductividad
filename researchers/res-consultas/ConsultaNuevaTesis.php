<?php
    session_start();
    include '../../build/config/connection.php';
    $_SESSION['errores'] = "";
    $errores =[];
    $conn = connect();

    $fileSizeLimit = 3 * 1024 * 1024 ;
    $acceptedTypes = ['image/jpg', 'image/png', 'image/jpeg'];
    $imgQuantity = 0;
    $thesisFolder = "../thesisImages";
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

    foreach($_FILES['imgEvidencia']['error'] as $i => $error){
        if($error === UPLOAD_ERR_OK && !empty($_FILES['imgEvidencia']['name'][$i])){
            if(!in_array($_FILES['imgEvidencia']['type'][$i], $acceptedTypes)){
                $errores[] = "Solo se aceptan archivos de  tipo jpeg, jpg y png.";
                break;
            }else{
                if($_FILES['imgEvidencia']['size'][$i] > $fileSizeLimit){
                    $errores[] = "El tamano de la imagen es mayor a 3 Mb.";
                    break;
                }
            }
            $imgQuantity++;
            $imageNames[] = [
                'tmp' => $_FILES['imgEvidencia']['tmp_name'][$i],
                'ext' => pathinfo($_FILES['imgEvidencia']['name'][$i], PATHINFO_EXTENSION)
            ];
        }
    }

    if($imgQuantity > 3 || $imgQuantity < 1){
        $errores[] = "Debe subir de 1 a 3 imagenes.";
    }
    


    //validacion de datos
    (!isset($_POST['tituloTesis']) || empty($_POST['tituloTesis'])) ? 
        $errores[] = "El titulo de la tesis es obligatorio." : 
        $tituloTesis = $_POST['tituloTesis'];

    (!isset($_POST['gradoTesis']) || empty($_POST['gradoTesis'])) ?
        $errores[] = "Debe indicar el grado de la tesis." : 
        $grado = $_POST['gradoTesis'];

    (!isset($_POST['propositoTesis']) || empty($_POST['propositoTesis'])) ? 
        $errores[] = "Debe indicar el proposito de a tesis." : 
        $proposito = $_POST['propositoTesis'];
    
    (!isset($_POST['autores']) || empty($_POST['autores'])) ? 
        $errores[] = "Debe indicar al menos un autor." : 
        $autores = $_POST['autores'];

    (!isset($_POST['estado']) || empty($_POST['estado'])) ? 
        $errores[] = "Debe indicar el estado de la tesis." :
        $estado = $_POST['estado'];

    (!isset($_POST['fecha']) | empty($_POST['fecha'])) ? 
        $errores[] = "Debe indicar la fecha." :
        $fecha = $_POST['fecha'];

    (!isset($_POST['descripcion']) || empty($_POST['descripcion'])) ?
        $errrores[] = "Debe ingresar una descripcion de la tesis." :
        $descripcion = $_POST['descripcion'];

    (!isset($_POST['sector']) || empty($_POST['sector'])) ? 
        $errores[] = "Debe indicar el Sector Estrategico." :
        $sector = $_POST['sector'];
    
    (!isset($_POST['area']) || empty($_POST['area'])) ? 
        $errores[] = "Debe indicar el Area de Conocimiento." :
        $area = $_POST['area'];
    
    if(!empty($errores)){
        $_SESSION['errores'] = $errores;
        header("Location: ../nueva-tesis.php");
        exit;
    }

/*
    tituloTesis
    gradoTesis
    propositoTesis
    autores
    estado
    Fecha
    descripcion
    sector
    area
    imgEvidencia[]
*/
    $sql = "INSERT INTO tesis
    (
        userId,
        tituloTesis,
        grado,
        proposito,
        autores,
        estado,
        fecha,
        descripcion,
        sector,
        area,
        evidencia1,
        evidencia2,
        evidencia3    
    )VALUES (
        :id_res,
        :tituloTesis,
        :grado,
        :proposito,
        :autores,
        :estado,
        :fecha,
        :descripcion,
        :sector,
        :area,
        :evidencia1,
        :evidencia2,
        :evidencia3
    );";
    try{
        if(!is_dir($thesisFolder)){
            mkdir($thesisFolder);
        }
        foreach($imageNames as $i => $temp){
            $imageTmpName = md5(uniqid((rand()),true));
            $imageName = $imageTmpName .'.'.$temp['ext'];
            move_uploaded_file($temp['tmp'], $thesisFolder .'/'. $imageName);
            $evidencia[$i] = $imageName;
        }
        $stmt = $conn->prepare($sql);
        $stmt -> execute([
            'id_res' => $id_res,
            'tituloTesis' => $tituloTesis,
            'grado' => $grado,
            'proposito' => $proposito,
            'autores' => $autores,
            'estado' => $estado,
            'fecha' => $fecha,
            'descripcion' => $descripcion,
            'sector' => $sector,
            'area' => $area,
            'evidencia1' => $evidencia[0],
            'evidencia2' => $evidencia[1],
            'evidencia3' =>  $evidencia[2]
        ]);
        $res = $stmt -> rowCount();
        if($res > 0){
            header("Location: ../tesis.php");
            exit;
        }else{
            echo "Error al insertar la Tesis. Favor de comunicarse con soporte.";
            exit;
        }
    }catch(PDOException $error){
        echo "Error: " . $error -> getMessage();
        exit;
    }