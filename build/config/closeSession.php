<?php 
    session_start();
    $location = "Location: ../../index.php";
    $curl = curl_init("http://localhost:3000/api/logout");

    curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl,CURLOPT_HEADER, true);

    $response = curl_exec($curl);
    $result = json_decode($response);

        if($result -> status == 200){
            $_SESSION['error'] == "No se pudo cerrar la sesion. Error: " . $result -> message;
            header($location);
            exit;
        }else{
                session_unset();
                session_destroy();
            header($location);
            exit;
        }
    exit;