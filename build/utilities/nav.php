<?php include 'head.php'; ?>

<body>        
    <header class="navegador ">
        <div class=" container d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
            
            <a href="./index.php" class="d-flex flex-row align-items-center justify-content-center  logo col">
                <h1 class="m-0 text-white fw-medium">ISC || TESCI</h1>
            </a>
            
            <nav class="enlaces mostrar col justify-content-between">
                <?php 

                $role = $_SESSION['role'];
                echo '<p>'.$role.'</p>';
                    switch($role){
                        case 'guest' :

                            echo    '<div class="d-flex justify-content-arround col nav">'.
                                        '<a href="login.php" class=" col btn btn-outline-light me-2">Login</a>'.
                                        '<a href="./build/config/closeSession.php" class=" col btn btn-warning me-2">Registrarse</a>'.
                                    '</div>';
                            break;
                        case 'student' :
                            
                            echo    '<div class="d-flex">'.
                                        '<a href="#" class=" col btn btn-outline-light me-2">Proyectos</a>'.
                                        '<a href="./build/config/closeSession.php" class=" col btn btn-warning me-2">Salir</a>'.
                                        '<a href="#" class=" col btn btn-warning me-2"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
</svg></a>'.
                                    '</div>';
                            break;
                        case 'researcher' :
                            echo    '<div class="d-flex">'.
                                        '<a href="./researchers/tesis.php">Tesis</a>'.
                                        '<a href="./researchers/articulos.php">Artículos</a>'.
                                        '<a href="./researchers/congresos.php">Congresos</a>'.
                                        '<a href="./researchers/libros.php">Libros</a>'.
                                        '<a href="./researchers/proyectos.php">Proyectos</a>'.
                                        '<a href="#">Ayuda</a>'.
                                        '<a href="../build/config/closeSession.php">Salir</a>'.
                                        '<a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
</svg></a>'.
                                    '</div>';
                            break;
                        case 'admin' :
                            echo    '<div class="d-flex">'.
                                        '<a href="./admin/tesis.php">Rendimiento General</a>'.
                                        '<a href="./admin/articulos.php">Artículos</a>'.
                                        '<a href="./admin/congresos.php">Congresos</a>'.
                                        '<a href="./admin/libros.php">Libros</a>'.
                                        '<a href="./admin/index.php">Proyectos</a>'.
                                        '<a href="#">Ayuda</a>'.
                                        '<a href="../build/config/closeSession.php">Salir</a>'.
                                        '<a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
</svg></a>'.
                                    '</div>';
                            break;
                        default:
                            
                            break;
                    }
                
                ?>

                
            </nav>
        </div>
    </header>