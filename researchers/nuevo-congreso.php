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

        <form action="./res-consultas/ConsultaNuevoCapitulo.php" method="POST" enctype="multipart/form-data">
            <div class="alertas text-danger">Los campos con (*) son obligatorios.</div>
            <fieldset>

                <legend>Información básica del congreso</legend>
                
                <div class="flex-responsive spc-arr">
                    <div class="campo">
                        <label
                        class="campo-label" 
                        for="tituloCongreso"
                        >Nombre del congreso: <span class="--bs-danger">*</span> </label>
                        <input
                        id = "tituloCongreso"
                        name="tituloCongreso"
                        class="input-label focus" 
                        placeholder="Nombre del congreso"
                        type="text" 
                        >
                    </div>
                        
                    <div class="campo">
                        <label
                        class="campo-label" 
                        for="acronimoCongreso"
                        >Acrónimo: <span class="--bs-danger">*</span> </label>
                        <input
                        id = "acronimoCongreso"
                        name="acronimoCongreso"
                        class="input-label focus" 
                        placeholder="Acrónimo del congreso"
                        type="text" 
                        >
                    </div>

                    <div class="campo">
                        <label
                        class="campo-label" 
                        for="institucionCongreso"
                        >Institución Organizadora: <span class="--bs-danger">*</span> </label>
                        <input
                        id = "institucionCongreso"
                        name="institucionCongreso"
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
                        for="paisoCongreso"
                        >País: <span class="--bs-danger">*</span> </label>
                        <input
                        id = "paisCongreso"
                        name="paisCongreso"
                        class="input-label focus" 
                        placeholder="País de Realización"
                        type="text" 
                        >
                    </div>

                    <div class="campo">
                        <label
                        class="campo-label" 
                        for="ciudadCongreso"
                        >Ciudad: <span class="--bs-danger">*</span> </label>
                        <input
                        id = "ciudadCongreso"
                        name="ciudadCongreso"
                        class="input-label focus" 
                        placeholder="Ciudad de Realización"
                        type="text" 
                        >
                    </div>

                    <div class="campo">
                            <label
                            class="campo-label" 
                            for="modoCongreso"
                            >Modalidad: </label>
                            <select 
                            id="modoCongreso"
                            name="modoCongreso" 
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
                            for="posicionAutorCapitulo"
                            >Área temática: </label>
                            <select 
                            id="posicionAutorCapitulo"
                            name="posicionAutorCapitulo" 
                            >
                                <option selected disabled>[Seleccione un área]</option>
                                <option value="1">Desarrollo Web</option>
                                <option value="2">Inteligencia Artificial</option>
                                <option value="3">Redes</option>
                                <option value="4">Robotica</option>
                                <option value="3">Seguridad</option>
                                <option value="3">Otro</option>
                            </select>
                        </div>

                        <div class="campo">
                            <label
                            class="campo-label" 
                            for="posicionAutorCapitulo"
                            >Nivel: </label>
                            <select 
                            id="posicionAutorCapitulo"
                            name="posicionAutorCapitulo" 
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
                            >Fecha de inicio y fin del congreso: <span class="requerido">*</span></label>
                        <div class="pp_inputs">
                            De
                            <input
                            id="pp_inicio"
                            name="pp_inicio"
                            class="input-label" 
                            placeholder="Inicio"
                            type="date" 
                             >
                            a
                            <input
                            id="pp_fin"
                            name="pp_final"
                            class="input-label" 
                            placeholder="Fin"
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
                            for="posicionAutorCapitulo"
                            >Rol en el congreso: </label>
                            <select 
                            id="posicionAutorCapitulo"
                            name="posicionAutorCapitulo" 
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
                        for="nombre"
                        >Titulo del Proyecto Presentado: <span class="requerido">*</span> </label>
                        <input
                        name  = "tituloLibro"
                        class="input-label" 
                        placeholder="Ingresa el capitulado"
                        type="text" >
                    </div>
                <div class="campo">
                    <label
                    class="campo-label" 
                    for="nombre"
                    >Tipo de Participación: <span class="requerido">*</span></label>
                    <input
                    name="edicion"
                    class="input-label" 
                    placeholder="Ingresa el capitulado"
                    type="text" >
                </div>
                
                <div class="campo">
                    <label
                    class="campo-label" 
                    for="nombre"
                    >Evidencia de Participación <span class="parentesis">(Hasta 3 imagenes solo: jpeg/png):</span><span class="requerido">*</span> </label>
                    <input
                    class="input-label" 
                    id="imgCapituloLibro"
                    name="imgCapituloLibro[]"
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