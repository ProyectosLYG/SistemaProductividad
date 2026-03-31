<?php

    include_once __DIR__ . '/../build/utilities/nav.php';
    include_once __DIR__ . '/../build/config/sesssionValidation.php';
    
    if (authAdmin($_SESSION['role']) != true && authResearcher($_SESSION['role']) != true && authLeadership($_SESSION['role']) != true) {
        header("Location: ../login.php");
        exit;
    }
?>

<!-- titulo u busqueda -->
<section class="principal container">
    <div class="d-flex flex-column flex-lg-row justify-content-between align-items-center border-bottom">
        <h2 class="text-start fw-bold">Libros y capitulos</h2>

        <div class=" d-flex flex-column flex-lg-row busqueda align-items-center align-content-center">
            <div class="d-flex flex-row align-items-center justify-content-center">
                <?php if($_SESSION['role'] === 'researcher'): ?>
                <a class="boton-claro" href="nuevo-capitulo-libro.php">Nuevo capitulo en Libro</a>
                <a class="boton-claro" href="nuevo-libro.php">Nuevo Libro</a>
                <?php endif; ?>
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

    <h2 class="mt-5">Capitulos</h2>
    <!-- libros de bd -->
    <div class=" my-5 row row-cols-1 row-cols-md-2 row-cols-xl-3 g-5 justify-content-around align-items-center">
        <?php 
            $session = $_COOKIE['session'] ?? null;
            $aux = curl_init(getenv('API_SERVER'). '/api/getChapters');

            curl_setopt($aux, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($aux, CURLOPT_VERBOSE, true);
            curl_setopt($aux, CURLOPT_HTTPHEADER, [
                'Content-Type:application/json',
                'Cookie: session='.$session,
                ]);
            curl_setopt($aux, CURLOPT_HEADER, false);
            
            $response = curl_exec($aux);
            $result = json_decode($response, true);
            
            foreach($result['body'] as $res){
                include __DIR__ . "/cards/chaptersCards.php";
            }
            ?> 

    </div>
</section>

<?php include '../build/utilities/footer.php';
