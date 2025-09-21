<?php include './build/utilities/nav.php'; ?>

<section class="p-3"></section>
<section class="mt-xxll"></section>
<div>
<section class="mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card p-4 shadow-sm" style="background-color: #e0f7fa;">
                <div class="row align-items-center">
                    <div class="col-md-4 text-center">
                        <img src="build/img/usuario.png" class="rounded-circle img-fluid mb-3" alt="Foto del Investigador">
                    </div>
                    <div class="col-md-8">
                        <h2 class="h4 fs-3 mb-1">Dr. Alejandro Morales</h2>
                        <p class="text-muted fs-4 mb-2 text-center">Ingeniería en Sistemas Computacionales</p>
                        <p class="text-muted fs-4 small text-center">ORCID: 0000-0002-1825-0097</p>

                        <p class="text-start">
                    Investigador enfocado en inteligencia artificial y aprendizaje automático, con experiencia en visión por computadora y procesamiento de lenguaje natural. Apasionado por la aplicación de la tecnología para resolver problemas complejos.
                </p>
                        <hr class="my-3">
                        <div class="row text-center">
                            <div class="col-4">
                                <h3 class="h5 mb-0">5</h3>
                                <p class="small text-muted mb-0">Libros Publicados</p>
                            </div>
                            <div class="col-4">
                                <h3 class="h5 mb-0">12</h3>
                                <p class="small text-muted mb-0">Proyectos</p>
                            </div>
                            <div class="col-4">
                                <h3 class="h5 mb-0">5</h3>
                                <p class="small text-muted mb-0">Congresos</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container mt-10 p-5 align-items-center">
    <div class="row">


        <div class="col">
            <div class="card p-4 shadow-sm">
                <ul class="nav nav-tabs mb-3" id="publicacionesTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="proyectos-tab" data-bs-toggle="tab" data-bs-target="#proyectos" type="button" role="tab" aria-controls="proyectos" aria-selected="true">Proyectos</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="articulos-tab" data-bs-toggle="tab" data-bs-target="#articulos" type="button" role="tab" aria-controls="articulos" aria-selected="false">Artículos</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="libros-tab" data-bs-toggle="tab" data-bs-target="#libros" type="button" role="tab" aria-controls="libros" aria-selected="false">Libros</button>
                    </li>
                </ul>

                <div class="tab-content" id="publicacionesTabContent">
                    <div class="tab-pane fade show active" id="proyectos" role="tabpanel" aria-labelledby="proyectos-tab">
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                            <div class="col">
                                <div class="card h-100">
                                    <img src="build/img/pp2.webp" class="card-img-top" alt="Imagen del proyecto" style="height: 200px; object-fit: cover;">
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title">Sistema de Mapeo y Navegación para Drones Autónomos </h5>
                                        <p class="card-text small text-muted">Febrero 2024 - Enero 2025</p>
                                        <p class="card-text fs-4">Desarrollo de un sistema de visión y navegación basado en SLAM (Simultaneous Localization and Mapping) para que un dron pueda crear mapas 3D de entornos desconocidos y navegar de forma autónoma.</p>
                                        
                                        <a href="#" class="btn btn-warning me-2 d-flex justify-content-around fs-4 fw-medium px-5 mt-auto">Ver más</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card h-100">
                                    <img src="build/img/pp3.webp" class="card-img-top" alt="Imagen del proyecto style="height: 200px; object-fit: cover;"">
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title">Sistema de Control de Tráfico Inteligente</h5>
                                        <p class="card-text small text-muted">Enero 2025 - Junio 2025</p>
                                        <p class="card-text fs-4">Desarrollo de un sistema de control de tráfico basado en visión por computadora y algoritmos de optimización para analizar el flujo vehicular en tiempo real y ajustar dinámicamente las señales de semáforo.</p>
                                        <a href="#" class="btn btn-warning me-2 d-flex justify-content-around fs-4 fw-medium px-5 mt-auto">Ver más</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card h-100">
                                    <img src="build/img/p1.jpg" class="card-img-top" alt="Imagen del proyecto" style="height: 200px; object-fit: cover;">
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title">Plataforma de Automatización de Pruebas de Software</h5>
                                        <p class="card-text small text-muted">Agosto 2024 - Diciembre 2024</p>
                                        <p class="card-text fs-4">Creación de un framework de automatización utilizando Selenium y Python para ejecutar pruebas de regresión en una aplicación web, mejorando la eficiencia y reduciendo los errores humanos en el proceso de QA.</p>
                                        <a href="#" class="btn btn-warning me-2 d-flex justify-content-around fs-4 fw-medium px-5 mt-auto">Ver más</a>
                                    </div>
                                </div>
                            </div>
                            </div>
                    </div>

                    <div class="tab-pane fade" id="articulos" role="tabpanel" aria-labelledby="articulos-tab">
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                            <div class="col">
                                <div class="card h-100">
                                    <img src="build/img/art1.png" class="card-img-top" alt="Imagen del artículo">
                                    <div class="card-body">
                                        <h5 class="card-title">Optimización de Algoritmos Genéticos</h5>
                                        <p class="card-text small text-muted">Revista Internacional de Computación - 2023</p>
                                        <a href="#" class="btn btn-warning me-2 d-flex justify-content-around fs-4 fw-medium px-5">Leer</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card h-100">
                                    <img src="build/img/art1.png" class="card-img-top" alt="Imagen del artículo">
                                    <div class="card-body">
                                        <h5 class="card-title">El Futuro del Blockchain en la Logística</h5>
                                        <p class="card-text small text-muted">Conferencia de Tecnología Aplicada - 2022</p>
                                        <a href="#" class="btn btn-warning me-2 d-flex justify-content-around fs-4 fw-medium px-5">Leer</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="libros" role="tabpanel" aria-labelledby="libros-tab">
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                            <div class="col">
                                <div class="card h-100">
                                    <img src="build/img/l1.webp" class="card-img-top" alt="Portada del libro">
                                    <div class="card-body">
                                        <h5 class="card-title">Inteligencia Artificial para Principiantes</h5>
                                        <p class="card-text small text-muted">Editorial TechBooks - 2021</p>
                                        <a href="#" class="btn btn-warning me-2 d-flex justify-content-around fs-4 fw-medium px-5">Ver libro</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</div>

<?php include './build/utilities/footer.php'; 