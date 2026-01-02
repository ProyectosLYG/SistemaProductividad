<?php 
    include_once __DIR__ . '/../build/utilities/nav.php'; 
    include_once __DIR__ . '/../build/config/sesssionValidation.php';
    include_once __DIR__ . '/consultasModulos/CongresoModulo.php';

    if (authAdmin($_SESSION['role']) != true && authResearcher($_SESSION['role']) != true) {
        header("Location: ../login.php");
        exit;
    }
    moduloCongreso::init();
    $userId = $_SESSION['user'];
    $role = $_SESSION['role'];
    $area = $_SESSION['area'];
?>

    
    <!-- titulo u busqueda -->    
    <section class="principal container">
        <div class="d-flex flex-column flex-lg-row justify-content-between align-items-center">
            <h2 class="text-start">Congresos</h2>

            <div class=" d-flex flex-column flex-lg-row busqueda align-items-center align-content-center">
                <div class="d-flex flex-row align-items-center justify-content-center">
                    <a class="boton-claro" href="nuevo-congreso.php">Agregar</a>
                </div>

                <div class=" d-flex flex-row align-items-center justify-content-between">
                    <input class="p-2 m-0 rounded-3" id="filtro-congresos" type="text" placeholder="Buscar...">
                    <a id="buscar" href="#">
                        <svg width="30" height="30" fill="#000">
                            <use xlink:href="../build/assets/sprites.svg#search" />
                        </svg>
                    </a>
                    <a id="Filtrar" href="#">
                        <svg width="30" height="30" fill="000">
                            <use xlink:href="../build/assets/sprites.svg#filter" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- congresos de bd -->
        <div class=" my-5 row row-cols-1 row-cols-md-2 row-cols-xl-3 g-5 justify-content-around align-items-center">
            <?php 
                $modulo = new moduloCongreso();
                echo $modulo -> getCongreso( $userId, $area, $role );
            ?>    
        </div>
    </main>

<?php include '../build/utilities/footer.php'; 