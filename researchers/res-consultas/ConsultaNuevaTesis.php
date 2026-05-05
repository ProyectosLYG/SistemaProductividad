<?php
    session_start();

    include_once __DIR__ . "/../../GetEnv.php";
    GetEnv::getEnv();

    $_SESSION['errores'] = "";
    $errores =[];

    $location = 'Location: ../nueva-tesis.php';
    $locationSuccess = 'Location: ../tesis.php';

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
    

    if(!empty($errores)){
        $_SESSION['errores'] = $errores;
        header($location);
        exit;
    }

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
        
        $cookie = $_COOKIE['session'] ?? null;
        $_POST['evidencia'] = $imageName;
        $data = json_encode($_POST);
        $url = getEnv('API_SERVER');

        $aux = curl_init($url . '/api/createThesis');

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
    }catch(PDOException $error){
        $_SESSION['errores'] = "Error: " . $error -> getMessage();
        header($location);
        exit;
    }