<?php include '../build/utilities/nav.php'; ?>

<main class="principal container">
    <div class="d-flex align-items-center ms-4">
        <h1 class="fw-normal">Formulario de Solicitud de Proyecto</h1>
    </div>

    <form action="#" method="POST">
        <fieldset class="mb-4">
            <legend class="border-bottom pb-2 mb-3">Datos del Proyecto</legend>
            <div class="row g-3">
                <div class="col-md-12">
                    <label for="tituloProyecto" class="form-label fs-2">Título del proyecto: <span class="text-danger">*</span></label>
                    <input name="tituloProyecto" type="text" class="form-control fs-5" id="tituloProyecto" placeholder="Escribe el título de tu proyecto" required>
                </div>
                <div class="col-md-12">
                    <label for="descripcionProyecto" class="form-label fs-2">Descripción del proyecto: <span class="text-danger">*</span></label>
                    <textarea name="descripcion" class="form-control fs-5" id="descripcionProyecto" rows="5" placeholder="Describe brevemente el proyecto, sus objetivos y su alcance" required></textarea>
                </div>
                <div class="col-md-12">
                    <label for="herramientas" class="form-label fs-2">Herramientas a utilizar: <span class="text-danger">*</span></label>
                    <input name="herramientas" type="text" class="form-control fs-5" id="herramientas" placeholder="Ej: Python, Django, HTML, CSS, JavaScript, React" required>
                </div>
            </div>
        </fieldset>

        <fieldset class="mb-4">
            <legend class="border-bottom pb-2 mb-3 fs-2">Integrantes Solicitados</legend>
            <div class="row g-3">
                <div class="col-md-4">
                    <label for="numAlumnos" class="form-label fs-2">Número de alumnos:</label>
                    <select name="numAlumnos" class="form-select fs-5">
                        <option selected disabled>Selecciona el número</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="carrera" class="form-label fs-2">Carrera:</label>
                    <select name="carrera" class="form-select fs-5">
                        <option selected disabled>Selecciona una carrera</option>
                        <option value="Ingeniería en Sistemas Computacionales">Ingeniería en Sistemas Computacionales</option>
                        <option value="Ingeniería en Gestión Empresarial">Ingeniería en Gestión Empresarial</option>
                        <option value="Contabilidad">Licenciatura en Contabilidad</option>
                        <option value="Contabilidad">Ingeniería en Logística</option>
                        <option value="Contabilidad">Ingeniería en Mecatrónica</option>
                        <option value="Contabilidad">Ingeniería Industrial</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="semestre" class="form-label fs-2">Semestre:</label>
                    <select name="semestre" class="form-select fs-5">
                        <option selected disabled>Selecciona un semestre</option>
                        <option value="1">1ro</option>
                        <option value="2">2do</option>
                        <option value="3">3ro</option>
                        <option value="4">4to</option>
                        <option value="5">5to</option>
                        <option value="6">6to</option>
                        <option value="7">7mo</option>
                        <option value="8">8vo</option>
                        <option value="9">9no</option>
                    </select>
                </div>
            </div>

        </fieldset>

        <div class="d-flex justify-content-end mt-5 m-2">
            <a href="#" class="btn btn-warning me-2 d-flex justify-content-around fs-4 fw-medium px-5">Subir Proyecto</a>
        </div>
</main>

    <div class="d-grid gap-2 d-md-flex justify-content-md-end"></div>
<?php include '../build/utilities/footer.php'; 