<?php include '../build/utilities/nav.php'; ?>

<section class=" principal container mt-xxl">

    <div class="d-flex flex-column flex-lg-row justify-content-between align-items-center">
        <h2 class="text-start fw-bold">Proyectos</h2>

        <div class=" d-flex flex-column flex-lg-row busqueda align-items-center align-content-center">
                <div class="d-flex flex-row align-items-center justify-content-center">
                    <a class="boton-claro" href="./nuevoProyectoAlumno.php">Nuevo Proyecto</a>
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


        <div class="my-5 row row-cols-1 row-cols-md-2 row-cols-xl-3 g-5 justify-content-around align-items-center">
            <div class="col shadow colorCard d-flex flex-column rounded m-2 auto h-100">
                <div class="m-2 text-black">
                        <p class="fs-2 fw-bold m-0 m-2 text-white">“Sistema web para la gestión de citas y servicios empresariales”</p>
                        <p class="fs-4 m-0 mb-4 text-start">Plataforma en línea que permite a clientes agendar citas, administrar servicios y generar reportes de productividad para empresas de distintos sectores.</p>
                        <p class="fs-2 fw-bold m-0 text-white">Herramientas:</p>
                        <p class="align-content-cente fw-semibold r fs-4 m-0">HTML5, CSS3, JavaScript, Bootstrap</p>
                        <p class="align-content-center fw-semibold fs-4 m-0">MySQL o PostgreSQL</p>
                        <p class="align-content-center fw-semibold fs-4 m-0">PHP o Node.js</p>
                        <p class="align-content-center fw-semibold fs-4 m-0">Microsoft Projec Excel</p>
                        

                        <p class="fs-2 fw-bold m-0 text-white">Integrantes solicitados:</p>
                        <p class="align-content-center fs-4 m-0 fw-semibold">1 estudiante de Ing. Sistemas 7mo semestre</p>
                        <p class="align-content-center fs-4 m-0 fw-semibold">1 estudiante de Ing. Gestión 7mo semestre</p>


                        <div class="d-flex justify-content-end mt-5 m-2">
                            <a href="#" class="btn btn-warning me-2 d-flex justify-content-around fs-4 fw-medium px-5">Editar</a>
                        </div>

                </div>
            </div>
            <div class="col shadow colorCard d-flex flex-column rounded  m-2 auto h-100">
                <div class="m-2 text-black">
                        <p class="fs-2 fw-bold m-0 m-2 text-white">“Sistema web para la administración de recursos humanos”</p>
                        <p class="fs-4 m-0 mb-4 text-start">Plataforma en línea que facilita la gestión de personal, evaluación de desempeño y generación de reportes estratégicos para la toma de decisiones académicas y empresariales. </p>
                        <p class="fs-2 fw-bold m-0 text-white">Herramientas:</p>
                        <p class="align-content-cente fw-semibold r fs-4 m-0">HTML5, CSS3, JavaScript, Bootstrap</p>
                        <p class="align-content-center fw-semibold fs-4 m-0">MySQL o PostgreSQL</p>
                        <p class="align-content-center fw-semibold fs-4 m-0">Microsoft Projec Excel</p>

                        

                        <p class="fs-2 fw-bold m-0 text-white">Integrantes solicitados:</p>
                        <p class="align-content-center fs-4 m-0 fw-semibold">3 estudiantes de Ing. Sistemas 5to semestre</p>
                        <p class="align-content-center fs-4 m-0 fw-semibold">1 estudiante de Ing. Gestión 7mo semestre</p>


                        <div class="d-flex justify-content-end mt-5 m-2">
                            <a href="#" class="btn btn-warning me-2 d-flex justify-content-around fs-4 fw-medium px-5">Editar</a>
                        </div>

                </div>
            </div>
            
            <div class="col shadow colorCard d-flex flex-column rounded  m-2 auto h-100">
                <div class="m-2 text-black">
                        <p class="fs-2 fw-bold m-0 m-2 text-white">“Plataforma de gestión de inventarios y ventas”</p>
                        <p class="fs-4 m-0 mb-4 text-start">Sistema web que permite controlar existencias, registrar ventas y generar reportes financieros para mejorar la toma de decisiones empresariales. </p>
                        <p class="fs-2 fw-bold m-0 text-white">Herramientas:</p>
                        <p class="align-content-cente fw-semibold r fs-4 m-0">HTML5, CSS3, JavaScript, Bootstrap</p>
                        <p class="align-content-center fw-semibold fs-4 m-0">MySQL o PostgreSQL</p>
                        <p class="align-content-center fw-semibold fs-4 m-0">Microsoft Projec Excel</p>
                        <p class="align-content-center fw-semibold fs-4 m-0">PHP o Node.js</p>


                        <p class="fs-2 fw-bold m-0 text-white">Integrantes solicitados:</p>
                        <p class="align-content-center fs-4 m-0 fw-semibold">2 estudiantes de Ing. Sistemas 5to semestre</p>
                        <p class="align-content-center fs-4 m-0 fw-semibold">1 estudiante de Lic. Contabilidad 7mo semestre</p>


                        <div class="d-flex justify-content-end mt-5 m-2">
                            <a href="#" class="btn btn-warning me-2 d-flex justify-content-around fs-4 fw-medium px-5">Editar</a>
                        </div>

                </div>
            </div>


        </div>




</section>
<?php include '../build/utilities/footer.php'; 