<?php

include '../build/utilities/nav.php';
include '../build/config/sesssionValidation.php';
include '../build/config/connection.php';
if (authAdmin($_SESSION['role']) != true && authResearcher($_SESSION['role']) != true) {
    header("Location: ../login.php");
    exit;
}
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
    <div class=" my-5 row row-cols-1 row-cols-md-2 row-cols-xl-3 g-5 justify-content-around align-items-center">

        <?php
        $sql = "SELECT 
            c.evidencia1,
            c.tituloCapitulo,
            c.tituloLibro,
            c.autores,
            c.resumen,
            c.paginas,
            c.sectorEstrategico,
            c.areaConocimiento,
            c.edicion,
            c.casaEditorial,
            c.fechaPublicacion,
            c.isbn,
            c.editorial,
            u.last_name,
            u.first_name,
            c.fechaPublicacion,
            c.idLibro 
            FROM chap_book c 
            INNER JOIN user_profile u 
            ON u.user_id = c.id_res 
            WHERE u.user_id = :userId";

        $stmt = $db->prepare($sql);
        $stmt->execute(['userId' => $userId]);
        while ($res = $stmt->fetch()) {
        ?>
            <!-- Estructura del un libro -->
            <div class="col">
                <div class="  proyecto d-flex flex-column rounded  m-2 auto h-100">
                    <img src="projectImages/<?php echo $res['evidencia1'] ?>" class="img-fluid mx-auto mt-4 rounded" width="300" height="400" alt="Imágen de libro">
                    <div class="mx-5">
                        <p class="fs-1 fw-bold m-0"><?php echo $res['tituloCapitulo'] ?></p>
                        <p class="text-start m-0"><?php echo $res['fechaPublicacion'] ?></p>
                        <p class="align-content-center fs-2 fst-italic m-0"> <?php echo $res['last_name'] . ' ' . $res['first_name'] ?> | ISC</p>
                        <button
                            type="button"
                            class="boton-claro rounded d-flex justify-content-center w-75 mx-auto"
                            data-bs-toggle="modal"
                            data-bs-target="#verMas<?php echo $res['idLibro'] ?>">Ver libro</a>
                    </div>
                </div>
            </div>
            <div
                class="modal fade"
                id="verMas<?php echo $res['idLibro'] ?>"
                tabindex="-1"
                aria-labelledby="verMas<?php echo $res['idLibro'] ?>Label"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">
                        <div class="modal-header d-flex justify-content-between">
                            <h5 class="modal-title fs-1"><?php echo $res['tituloLibro'] ?></h5>
                            <button class="btn" data-bs-toggle="popover" data-bs-html="true" data-bs-content="editar borrar">
                                <svg width="30" height="30" fill="#000">
                                    <use xlink:href="../build/assets/sprites.svg#options-dots" />
                                </svg>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="d-flex flex-column flex-xl-row justify-content-around">
                                <img src="projectImages/<?php echo $res['evidencia1'] ?>" alt="" width="300" height="auto" class="my-auto mx-auto">
                                <div class="text-black p-2">
                                    <div class="fs-1 text-center fw-bold m-0"><?php echo $res['tituloLibro'] ?></div>
                                    <div class="fs-2 text-center fw-bold m-0"><?php echo $res['tituloCapitulo'] ?></div>
                                    <div class="fs-4 m-0 text-center "><?php echo $res['autores'] ?></div>
                                    <div class="row row-columns-1 row-cols-md-2 m-5 ">
                                        <div class="fs-4 m-0 "><span class="fw-bold">Sector: </span> <?php echo $res['sectorEstrategico'] ?></div>
                                        <div class="fs-4 m-0 "><span class="fw-bold">Area: </span> <?php echo $res['areaConocimiento'] ?></div>
                                        <div class="fs-4 m-0 "><span class="fw-bold">Paginas: </span> <?php echo $res['paginas'] ?></div>
                                        <div class="fs-4 m-0 "><span class="fw-bold">Edicion: </span><?php echo $res['edicion'] ?></div>
                                        <div class="fs-4 m-0 "><span class="fw-bold">Casa editorial: </span><?php echo $res['casaEditorial'] ?></div>
                                        <div class="fs-4 m-0 "><span class="fw-bold">Editorial: </span> <?php echo $res['editorial'] ?></div>
                                        <div class="fs-4 m-0 "><span class="fw-bold">ISBN: </span> <?php echo $res['isbn'] ?></div>
                                        <div class="fs-4 m-0 "><span class="fw-bold">Fecha Publicacion: </span> <?php echo $res['fechaPublicacion'] ?></div>
                                    </div>
                                    <div class="fs-4 m-5 "><?php echo $res['resumen'] ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn button-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</section>

<?php include '../build/utilities/footer.php';
