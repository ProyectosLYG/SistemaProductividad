<?php 
    session_start();

    include_once __DIR__ . "/../../GetEnv.php";
    GetEnv::getEnv();

    $userId = $_SESSION['user'];
    $_SESSION['errores'] = "";
    $location = 'Location: ./../nuevo-articulo.php';
    $locationSuccess = 'Location: ./../articulos.php';

    try{
        $cookie = $_COOKIE['session'] ?? null;
        $data = json_encode($_POST);
        $url = getEnv('API_SERVER');

        $aux = curl_init($url . '/api/createArticle');

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
    }catch(PDOException $e){
        $_SESSION['errores'] = "Error: " . $e -> getMessage();
        header($location);
        exit;
    }