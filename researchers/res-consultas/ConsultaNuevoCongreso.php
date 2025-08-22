<?php
    session_start();
    $id_res = $_SESSION['user'];
    $fileSizeLimit = 3 * 1024 * 1024;
    $folderName = '../congressImages';
    $acceptedImages =  ['image/jpeg', 'image/jpg', 'image/png'];
    $imageTmpName = '';
    $imageName = '';
    $imageNames = [];

    echo '<pre>';
    echo var_dump($_FILES);
    echo '</pre>';
    echo '<br>';
    echo '<pre>';
    echo var_dump($_POST);
    echo'</pre>';
    exit;
    

    (!isset($_POST['nombreCongreso']) || empty($_POST['nombreCongreso'])) ?
        $errores[] = "El nombre del congreso es obligatorio." :
        $nombreCongreso = $_POST['nombreCongreso'];

    (!isset($_POST['acronimo']) || empty($_POST['acronimo'])) ?
        $errores[] = "El acrónimo es obligatorio." :
        $acronimo = $_POST['acronimo'];
    (!isset($_POST['institucion']) || empty($_POST['institucion'])) ?
        $errores[] = "El nombre de la institución es obligatoria.":
        $institucion = $_POST['institucion'];

    (!isset($_POST['pais']) || empty($_POST['pais'])) ? 
        $errores[] = "El pais del conf" :
        $pais = $_POST['pais'];
    
    (!isset($_POST['ciudad']) || empty($_POST['ciudad'])) ?
        $errores[] = "La ciudad del evento es obligatoria.":
        $ciudad = $_POST['ciudad'];

    (!isset($_POST['modo']) || empty($_POST['modo'])) ?
        $errores[] = "Debes ingresar el modo del congreso." :
        $modo = $_POST['modo'];
    (!isset($_POST['area']) || empty($_POST['area'])) ?
        $errores[] = "Debe ingresar el area del tema." :
        $area = $_POST['area'];

    (!isset($_POST['nivel']) || empty($_POST['nivel'])) ?
        $errores[] = "Debe ingresar a que nivel fue el congreso." :
        $nivel = $_POST['nivel'];

    (!isset($_POST['fecha']) || empty($_POST['fecha'])) ?
        $errores[] = "Debe ingresar la fecha del evento." :
        $fecha = $_POST['fecha'];
    
    (!isset($_POST['rol']) || empty($_POST['rol'])) ?
        $errores[] = "Es necesario indicar el rol que desarrollo." :
        $rol = $_POST['rol'];
    
    (!isset($_POST['tituloProyecto']) || empty($_POST['tituloProyecto'])) ?
        $errores[] = "El titulo del proyecto es obligatorio.":
        $tituloProyecto = $_POST['tituloProyecto'];

    // imgs validation
    foreach($_FILES['evidencia']['error'] as $i => $error){
        if($error === UPLOAD_ERR_OK &&  !empty($_FILES['evidencia']['name'][$i])){
            if(!in_array($_FILES['evidencia']['type'][$i], $acceptedImages)){
                $errores[] = "Solo son validos los archivos tipo: jpeg, jpg y png.";
                break;
            }
            if($_FILES['evidencia']['size'][$i] > $fileSizeLimit){
                $errores[] = "Solo se aceptan imagenes menores a 3Mb.";
                break;
            }
        }
        $imgQuantity++;
        $imageNames[] = [
            'tmp' => $_FILES['evidencia']['tmp'][$i],
            'ext' => pathInfo($_FILES['evidencia']['name'][$i], PATHINFO_EXTENSION) 
        ];
    }
    if($imgQuantity > 3 || $imgQuantity < 1){
        $errores[] = "Es necesario subir solo de 1 a 3 imagenes.";
    }

    if(!empty($errores)){
        $_SESSION['errores'] = $errores;
        header("Location: ../nuevo-congreso.php");
        exit;
    }

    $sql = "INSERT INTO congreso (
    id_res,
    nombreCongreso,
    acronimo,
    institucion,
    pais,
    ciudad,
    modo,
    area,
    nivel,
    fecha,
    rol,
    tituloProyecto,
    tipo,
    evidencia1,
    evidencia2,
    evidencia3
    ) VALUES (
    :id_res,
    :nombreCongreso,
    :acronimo,
    :institucion,
    :pais,
    :ciudad,
    :modo,
    :area,
    :nivel,
    :fecha,
    :rol,
    :tituloProyecto,
    :tipo
    );";
    try{
        if(!is_dir($folderName)){
            mkdir($folderName);
        }
        foreach($imageNames as $i => $tmp){
            $imageTmpName = md5(uniqid((rand()) , true ));
            $imageName = $imageName .'.'. $tmp['ext'];
            move_uploaded_file($tmp['tmp'], $folderName .'/'.$imageName);
            $evidencia[$i] = $imageName;
        }
        $stmt = $conn -> prepare($sql);
        $stmt -> execute([
            'id_res' => $id_res,
            'nombreCongreso' => $nombreCongreso,
            'acronimo' => $acronimo,
            'institucion' => $institucion,
            'pais' => $pais,
            'ciudad' => $ciudad,
            'modo' => $modo,
            'area' => $area,
            'nivel' => $nivel,
            'fecha' => $fecha,
            'rol' => $rol,
            'tituloProyecto' => $tituloProyecto,
            'tipo' => $tipo
            ]);
        $res = $stmt -> fetch();
        if($res > 0){
            header("Location: ../congresos.php");
            exit;
        }
    }catch(PDOException $error){
        echo "Error: " . $error -> getMessage();
    }

/*
    nombreCongreso
    acronimo
    institucion
    pais
    ciudad
    modo
    area
    nivel
    fecha
    rol
    tituloProyecto
    tipo
*/