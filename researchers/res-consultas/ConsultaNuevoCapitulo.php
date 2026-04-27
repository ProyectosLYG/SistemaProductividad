<?php
    session_start();

    include_once __DIR__ . "/../../GetEnv.php";
    GetEnv::getEnv();

    $_SESSION['errores'] = "";

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
    $location = 'Location: ./../nuevo-capitulo-libro.php';
    $locationSuccess = 'Location: ./../libros.php';

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
        
        $cookie = $_COOKIE['session'] ?? null;
        $_POST['evidencia'] = $imageName;
        $data = json_encode($_POST);
        $url = getEnv('API_SERVER');

        $aux = curl_init($url . '/api/createChapter');

        curl_setopt($aux, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($aux, CURLOPT_POST, true);
        curl_setopt($aux, CURLOPT_POSTFIELDS, $data);
        curl_setopt($aux, CURLOPT_HTTPHEADER, [
            'Content-Type:application/json',
            'Cookie: session=' . $cookie
            ]);

        curl_setopt($aux, CURLOPT_HEADER, false);

        $response = curl_exec($aux);
        $result = json_decode($response, true);

        if($result && $result['status'] == 200){
            $_SESSION['success'] = true;
            header($locationSuccess);
            exit;
        }else{
            $_SESSION['error'] = $result['message'];
            header($location);
            exit;
        }
    }else{
        $_SESSION['errores'] = $errores;
        header("Location: ../nuevo-capitulo-libro.php");
        exit;
    }