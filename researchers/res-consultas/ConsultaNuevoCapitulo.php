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

/**     echo "<pre>";
    var_dump($_POST);
    echo "</pre>";
    echo "<br>";
    echo "<pre>";
    var_dump($_FILES);
    echo "</pre>";
    exit;
 */

    //validacion de archivos

    foreach($_FILES['imgCapituloLibro']['error'] as $i => $error){
        if($error === UPLOAD_ERR_OK && !empty($_FILES['imgCapituloLibro']['name'][$i])){
            if(!in_array($_FILES['imgCapituloLibro']['type'][$i], $acceptedTypes)){
                $errores[] = "Solo se aceptan archivos de tipo jpeg y png.";
                break;
            }else{
                if($_FILES['imgCapituloLibro']['size'][$i] > $fileSizeLimit){
                    $errores[] = "El tamaño del archivo no debe exceder los 3MB.";
                    break;
                }
            }
            $imgQuantity ++;
            $imageNames[] = [
                'tmp' => $_FILES['imgCapituloLibro']['tmp_name'][$i] , 
                'ext' => pathinfo($_FILES['imgCapituloLibro']['name'][$i], PATHINFO_EXTENSION)];
        }else{
            $errores[] = 'Una imagen tiene no es valida.';
        }
    }
    if($imgQuantity > 3 || $imgQuantity < 1){
        $errores[] = "Debe subir de 1 a 3 imágenes.";
    }
    


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