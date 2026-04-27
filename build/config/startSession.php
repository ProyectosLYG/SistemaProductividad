<?php
    session_start();
    include_once __DIR__  . "/../../GetEnv.php";
    GetEnv::getEnv();

    $user = $_POST['user'];
    $pwd = $_POST['pwd'];
    
    $data = json_encode(["user" => $user, "pwd" => $pwd]);
    $url = getenv('API_SERVER');
    $aux = curl_init($url."/api/login");

    curl_setopt($aux, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($aux, CURLOPT_POST, true);
    curl_setopt($aux, CURLOPT_POSTFIELDS, $data);
    curl_setopt($aux, CURLOPT_HTTPHEADER,['Content-Type:application/json']);

    curl_setopt($aux, CURLOPT_HEADER, true);

    $response = curl_exec($aux);

    $headerSize = curl_getinfo($aux, CURLINFO_HEADER_SIZE);

    $headers = substr($response, 0 , $headerSize);
    $body = substr($response, $headerSize);

    preg_match('/Set-Cookie:\s*([^\r\n]+)/i',  $headers, $matches);

    $cookie = $matches[1];

    header("Set-Cookie: $cookie");

    $result = json_decode($body);
    
    if($result -> status == 200){
        $_SESSION['user'] = $result -> body -> user -> user;
        $_SESSION['role'] = $result -> body -> user -> role;
        $_SESSION['area'] = $result -> body -> user -> area;
        header("Location: ../../index.php");
    }else{
        $_SESSION['error'] = $result -> message;
        header("Location: ../../login.php");
        exit;
    }