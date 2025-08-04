<?php include '../build/utilities/nav.php'; ?>


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
        <div class="">
            <!-- Estructura de un libro -->
            <div class="proyecto">
                <img src="/build/img/libroEjemplo1.webp" class="img-fluid mx-auto" width="300" height="400" alt="Imágen de libro">
                <div class="mx-5">
                    <p class="fs-1 fw-bold">Libro de ejemplo</p>
                    <p class="">
                        Praesent finibus tempus eros at placerat. Nam vehicula porta libero, vitae commodo quam. In cursus erat felis, gravida mattis felis pulvinar a. Proin commodo elit ac leo fermentum tincidunt. Nulla porttitor lacus malesuada efficitur malesuada. Sed id ligula at augue rhoncus imperdiet. Sed egestas condimentum vulputate. Aenean ultricies dignissim maximus. Ut vestibulum neque lacus, a laoreet arcu vehicula id. Donec eu fermentum felis. Sed sit amet diam neque. 
                    </p>
                    <p class="text-end">
                        13/03/23
                    </p>
                    <div class="d-flex- flex-row align-content-center justify-content-between">
                        <p class="align-content-center fs-2 fst-italic">Mtro. José Luis Camacho Campero | ISC</p>
                        <a href="#" class="boton-claro">Ver libro</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php include '../build/utilities/footer.php'; 