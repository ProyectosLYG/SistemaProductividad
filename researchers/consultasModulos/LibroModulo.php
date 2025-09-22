<?php

include __DIR__.'/../../build/config/connection.php';



class moduloLibro {
    public static $conn;
    public static function init (){
        self::$conn = connect();
    }
    function getBook( $id, $area, $role ){
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
            u.area,
            c.fechaAdicion,
            c.idLibro 
            FROM user_profile u 
            INNER JOIN  chap_book c 
            ";

        if( $role === 'researcher' ){
            $sql .= " ON u.user_id = c.id_res WHERE u.user_id = :id ";
        }else if( $role === 'leadership' && $area === 'ISC' ){
            $sql .= " ON u.user_id = c.id_res WHERE u.area = 'ISC' ORDER BY fechaAdicion DESC ";
        }else if( $role === 'admin' ){
            $sql .= " ON u.user_id = c.id_res ORDER BY fechaAdicion DESC ";
        }
        $stmt = self::$conn -> prepare($sql);
        if( $role === 'researcher' ){
            $stmt -> execute(['id' => $id]);
        }else{
            $stmt -> execute();
        }
        $html ='';
        while ($res = $stmt->fetch()) {
            $periodo = substr($res['fechaAdicion'],0 , 4);
            substr($res['fechaAdicion'], 5,2) >= 7 ? $periodo .= '-2' : $periodo .= '-1';
            $html .= '
            <div class="col">
                <div class="  proyecto d-flex flex-column rounded  m-2 auto h-100" style="">
                    <img src="projectImages/'.$res['evidencia1'].'" class="img-fluid mx-auto mt-4 rounded" style="max-height:420px" width="300" height="400px" alt="Imágen de libro">
                    <div class="mx-5">
                        <p class="text-center fs-1 fw-bold m-0">' . $res['tituloCapitulo'] . '</p>
                        <p class="text-start m-0"><span class="fw-bold">Autor Capitulo: </span> ' . $res['last_name']  . ' ' . $res['first_name'] . '</p>
                        <p class="text-start m-0"><span class="fw-bold">Area: </span> ' . $res['area'].'</p>
                        <p class="text-start m-0"><span class="fw-bold">Publicación: </span>' . $res['fechaPublicacion'] . '</p>
                        <p class="text-start m-0"><span class="fw-bold">Periodo: </span>' . $periodo . '</p>
                        <p class="align-content-center fs-2 fst-italic m-0">' . $res['last_name'] . ' ' . $res['first_name'] . ' | ' . $res['area'] .'</p>
                        <button
                            type="button"
                            class="boton-claro bg-yellow-500 rounded d-flex justify-content-center w-75 mx-auto"
                            data-bs-toggle="modal"
                            data-bs-target="#verMas' . $res['idLibro'] . '">Ver libro</a>
                    </div>
                </div>
            </div>
            <div
                class="modal fade"
                id="verMas' . $res['idLibro'] . '"
                tabindex="-1"
                aria-labelledby="verMas' . $res['idLibro'] .'Label"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">
                        <div class="modal-header d-flex justify-content-between">
                            <h5 class="modal-title fs-1">' .  $res['tituloLibro'] . '</h5>
                            <button class="btn" data-bs-toggle="popover" data-bs-html="true" data-bs-content="editar borrar">
                                <svg width="30" height="30" fill="#000">
                                    <use xlink:href="../build/assets/sprites.svg#options-dots" />
                                </svg>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="d-flex flex-column flex-xl-row justify-content-around">
                                <img src="projectImages/' .  $res['evidencia1'] . '" alt="" width="300" height="auto" class="my-auto mx-auto">
                                <div class="text-black p-2">
                                    <div class="fs-1 text-center m-0">Libro: <span class="fw-bold">' . $res['tituloLibro'] . '</span></div>
                                    <div class="fs-2 text-center m-0"> Capitulo: <span class="fw-bold"> ' . $res['tituloCapitulo'] . '</span></div>
                                    <div class="fs-4 m-0 text-center "> ' . $res['last_name'] .' '. $res['first_name'] . '</div>
                                    <div class="row row-columns-1 row-cols-md-2 m-5 ">
                                        <div class="fs-4 m-0 "><span class="fw-bold">Sector: </span>' . $res['sectorEstrategico'] . '</div>
                                        <div class="fs-4 m-0 "><span class="fw-bold">Area: </span> ' . $res['areaConocimiento'] . '</div>
                                        <div class="fs-4 m-0 "><span class="fw-bold">Paginas: </span> ' . $res['paginas'] . '</div>
                                        <div class="fs-4 m-0 "><span class="fw-bold">Edicion: </span> ' . $res['edicion'] . '</div>
                                        <div class="fs-4 m-0 "><span class="fw-bold">Casa editorial: </span>' . $res['casaEditorial'] . '</div>
                                        <div class="fs-4 m-0 "><span class="fw-bold">Editorial: </span> ' . $res['editorial'] . '</div>
                                        <div class="fs-4 m-0 "><span class="fw-bold">ISBN: </span> '. $res['isbn'] . '</div>
                                        <div class="fs-4 m-0 "><span class="fw-bold">Fecha Publicacion: </span> ' . $res['fechaPublicacion'] . '</div>
                                    </div>
                                    <div class="fs-4 m-5 ">' . $res['resumen'] . '</div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn button-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            ';
        } 
        return $html;
    }

}