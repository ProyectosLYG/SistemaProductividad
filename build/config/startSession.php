<?php
    session_start();

    $user = $_POST['user'];
    $pwd = $_POST['pwd'];
    
    $data = json_encode(["user" => $user, "pwd" => $pwd]);

    $aux = curl_init('http://localhost:3000/api/login');

    curl_setopt($aux, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($aux, CURLOPT_POST, true);
    curl_setopt($aux, CURLOPT_POSTFIELDS, $data);
    curl_setopt($aux, CURLOPT_HTTPHEADER,['Content-Type:application/json']);

    curl_setopt($aux, CURLOPT_HEADER, false);

    $response = curl_exec($aux);
    $result = json_decode($response);
  
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