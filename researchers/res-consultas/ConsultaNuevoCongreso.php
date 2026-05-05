<?php
    session_start();

    include_once __DIR__ . "/../../GetEnv.php";
    GetEnv::getEnv();

    $_SESSION['errores'] = "";
    $errores = [];

    $id_res = $_SESSION['user'];
    $fileSizeLimit = 3 * 1024 * 1024;
    $folderName = '../congressImages';
    $acceptedImages =  ['image/jpeg', 'image/jpg', 'image/png'];
    $imageTmpName = '';
    $imageName = '';
    $imageNames = [];
    $imgQuantity = 0;

    $location = 'Location: ./../nuevo-congreso.php';
    $locationSuccess = 'Location: ./../congresos.php';

    // echo '<pre>';
    // echo var_dump($_FILES);
    // echo '</pre>';
    // echo '<br>';
    // echo '<pre>';
    // echo var_dump($_POST);
    // echo'</pre>';
    // exit;
    
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
            'tmp' => $_FILES['evidencia']['tmp_name'][$i],
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

    try{
        if(!is_dir($folderName)){
            mkdir($folderName);
        }
        foreach($imageNames as $i => $tmp){
            $imageTmpName = md5(uniqid((rand()) , true ));
            $imageName = $imageTmpName .'.'. $tmp['ext'];
            move_uploaded_file($tmp['tmp'], $folderName .'/'.$imageName);
            $evidencia[$i] = $imageName;
        }
        $cookie = $_COOKIE['session'] ?? null;
        $_POST['evidencia'] = $imageName;
        $data = json_encode($_POST);
        $url = getEnv('API_SERVER');

        $aux = curl_init($url . '/api/createCongress');

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
            $_SESSION['errores'] = $result['message'];
            header($location);
            exit;
        }
    }catch(Exception $error){
        $_SESSION['errores'] = "Error: " . $error -> getMessage();
        header($location);
        exit;
    }