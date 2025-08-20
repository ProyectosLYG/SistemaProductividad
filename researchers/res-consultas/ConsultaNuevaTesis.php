<?php
    session_start();
    include '../../build/config/connection.php';
    $_SESSION['errores'] = "";
    $errores =[];
    $conn = connect();

    $fileSizeLimit = 3 * 1024 * 1024;
    $acceptedTypes = ['image/jpg', 'image/png', 'image/jpeg'];
    $imgQuantity = 0;
    $imageFolder = "../thesisImages";
    $imageNames = [];
    $imageName ='';
    $evidencia = ['','',''];
    $id_res = $_SESSION['user'];

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
foreach($_FILES['imgEvidencia']['error'] as $i => $error){
    if($error === UPLOAD_ERR_OK && !empty($_files['imgEvidencia']['name'][$i])){
        if(!in_array($_FILES['imgEvidencia']['type'][$i], $acceptedTypes)){
            $errores[] = "Solo se aceptan archivos de  tipo jpeg, jpg y png.";
            break;
        }else{
            if($_files['imgEvidencia']['size'][$i] > $fileSizeLimit){
                $errores[] = "El tamano de la imagen es mayor a 3 Mb.";
                break;
            }
            $imgQuantity++;
            $imageNames[] = [
                'tmp' => $_FILES['imgEvidencia']['tmp_name'][$i],
                'ext' => pathinfo($_FILES['imgEvidencia']['name'][$i], PATHINFO_EXTENSION)
            ];
        }
    }
}

if($imgQuantity > 3 || $imgQuentity < 1){
    $errores[] = "Debe subir de 1 a 3 imagenes.";
}
