<?php 
    session_start();
    $location = "Location: ../../index.php"; 
    setcookie('session','',[
        'expires' => time() - 3600,
        'path' => '/',
    ]);
        session_unset();
        session_destroy();
    header($location);
    exit;
