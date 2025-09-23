<?php

    include '../../build/config/connection.php';

    $conn = connect();

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
    $stmt -> execute(['userId' => $_GET['id']]);

    $html ='';

            while($res = $stmt -> fetch()){
            $html .= '
                    <div class=" col">
                        <div class="proyecto d-flex flex-column radius-3 p-5 mx-2 my-2 h-100">
                            <p class="fs-1 fw-bold my-0 mx-auto">'. $res['tituloArticulo'] .'</p>
                            <p class="mx-auto my-5">
                                '. $res['resumen'] .'
                            </p>
                            <p class="text-start mx-auto">'.$res['fechaArticulo'] .'</p>
                            
                            <p class="text-start mx-auto">'. $res['last_name'] .' '. $res['first_name'] .' | ISC</p>
                            <button
                            type="button"
                            class="boton-claro rounded d-flex justify-content-center w-75 mx-auto"
                            data-bs-toggle="modal"
                            data-bs-target="#verMas'. $res['idArticulo'].'"
                            >Ver mas</button>
                        </div>
                    </div>
                    <div 
                    class="modal fade"
                    id="verMas'.$res['idArticulo'].'"
                    tabindex="-1"
                    aria-labelledby="verMas'. $res['idLibro'] .'Label"
                    aria-hidden="true"
                    >
                        <div class="modal-dialog modal-dialog-centered modal-xl">
                            <div class="modal-content">
                                <div class="modal-header d-flex justify-content-between">
                                    <h5 class="modal-title fs-1">'. $res['tituloArticulo'] .'</h5>
                                    
                                </div>
                                <div class="modal-body">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <div class="text-black p-2 d-flex justify-content-center flex-column">
                                            <div class="text-center"><span class="fw-bold">Titulo articulo: </span> '. $res['tituloArticulo'] .'</div>
                                            <div class="text-center"><span class="fw-bold">Nombre revista: </span> '. $res['nombreRevista'] .'</div>
                                            <div class="text-center"><span class="fw-bold">Autores Articulo: </span> '. $res['autoresArticulo'] .'</div>
                                            <div class="row-cols-1 row-cols-xl-2">
                                                <div class="row row-cols-1 row-cols-md-2 my-5 mx-auto">
                                                    <div class="text-center"><span class="fw-bold">Proposito: </span> '. $res['propositoAutor'] .'</div>
                                                    <div class="text-center"><span class="fw-bold">Estado: </span> '. $res['estadoArticulo'] .'</div>
                                                    <div class="text-center"><span class="fw-bold">Fecha: </span> '. $res['fechaArticulo'] .'</div>
                                                    <div class="text-center"><span class="fw-bold">Casa editorial: </span> '. $res['casaEditorial'] .'</div>
                                                    <div class="text-center"><span class="fw-bold">Sector: </span> '. $res['sectorArticulo'] .'</div>
                                                    <div class="text-center"><span class="fw-bold">Area: </span> '. $res['areaConocimiento'] .'</div>
                                                    <div class="text-center"><span class="fw-bold">Tipo: </span> '. $res['tipoArticulo'] .'</div>
                                                    <div class="text-center"><span class="fw-bold">Rango paginas: </span> '. $res['rangoPaginas'] .'</div>
                                                    <div class="text-center"><span class="fw-bold">Indice Registro: </span> '. $res['indiceRegistro'] .'</div>
                                                    <div class="text-center"><span class="fw-bold"> ISSN: </span> '. $res['issn'] .'</div>
                                                </div>
                                                <div class="mx-auto">
                                                    '. $res['resumen'] .'</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button"  class="btn button-secondary p-1" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>';
            }
            
    header("Content-Type: application/json");
    echo json_encode(['mensaje'=>$html]);
