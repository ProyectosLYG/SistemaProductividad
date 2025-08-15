<?php 
    include '../build/utilities/nav.php'; 
    include '../build/config/connection.php';

    $conn = connect();
    $userId = $_SESSION['user'];
?>

    
    <main class="principal contenedor">
        <div class="header-proyectos">
            <h2>Artículos</h2>
            <div class="busqueda">
                <a class="boton-claro" href="nuevo-articulo.php">Nuevo Artículo</a>
                <input id="filtro-Proyectos" type="text" placeholder="Buscar...">
                <a id="buscar-Proyectos" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#000" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                    </svg>
                </a>
                <a id="Filtrar-Proyectos" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#000" class="bi bi-funnel" viewBox="0 0 16 16">
                        <path d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5zm1 .5v1.308l4.372 4.858A.5.5 0 0 1 7 8.5v5.306l2-.666V8.5a.5.5 0 0 1 .128-.334L13.5 3.308V2z"/>
                    </svg>
                </a>
            </div>
        </div>
        
        <div class=" row row-cols-1 row-cols-md-3 g-3 justify-content-around align-items-center my-5">
            <?php 
            $sql = "SELECT 
                    a.id_res,
                    a.tituloArticulo,
                    a.nombreRevista,
                    a.autoresArticulo,
                    a.propositoAutor,
                    a.resumen,
                    a.estadoArticulo,
                    a.fechaArticulo,
                    a.casaEditorial,
                    a.sectorArticulo,
                    a.areaConocimiento,
                    a.tipoArticulo,
                    a.rangoPaginas,
                    a.indiceRegistro,
                    a.issn,
                    u.last_name, 
                    u.first_name 
                    FROM articulos a 
                    INNER JOIN user_profile u
                    ON u.user_id = a.id_res
                    WHERE u.user_id = :userId";
            $stmt = $conn -> prepare($sql);
            $stmt -> execute(['userId' => $userId]);
            while($res = $stmt -> fetch()): 
            ?>
                    <div class=" col">
                        <div class="proyecto d-flex flex-column radius-3 p-5 mx-2 my-2 h-100">
                            <p class="fs-1 fw-bold my-0 mx-auto"><?php echo $res['tituloArticulo']; ?></p>
                            <p class="mx-auto my-5">
                                <?php echo $res['resumen']; ?>
                            </p>
                            <p class="text-start mx-auto"><?php $res['fechaArticulo']; ?></p>
                            
                            <p class="text-start mx-auto"><?php echo $res['last_name'] .' '. $res['first_name'] ?> | ISC</p>
                            <button
                            type="button"
                            class="boton-claro rounded d-flex justify-content-center w-75 mx-auto"
                            data-bs-toggle="modal"
                            data-bs-target="#verMas<?php echo $res['idArticulo']?>"
                            >Ver mas</button>
                        </div>
                    </div>
                    <div 
                    class="modal fade"
                    id="verMas<?php echo $res['idArticulo']; ?>"
                    tabindex="-1"
                    aria-labelledby="verMas<?php echo $res['idLibro'] ?>Label"
                    aria-hidden="true"
                    >
                        <div class="modal-dialog modal-dialog-centered mdoal-xl">
                            <div class="modal-content">
                                <div class="modal-header d-flex justify-content-between">
                                    <h5 class="modal-title fs-1"><?php echo $res['tituloArticulo'] ?></h5>
                                    
                                </div>
                                <div class="modal-body">
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <div class="text-black p-2">
                                            <div><?php echo $res['tituloArticulo'] ?></div>
                                            <div><?php echo $res['nombreRevista'] ?></div>
                                            <div><?php echo $res['autoresArticulo'] ?></div>
                                            <div class="row row-columns-1 row-columns-md-2 m-5 ">
                                                <div class="text-center"><?php echo $res['propositoAutor'] ?></div>
                                                <div class="text-center"><?php echo $res['estadoArticulo'] ?></div>
                                                <div class="text-center"><?php echo $res['fechaArticulo'] ?></div>
                                                <div class="text-center"><?php echo $res['casaEditorial'] ?></div>
                                                <div class="text-center"><?php echo $res['sectorArticulo'] ?></div>
                                                <div class="text-center"><?php echo $res['areaConocimiento'] ?>></div>
                                                <div class="text-center"><?php echo $res['tipoArticulo'] ?></div>
                                                <div class="text-center"><?php echo $res['rangoPaginas'] ?></div>
                                                <div class="text-center"><?php echo $res['indiceRegistro'] ?></div>
                                                <div class="text-center"><?php echo $res['issn'] ?></div>
                                            </div>
                                            <div><?php echo $res['resumen'] ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button"  class="btn button-secondary p-1" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php endwhile; ?>
        </div>
    </main>

<?php include '../build/utilities/footer.php'; 