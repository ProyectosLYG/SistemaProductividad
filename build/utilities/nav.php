<?php 
    include 'head.php'; 

?>

<body>
    <header class="navegador position-fixed z-3 ">
        <div class=" container d-flex flex-column flex-xl-row flex-wrap align-items-center justify-content-between py-3 px-5 mb-4 border-bottom">
            
            <a href="../index.php" class="d-flex align-items-center justify-content-center ">
                <h1 class="m-0 text-center text-white fw-medium">ISC || TESCI</h1>
            </a>
            
            <nav class="enlaces mostrar flex-wrap justify-content-end">
                <?php 
                    switch($_SESSION['role']){
                        case 'guest' :

                            echo    '<a href="../login.php" class=" col btn btn-outline-light me-2">Login</a>'.
                                    '<a href="../build/config/closeSession.php" class=" col btn btn-warning me-2">Registrarse</a>';    
                            break;
                        case 'student' :
                            
                            echo    '<a href="#" class=" col  me-2">Proyectos</a>'.
                                    '<a href="../build/config/closeSession.php" class=" col me-2">Salir</a>'.
                                    '<a href="#" class=" col  me-2">'.
                                        '<svg width="35" height="35">'.
                                            '<use xlink:href="../build/assets/sprites.svg#profile_icon" />'.
                                        '</svg>'.
                                    '</a>';
                                    
                            break;
                        case 'researcher' :
                            echo    '<a href="../researchers/tesis.php">Tesis</a>'.
                                    '<a href="../researchers/articulos.php">Artículos</a>'.
                                    '<a href="../researchers/congresos.php">Congresos</a>'.
                                    '<a href="../researchers/libros.php">Libros</a>'.
                                    '<a href="../researchers/proyectos.php">Proyectos</a>'.
                                    '<a href="../researchers/proyectos.php">Prototipo</a>'.
                                    '<a href="../researchers/proyectos.php">Propiedad intelectual</a>'.
                                    '<a href="../researchers/proyectos.php">Memoria</a>'.
                                    '<a href="../build/config/closeSession.php">Salir</a>'.
                                    '<a href="#">'.
                                        '<svg width="35" height="35">'.
                                            '<use xlink:href="../build/assets/sprites.svg#profile_icon" />'.
                                        '</svg>'.
                                    '</a>';
                            break;
                        case 'admin' :
                            echo '<a href="../admin/tesis.php">Rendimiento General</a>'.
                                        '<a href="../admin/articulos.php">Artículos</a>'.
                                        '<a href="../admin/congresos.php">Congresos</a>'.
                                        '<a href="../admin/libros.php">Libros</a>'.
                                        '<a href="../admin/index.php">Proyectos</a>'.
                                        '<a href="#">Ayuda</a>'.
                                        '<a href="../build/config/closeSession.php">Salir</a>'.
                                        '<a href="#">'.
                                            '<svg width="35" height="35">'.
                                                '<use xlink:href="../build/assets/sprites.svg#profile_icon" />'.
                                            '</svg>'.
                                        '</a>';
                            break;
                        default:
                            
                            break;
                    }
                
                ?>

                
            </nav>
        </div>
    </header>
