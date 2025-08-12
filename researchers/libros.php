<?php 
    include '../build/utilities/nav.php';

    include '../build/config/connection.php';
    $db = connect();
    $userID = $_SESSION['user'];
?>



    <!-- titulo u busqueda -->    
    <section class="principal container">
        <div class="d-flex flex-column flex-lg-row justify-content-between align-items-center">
            <h2 class="text-start fw-bold">Libros</h2>

            <div class=" d-flex flex-column flex-lg-row busqueda align-items-center align-content-center">
                <div class="d-flex flex-row align-items-center justify-content-center">
                    <a class="boton-claro" href="nuevo-capitulo-libro.php">Nuevo capitulo en Libro</a>
                    <a class="boton-claro" href="nuevo-libro.php">Nuevo Libro</a>
                </div>

                <div class=" d-flex flex-row align-items-center justify-content-between">
                    <input class="p-2 m-0 rounded-3" id="filtro-Proyectos" type="text" placeholder="Buscar...">
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


        <!-- libros de bd -->
        <?php 
        $sql = "SELECT 
        c.evidencia1
        c.tituloCapitulo,
        u.last_name,
        u.first_name,
        c.fechaPublicacion,
        l.idLibro 
        FROM chap_book c INNER JOIN user_profile u WHERE  ";
        ?>
        <div class=" my-5 row g-5 justify-content-around align-items-center">
            <!-- Estructura de un libro -->
            <div class="proyecto d-flex flex-column radius-3" wdith="30%">
                <img src="/build/img/libroEjemplo1.webp" class="img-fluid mx-auto mt-4 rounded" width="300" height="400" alt="Imágen de libro">
                <div class="mx-5">
                    <p class="fs-1 fw-bold m-0">Libro de ejemplo</p>
                    
                    <p class="text-start m-0">13/03/23</p>
                    <p class="align-content-center fs-2 fst-italic m-0">Mtro. José Luis Camacho Campero | ISC</p>
                    <a href="#" class="boton-claro d-flex justify-content-center w-75 mx-auto">Ver libro</a>
                </div>
            </div>
            
        </div>
    </section>

<?php include '../build/utilities/footer.php'; 