<?php include './build/utilities/nav.php'; ?>

<section class=" principal container mt-xxl">
<div class="d-flex flex-column flex-lg-row justify-content-between align-items-center">
            <h2 class="text-start fw-bold">Proyectos de Alumnos</h2>

            <div class=" d-flex flex-column flex-lg-row busqueda align-items-center align-content-center">
                <div class="d-flex flex-row align-items-center justify-content-center">
                    <a class="boton-claro" href="nuevo-libro.php">Nuevo Proyecto</a>
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

    <div class="d-flex flex-row row-4">
        <div class="my-5 row row-cols-1 row-cols-md-2 row-cols-xl-3 g-5 justify-content-around align-items-center">
            <div class="proyecto colorCard d-flex flex-column rounded  m-2 auto h-100">
                     <div class="mx-5">
                            <p class="fs-1 fw-bold m-0 mt-2"> Título del Proyecto:</p>
                            <p class="fs-3 m-0 mb-5">Lorem Ipsum is simply dummy text of the printing and Lorem Ipsum has been the industry's standard dummy </p>
                            <p class="fs-1 fw-bold m-0">Herramientas:</p>
                            <p class="align-content-center fs-2 m-0">Lorem Ipsum has been the industry's standard dummy </p>

                            <div class="d-flex justify-content-end mt-5 m-2">
                                    <a href="rendimiento.php" class="btn btn-warning me-2 d-flex justify-content-around fs-4 fw-medium px-5">Ver más</a>
                            </div>

                        </div>

                        <div class="mx-5">
                            <p class="fs-1 fw-bold m-0 mt-2"> Título del Proyecto:</p>
                            <p class="fs-3 m-0 mb-5">Lorem Ipsum is simply dummy text of the printing and Lorem Ipsum has been the industry's standard dummy </p>
                            <p class="fs-1 fw-bold m-0">Herramientas:</p>
                            <p class="align-content-center fs-2 m-0">Lorem Ipsum has been the industry's standard dummy </p>

                            <div class="d-flex justify-content-end mt-5 m-2">
                                    <a href="rendimiento.php" class="btn btn-warning me-2 d-flex justify-content-around fs-4 fw-medium px-5">Ver más</a>
                            </div>

                        </div>
            </div>
        </div>


    </div>
</section>
<?php include './build/utilities/footer.php'; 