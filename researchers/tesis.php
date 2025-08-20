<?php include '../build/utilities/nav.php'; ?>

    
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

        
    
    </main>

<?php include '../build/utilities/footer.php'; 