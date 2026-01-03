<?php

    include_once __DIR__ . '/../../build/config/connection.php';

    class moduloCongreso{
        public static $conn;
        public static function init () {
            self::$conn = connect();
        }

        function getCongreso( $id, $area, $role ){
            $sql = "SELECT 
                u.lastName,
                u.firstName,
                c.idCongreso,
                c.nombreCongreso,
                c.acronimo,
                c.institucion,
                c.pais,
                c.ciudad,
                c.fecha,
                c.modo,
                c.area,
                c.nivel,
                c.tipo,
                c.rol,
                c.tituloProyecto,
                c.evidencia
                FROM user_profile u
                INNER JOIN congreso c 
                -- ON u.userId = t.userId 
                -- WHERE u.userId = :userId
                ";

                if( $role === 'researcher' ){
                    $sql .= " ON u.userId = c.userId WHERE u.userId = :userId ";
                }else if( $role === 'leadership' && $area === 'ISC' ){
                    $sql .= " ON u.userId = c.userId WHERE u.area = 'ISC' ORDER BY fecha DESC ";
                }else if( $role === 'admin' ){
                    $sql .= " ON u.userId = c.userId ORDER BY fecha DESC ";
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
                            <img src="../researchers/congressImages/'. $res['evidencia'] .'" class="img-fluid mx-auto mt-4 rounded" width="300" height="400" alt="Imágen de libro">
                            <div class="mx-5">
                                <p class="fs-1 fw-bold m-0">'. $res['nombreCongreso'] .'</p>
                                <p class="text-start m-0">'. $res['fecha'] .'</p>
                                <p class="align-content-center fs-2 fst-italic m-0"> '. $res['lastname'] . ' ' . $res['firstName'] .' | ISC</p>
                                <button 
                                type="button" 
                                class="boton-claro rounded d-flex justify-content-center w-75 mx-auto"
                                data-bs-toggle = "modal" 
                                data-bs-target = "#verMas'. $res['idTesis'] .'"
                                >Ver Congreso</a>
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
                                    <h5 class="modal-title fs-1">'. $res['tituloProyecto'] .'</h5>
                                    <button class="btn" data-bs-toggle="popover" data-bs-html="true" data-bs-content="editar borrar">
                                        <svg width="30" height="30" fill="#000">
                                            <use xlink:href="../build/assets/sprites.svg#options-dots" />
                                        </svg>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="d-flex flex-column flex-xl-row justify-content-around">
                                        <img src="../researchers/congressImages/'. $res['evidencia'].'" alt="" width="300" height="auto" class="my-auto mx-auto">
                                        <div class="text-black p-2">
                                            <div class="fs-1 text-center fw-bold m-0">'. $res['tituloProyecto'].'</div>
                                            <div class="fs-4 m-0 text-center ">'. $res['institucion'] .'</div>
                                            <div class="row row-columns-1 row-cols-md-2 m-5 ">
                                                <div class="fs-4 m-0 "><span class="fw-bold">País: </span> '. $res['pais'] .'</div>
                                                <div class="fs-4 m-0 "><span class="fw-bold">Ciudad: </span> '. $res['ciudad'] .'</div>
                                                <div class="fs-4 m-0 "><span class="fw-bold">Modo: </span> '. $res['modo'] .'</div>
                                                <div class="fs-4 m-0 "><span class="fw-bold">Área: </span>'. $res['area'].'</div>
                                                <div class="fs-4 m-0 "><span class="fw-bold">Nivel: </span> '. $res['nivel'] .'</div>
                                                <div class="fs-4 m-0 "><span class="fw-bold">Rol: </span> '. $res['rol'] .'</div>
                                                <div class="fs-4 m-0 "><span class="fw-bold">Tipo: </span> '. $res['tipo'] .'</div>
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



