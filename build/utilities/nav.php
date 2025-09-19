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
                                    '<a href="../registrar.php" class=" col btn btn-warning me-2">Registrarse</a>';    
                            break;
                        case 'student' :
                            
                            echo    '<a href="#" class=" col  me-2">Proyectos</a>'.
                                    '<a href="../build/config/closeSession.php" class=" col me-2">Salir</a>'.
                                    '<div class="dropdown d-inline-block ms-3 color-bg-ul">'.
                                        '<button class="btn dropdown-toggle text-white" type="button" id="sessionOpciones" data-bs-toggle="dropdown" aria-expanded="false">'.
                                            '<svg width="35" height="35">'.
                                                '<use xlink:href="../build/assets/sprites.svg#profile_icon" />'.
                                            '</svg>'.
                                        '</button>'.
                                        '<ul class="dropdown-menu p-2"aria-labelledby="sessionOpciones">'.
                                            '<li><a class="dropdown-item m-0" href="">Ayuda</a></li>'.
                                            '<li><a class="dropdown-item m-0" href="../build/config/closeSession.php">Salir</a></li>'.
                                        '</ul>'.
                                    '</div>';
                            break;
                        case 'researcher' :
                            echo    '<a href="../researchers/tesis.php">Tesis</a>'.
                                    '<a href="../researchers/articulos.php">Artículos</a>'.
                                    '<a href="../researchers/congresos.php">Congresos</a>'.
                                    '<a href="../researchers/libros.php">Libros</a>'.
                                    '<a href="../researchers/proyectos.php">Proyectos</a>'.
                                    '<a href="../researchers/proyectos.php">Prototipo</a>'.
                                    '<a href="../researchers/proyectos.php">Propiedad intelectual</a>'.
                                    '<div class="dropdown d-inline-block ms-3 color-bg-ul">'.
                                        '<button class="btn dropdown-toggle text-white" type="button" id="sessionOpciones" data-bs-toggle="dropdown" aria-expanded="false">'.
                                            '<svg width="35" height="35">'.
                                                '<use xlink:href="../build/assets/sprites.svg#profile_icon" />'.
                                            '</svg>'.
                                        '</button>'.
                                        '<ul class="dropdown-menu p-2"aria-labelledby="sessionOpciones">'.
                                            '<li><a class="dropdown-item m-0" href="">Ayuda</a></li>'.
                                            '<li><a class="dropdown-item m-0" href="../build/config/closeSession.php">Salir</a></li>'.
                                        '</ul>'.
                                    '</div>';
                            break;
                        case 'admin' :
                            echo '<a href="../admins/rendimiento.php">Rendimiento General</a>'.
                                '<div class="dropdown d-inline-block ms-3 color-bg-ul">'.
                                    '<button class="btn dropdown-toggle text-white" type="button" id="vistaInvestigadores" data-bs-toggle="dropdown" aria-expanded="false">Investigadores</button>'.
                                    '<ul class="dropdown-menu  p-2" aria-labelledby="vistaInvestigadores">'.
                                        '<li><a class="dropdown-item m-0" href="../researchers/tesis.php">Tesis</a></li>'.
                                        '<li><a class="dropdown-item m-0" href="../researchers/articulos..php">Artículos</a></li>'.
                                        '<li><a class="dropdown-item m-0" href="../researchers/congresos.php">Congresos</a></li>'.
                                        '<li><a class="dropdown-item m-0" href="../researchers/libros.php">Libros</a></li>'.
                                        '<li><a class="dropdown-item m-0" href="../researchers/proyectos.php">Proyectos</a></li>'.
                                        '<li><a class="dropdown-item m-0" href="../researchers/propiedadIntelectual.php">Propiedad Intelectual</a></li>'.
                                    '</ul>'.
                                '</div>'.
                                '<div class="dropdown d-inline-block ms-3 color-bg-ul">'.
                                    '<button class="btn dropdown-toggle text-white" type="button" id="vistaAlumnos" data-bs-toggle="dropdown" aria-expanded="false">Alumnos</button>'.
                                    '<ul class="dropdown-menu p-2" aria-labelledby="vistaAlumnos">'.
                                        '<li><a class="dropdown-item m-0" href="">Proponer proyectos</a></li>'.
                                        '<li><a class="dropdown-item m-0" href="">Ver mis proyectos</a></li>'.
                                    '</ul>'.
                                '</div>'.
                                '<div class="dropdown d-inline-block ms-3 color-bg-ul">'.
                                    '<button class="btn dropdown-toggle text-white" type="button" id="sessionOpciones" data-bs-toggle="dropdown" aria-expanded="false">'.
                                        '<svg width="35" height="35">'.
                                            '<use xlink:href="../build/assets/sprites.svg#profile_icon" />'.
                                        '</svg>'.
                                    '</button>'.
                                    '<ul class="dropdown-menu p-2"aria-labelledby="sessionOpciones">'.
                                        '<li><a class="dropdown-item m-0" href="">Ayuda</a></li>'.
                                        '<li><a class="dropdown-item m-0" href="../build/config/closeSession.php">Salir</a></li>'.
                                    '</ul>'.
                                '</div>';
                            break;
                        default:
                            
                            break;
                    }
                
                ?>

                
            </nav>
        </div>
    </header>
