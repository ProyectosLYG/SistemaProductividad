<?php
    session_start();

    include 'connection.php';
    $conn = connect();

    $user = $_POST['user'];
    $pwd = $_POST['pwd'];
    
    $sql = 
    "SELECT u.id,r.role 
    FROM users u 
    INNER JOIN user_roles r 
    ON u.id = r.user_id 
    WHERE u.username = ? 
    AND u.pwd = ?;";

    $stmt =  $conn->prepare($sql);
    $stmt->execute([$user, $pwd]);
    $res = $stmt->fetch();
    if($res){
        $_SESSION['user'] = $res['id'];
        $_SESSION['role'] = $res['role'];
        header("Location: ../../index.php");
    }else{
        header("Location: ../../login.php");
        exit;
    }