<?php
    session_start();
    require_once(__DIR__ . '/../build/config/connection.php');

    $conn = connect();

    ( !isset( $_POST['user'] ) || !isset( $_POST['email'] ) || !isset( $_POST['pwd'] ) || !isset( $_POST['pwdRep'] ) || !isset( $_POST['role '] ) || !isset( $_POST['area'] ) || empty( $_POST['user'] ) || empty( $_POST['email'] ) || empty( $_POST['pwd'] ) || empty( $_POST['pwdRep'] ) || empty( $_POST['role'] ) || empty( $_POST['area'] ) ) ? $error = "Es necesario llenar todos los campos." : null;
    
    if( !empty($error)  ){
        $_SESSION['error'] = $error;
        header("Location: ../");
        exit;
    }
    
    if( $pwd !== $pwdRep ){
        $_SESSION['error'] = "Las contraseñas no coinciden.";
        header( "Location: ../" );
        exit;
    }

    $user = $_POST['user'];
    $email = $_POST['email'];
    $pwd = password_hash($_POST['pwd'], PASSWORD_DEFAULT);
    $role = $_POST['role'];
    $area = $_POST['area'];
    $emailVer = 0;
    $verificationCode = bin2hex(random_bytes(16));

    $sql = "SELECT username FROM users WHERE username = :user ";

    $stmt = $conn -> prepare($sql);
    $stmt -> execute(['user' => $user]);
    $res = $stmt -> rowCount();
    if( $res !== 0 ){
        $_SESSION['error'] = "El nombre de usuario ya existe";
        header("Location ../");
        exit;
    }

    $sqlInsert = "INSERT INTO users ( username, email, email_ver, pwd ) VALUES ( :user, :email, :emailVer, :pwd )";
    $stmt = $conn -> prepare($sql);
    $stmt -> execute([
        'user' => $user,
        'email' => $email,
        'emailVer' => $emailVer,
        'pwd' => $pwd
    ]);
    $res = $stmt -> rowCount();
    if( $res > 0 ){
        $sql = "SELECT id FROM users WHERE username = :user ";
        $stmt = $conn -> prepare($sql);
        $stmt -> execute(['user' => $user]);
        $res = $stmt -> fetch();
        $id = $res['id'];
        $sql_role = "INSERT INTO user_roles ( user_id, role ) VALUES (:id, :role)";
        $stmt = $conn -> prepare($sql_role);
        $stmt -> execute([
            'id' => $id,
            'role' => $role
        ]);
        $res = $stmt -> rowCount();
        if( $res > 0 ){
            $sql_profile = "INSERT INTO user_profile ( id, area ) VALUES (:id, :area)";
            $stmt = $conn -> prepare($sql_profile);
            $stmt -> execute([
                'id' => $id,
                'area' => $area
            ]);
            $res = $stmt -> rowCount();
            if( $res > 0 ){
                ////////////////////////////
            }
        }
    }else{
        $_SESSION['error'] = "Hubo un problema al ingresar el usuario a la base de datos. Intente de nuevo más tarde";
        header("Location ../");
        exit;
    }