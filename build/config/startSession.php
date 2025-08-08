<?php
    session_start();

    include 'connection.php';
    $conn = connect();

    $user = $_POST['user'];
    $pwd = $_POST['pwd'];
    
    $sql = "SELECT u.id,r.role FROM users u INNER JOIN user_roles r ON u.id = r.user_id WHERE u.username = ? AND u.pwd = ?;";

    $stmt =  $conn->prepare($sql);
    $stmt->execute([$email, $pwd]);
    $res = $stmt->fetch();
    if(mysqli_num_rows($res) > 0){
        $data = mysqli_fetch_assoc($res);
        $_SESSION['user'] = $data['id'];
        $_SESSION['role'] = $data['role'];
        header("Location: ../../index.php");
    }else{
        header("Location: ../../index.php");
    }