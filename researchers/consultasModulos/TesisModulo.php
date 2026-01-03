<?php

    include_once __DIR__ . '/../../build/config/connection.php';

    class moduloTesis{
        public static $conn;
        public static function init () {
            self::$conn = connect();
        }

        function getTesis( $id, $area, $role ){
            $sql = "SELECT 
                u.lastName,
                u.firstName,
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
                FROM user_profile u
                INNER JOIN tesis t 
                -- ON u.userId = t.userId 
                -- WHERE u.userId = :userId
                ";

                if( $role === 'researcher' ){
                    $sql .= " ON u.userId = t.userId WHERE u.userId = :userId ";
                }else if( $role === 'leadership' && $area === 'ISC' ){
                    $sql .= " ON u.userId = t.userId WHERE u.area = 'ISC' ORDER BY fecha DESC ";
                }else if( $role === 'admin' ){
                    $sql .= " ON u.userId = t.userId ORDER BY fecha DESC ";
                }
    
                try{
                    $stmt = self :: $conn -> prepare($sql);
                    if( $role === 'researcher' ){
                        $stmt -> execute(['userId' => $id]);
                    } else {
                        $stmt -> execute();
                    }
                    $html ='';
                } catch( PDOException $e ) {
                    $html = '<p>Hubo un problema al cargar la base de datos ' . $e -> getMessage() . '.</p>';
                    return $html;
                }
                while($res = $stmt -> fetch()){
                    $html = '
                    <div class = "col">
                        <div class="  proyecto d-flex flex-column rounded  m-2 auto h-100">
                            <img src="../researchers/thesisImages/'. $res['evidencia1'] .'" class="img-fluid mx-auto mt-4 rounded" width="300" height="400" alt="Imágen de libro">
                            <div class="mx-5">
                                <p class="fs-1 fw-bold m-0">'. $res['tituloTesis'] .'</p>
                                <p class="text-start m-0">'. $res['fecha'] .'</p>
                                <p class="align-content-center fs-2 fst-italic m-0"> '. $res['lastname'] . ' ' . $res['firstName'] .' | ISC</p>
                                <button 
                                type="button" 
                                class="boton-claro rounded d-flex justify-content-center w-75 mx-auto"
                                data-bs-toggle = "modal" 
                                data-bs-target = "#verMas'. $res['idTesis'] .'"
                                >Ver Tesis</a>
                            </div>
                        </div>
                    </div>
                    <div 
                    class="modal fade" 
                    id="verMas'. $res['idTesis'] .'" 
                    tabindex="-1" 
                    aria-labelledby="verMas'. $res['idTesis'] .'Label"
                    aria-hidden="true"
                    >
                        <div class="modal-dialog modal-dialog-centered modal-xl">
                            <div class="modal-content">
                                <div class="modal-header d-flex justify-content-between">
                                    <h5 class="modal-title fs-1">'. $res['tituloTesis'] .'</h5>
                                    <button class="btn" data-bs-toggle="popover" data-bs-html="true" data-bs-content="editar borrar">
                                        <svg width="30" height="30" fill="#000">
                                            <use xlink:href="../build/assets/sprites.svg#options-dots" />
                                        </svg>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="d-flex flex-column flex-xl-row justify-content-around">
                                        <img src="../researchers/thesisImages/'. $res['evidencia1'].'" alt="" width="300" height="auto" class="my-auto mx-auto">
                                        <div class="text-black p-2">
                                            <div class="fs-1 text-center fw-bold m-0">'. $res['tituloTesis'].'</div>
                                            <div class="fs-4 m-0 text-center ">'. $res['autores'] .'</div>
                                            <div class="row row-columns-1 row-cols-md-2 m-5 ">
                                                <div class="fs-4 m-0 "><span class="fw-bold">Sector: </span> '. $res['sector'] .'</div>
                                                <div class="fs-4 m-0 "><span class="fw-bold">Area: </span> '. $res['area'] .'</div>
                                                <div class="fs-4 m-0 "><span class="fw-bold">Grado: </span> '. $res['grado'] .'</div>
                                                <div class="fs-4 m-0 "><span class="fw-bold">Proposito: </span>'. $res['proposito'].'</div>
                                                <div class="fs-4 m-0 "><span class="fw-bold">estado: </span> '. $res['estado'] .'</div>
                                                <div class="fs-4 m-0 "><span class="fw-bold">Fecha Publicacion: </span>'. $res['fecha'] .'</div>
                                            </div>
                                            <div class="fs-4 m-5 ">'. $res['descripcion'] .'</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn button-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>';
                }
            return $html;
        }
    }




        