<?php 
    include '../build/utilities/nav.php';

    include '../build/config/connection.php';
    $db = connect();
    $userId = $_SESSION['user'];
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
        <div class=" my-5 row row-cols-1 row-cols-md-3 g-5 justify-content-around align-items-center">

            <?php 
            $sql = "SELECT 
            c.evidencia1,
            c.tituloCapitulo,
            u.last_name,
            u.first_name,
            c.fechaPublicacion,
            c.idLibro 
            FROM chap_book c 
            INNER JOIN user_profile u 
            ON u.user_id = c.id_res 
            WHERE u.user_id = :userId";

            $stmt = $db -> prepare($sql);
            $stmt -> execute(['userId'=>$userId]);
            while($res = $stmt -> fetch()){
            ?>
                <!-- Estructura de un libro -->
                 <div class = "col">
                     <div class="  proyecto d-flex flex-column radius-3  m-2 auto h-100">
                         <img src="projectImages/<?php echo $res['evidencia1'] ?>" class="img-fluid mx-auto mt-4 rounded" width="300" height="400" alt="Imágen de libro">
                         <div class="mx-5">
                             <p class="fs-1 fw-bold m-0"><?php echo $res['tituloCapitulo'] ?></p>
                             
                             <p class="text-start m-0"><?php echo $res['fechaPublicacion'] ?></p>
                             <p class="align-content-center fs-2 fst-italic m-0"> <?php echo $res['last_name'] . ' ' . $res['first_name'] ?> | ISC</p>
                             <a href="#" id="<?php echo $res['idLibro'] ?>" class="boton-claro d-flex justify-content-center w-75 mx-auto">Ver libro</a>
                        </div>
                    </div>
                </div>
            <?php }?>
        </div>
    </section>

<?php include '../build/utilities/footer.php'; 