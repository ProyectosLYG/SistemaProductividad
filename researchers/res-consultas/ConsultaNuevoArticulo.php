<?php 
    include "../../config/connection.php";

    $db = connect();
    $userId = $_SESSION['user'];
    $errores[] = "";
    $ppRegex = "/^(?:[1-9][0-9]{0,3})$/";

    