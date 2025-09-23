<?php 
    include '../build/utilities/nav.php'; 
    $errores = [];
    if(isset($_SESSION['errores']) ){
        $errores = $_SESSION['errores'];
        unset($_SESSION['errores']);  
    }
?>

    
    <main class="principal container">
        <div class="d-flex align-items-center ms-4">
            <h1>Añadir congreso</h1>
        </div>
        <?php foreach($errores as $error): ?>
            <p class="alert alert-danger text-center"><?php echo $error; ?></p>
        <?php endforeach; ?>

        <form action="./res-consultas/ConsultaNuevoCongreso.php" method="POST" enctype="multipart/form-data">
            <div class="alertas text-danger">Los campos con (*) son obligatorios.</div>
            <fieldset>

                <legend>Información básica del congreso</legend>
                
                <div class="flex-responsive spc-arr">
                    <div class="campo">
                        <label
                        class="campo-label" 
                        for="nombreCongreso"
                        >Nombre del congreso: <span class="--bs-danger">*</span> </label>
                        <input
                        id = "nombreCongreso"
                        name="nombreCongreso"
                        class="input-label focus" 
                        placeholder="Nombre del congreso"
                        type="text" 
                        >
                    </div>
                        
                    <div class="campo">
                        <label
                        class="campo-label" 
                        for="acronimo"
                        >Acrónimo: <span class="--bs-danger">*</span> </label>
                        <input
                        id = "acronimo"
                        name="acronimo"
                        class="input-label focus" 
                        placeholder="Acrónimo del congreso"
                        type="text" 
                        >
                    </div>

                    <div class="campo">
                        <label
                        class="campo-label" 
                        for="institucion"
                        >Institución Organizadora: <span class="--bs-danger">*</span> </label>
                        <input
                        id = "institucion"
                        name="institucion"
                        class="input-label focus" 
                        placeholder="Institución organizadora"
                        type="text" 
                        >
                    </div>
                </div>

                <div class="flex-responsive spc-arr">        
                    <div class="campo">
                        <label
                        class="campo-label" 
                        for="pais"
                        >País: <span class="--bs-danger">*</span> </label>
                        <input
                        id = "pais"
                        name="pais"
                        class="input-label focus" 
                        placeholder="País de Realización"
                        type="text" 
                        >
                    </div>

                    <div class="campo">
                        <label
                        class="campo-label" 
                        for="ciudad"
                        >Ciudad: <span class="--bs-danger">*</span> </label>
                        <input
                        name="ciudad"
                        id = "ciudad"
                        class="input-label focus" 
                        placeholder="Ciudad de Realización"
                        type="text" 
                        >
                    </div>

                    <div class="campo">
                            <label
                            class="campo-label" 
                            for="modo"
                            >Modalidad: </label>
                            <select 
                            id="modo"
                            name="modo" 
                            >
                                <option selected disabled>[Seleccione una modalidad]</option>
                                <option value="1">Presencial</option>
                                <option value="2">Virtual</option>
                                <option value="3">Híbrida</option>
                            </select>
                        </div>

                </div>

                    <div class="flex-responsive spc-arr">
                        <div class="campo">
                            <label
                            class="campo-label" 
                            for="area"
                            >Área temática: </label>
                            <select 
                            id="area"
                            name="area" 
                            >
                                <option selected disabled>[Seleccione un área]</option>
                                <option value="Desarrollo Web">Desarrollo Web</option>
                                <option value="Inteligencia Artificial">Inteligencia Artificial</option>
                                <option value="Redes">Redes</option>
                                <option value="Robotica">Robotica</option>
                                <option value="Seguridad">Seguridad</option>
                                <option value="Otro">Otro</option>
                            </select>
                        </div>

                        <div class="campo">
                            <label
                            class="campo-label" 
                            for="nivel"
                            >Nivel: </label>
                            <select 
                            id="nivel"
                            name="nivel" 
                            >
                                <option selected disabled>[Seleccione un nivel]</option>
                                <option value="1">Local</option>
                                <option value="2">Nacional</option>
                                <option value="3">Internacional</option>
                            </select>
                        </div>

                        
                        <div class="campo">
                            <label
                            class="campo-label" 
                            for="fecha"
                            >Fecha: <span class="--bs-danger">*</span> </label>
                            <input
                            name="fecha"
                            id = "fecha"
                            class="input-label" 
                            type="date" 
                            >
                        </div>
                    </div>
                </div>
            </fieldset>


            <fieldset>
                <legend>Información del participante</legend>
                <div class="flex-responsive spc-arr">


                    <div class="campo">
                        <label
                        class="campo-label" 
                        for="rol"
                        >Rol en el congreso: </label>
                        <select 
                        id="rol"
                        name="rol" 
                        >
                            <option selected disabled>[Seleccione un nivel]</option>
                            <option value="1">Ponente</option>
                            <option value="2">Asistente</option>
                            <option value="3">Comite Organizador</option>
                            <option value="4">Moderador</option>
                            <option value="5">Otro</option>
                        </select>
                    </div>

                    <div class="campo">
                        <label
                        class="campo-label" 
                        for="tituloProyecto"
                        >Titulo del Proyecto Presentado: <span class="requerido">*</span> </label>
                        <input
                        name  = "tituloProyecto"
                        class="input-label" 
                        placeholder="Ingresa el capitulado"
                        type="text" >
                    </div>
                    <div class="campo">
                        <label
                        class="campo-label" 
                        for="tipo"
                        >Tipo de Participación: <span class="requerido">*</span></label>
                        <input
                        name="tipo"
                        class="input-label" 
                        placeholder="Ingresa el capitulado"
                        type="text" >
                    </div>
                
                <div class="campo">
                    <label
                    class="campo-label" 
                    for="evidencia"
                    >Evidencia de Participación <span class="parentesis">(Hasta 3 imagenes solo: jpeg/png):</span><span class="requerido">*</span> </label>
                    <input
                    class="input-label" 
                    id="evidencia"
                    name="evidencia[]"
                    accept="image/jpeg, image/png"
                    placeholder="Ingresa le edición"
                    type="file" 
                    multiple>
                </div>
            </div>
            </fieldset>
                <input class="boton-obscuro boton-nuevo-cap" type="submit" value="Crear">
            </div>
        </form>
        
        
    </main>
    <script src="../build/js/validacionForms.js"></script>
<?php include '../build/utilities/footer.php'; 