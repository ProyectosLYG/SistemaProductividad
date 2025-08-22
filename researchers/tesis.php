<?php
//incluir apartado de docencia, 
//tutorias, participaciones en eventos con grupos
//vinculacion con empresas
    include '../build/utilities/nav.php'; 
    include '../build/config/connection.php';

    $conn = connect();
    $userId = $_SESSION['user'];
?>

    
    <main class="principal container">
        <div class="d-flex flex-column flex-lg-row justify-content-between align-items-center header-proyectos">
            <h2 class="text-start">Control de alumnos por tesis</h2>

            <div class=" d-flex flex-column flex-lg-row busqueda align-items-center align-content-center">
                <div class="d-flex flex-row align-items-center justify-content-center">
                    <a class="boton-claro" href="nueva-tesis.php">Nueva tesis dirigida</a>
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
            u.last_name,
            u.first_name,
            t.idTesis,
            t.tituloTesis,
            t.grado,
            t.proposito,
            t.autores,
            t.estado,
            t.fecha,
            t.descripcion,
            t.sector,
            t.area,
            t.evidencia1
            FROM tesis t 
            INNER JOIN user_profile u 
            ON u.user_id = t.id_res 
            WHERE u.user_id = :userId";

            $stmt = $conn -> prepare($sql);
            $stmt -> execute(['userId'=>$userId]);
            while($res = $stmt -> fetch()){
            ?>
                <!-- Estructura del un libro -->
                <div class = "col">
                    <div class="  proyecto d-flex flex-column rounded  m-2 auto h-100">
                        <img src="thesisImages/<?php echo $res['evidencia1'] ?>" class="img-fluid mx-auto mt-4 rounded" width="300" height="400" alt="Imágen de libro">
                        <div class="mx-5">
                            <p class="fs-1 fw-bold m-0"><?php echo $res['tituloTesis'] ?></p>
                            <p class="text-start m-0"><?php echo $res['fecha'] ?></p>
                            <p class="align-content-center fs-2 fst-italic m-0"> <?php echo $res['last_name'] . ' ' . $res['first_name'] ?> | ISC</p>
                            <button 
                            type="button" 
                            class="boton-claro rounded d-flex justify-content-center w-75 mx-auto"
                            data-bs-toggle = "modal" 
                            data-bs-target = "#verMas<?php echo $res['idTesis'] ?>"
                            >Ver libro</a>
                        </div>
                    </div>
                </div>
                <div 
                class="modal fade" 
                id="verMas<?php echo $res['idTesis'] ?>" 
                tabindex="-1" 
                aria-labelledby="verMas<?php echo $res['idTesis'] ?>Label"
                aria-hidden="true"
                >
                    <div class="modal-dialog modal-dialog-centered modal-xl">
                        <div class="modal-content">
                            <div class="modal-header d-flex justify-content-between">
                                <h5 class="modal-title fs-1"><?php echo $res['tituloTesis'] ?></h5>
                                <button class="btn" data-bs-toggle="popover" data-bs-html="true" data-bs-content="editar borrar">
                                    <svg width="30" height="30" fill="#000">
                                        <use xlink:href="../build/assets/sprites.svg#options-dots" />
                                    </svg>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="d-flex flex-column flex-xl-row justify-content-around">
                                    <img src="thesisImages/<?php echo $res['evidencia1']?>" alt="" width="300" height="auto" class="my-auto mx-auto">
                                    <div class="text-black p-2">
                                        <div class="fs-1 text-center fw-bold m-0"><?php echo $res['tituloTesis']?></div>
                                        <div class="fs-4 m-0 text-center "><?php echo $res['autores'] ?></div>
                                        <div class="row row-columns-1 row-cols-md-2 m-5 ">
                                            <div class="fs-4 m-0 "><span class="fw-bold">Sector: </span> <?php echo $res['sector'] ?></div>
                                            <div class="fs-4 m-0 "><span class="fw-bold">Area: </span> <?php echo $res['area'] ?></div>
                                            <div class="fs-4 m-0 "><span class="fw-bold">Grado: </span> <?php echo $res['grado'] ?></div>
                                            <div class="fs-4 m-0 "><span class="fw-bold">Proposito: </span><?php echo $res['proposito'] ?></div>
                                            <div class="fs-4 m-0 "><span class="fw-bold">estado: </span> <?php echo $res['estado'] ?></div>
                                            <div class="fs-4 m-0 "><span class="fw-bold">Fecha Publicacion: </span> <?php echo $res['fecha'] ?></div>
                                        </div>
                                        <div class="fs-4 m-5 "><?php echo $res['descripcion'] ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn button-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>
        </div>
    
    </main>

<?php include '../build/utilities/footer.php'; 