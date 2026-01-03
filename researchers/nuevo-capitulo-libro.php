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
            <h1>Añadir capitulo de libro</h1>
        </div>
        <?php foreach($errores as $error): ?>
            <p class="alert alert-danger text-center"><?php echo $error; ?></p>
        <?php endforeach; ?>

        <form action="./res-consultas/ConsultaNuevoCapitulo.php" method="POST" enctype="multipart/form-data">
            <div class="alertas text-danger">Los campos con (*) son obligatorios.</div>
            <fieldset>
                <legend>Datos principales del libro</legend>
                    <div class="campo">
                        <label
                        class="campo-label" 
                        for="tituloCapitulo"
                        >Titulo del capítulo: <span class="--bs-danger">*</span> </label>
                        <input
                        id = "tituloCapitulo"
                        name="tituloCapitulo"
                        class="input-label focus" 
                        placeholder="Nombre del libro"
                        type="text" 
                        >
                    </div>
                    <div class="campo">
                        <label for="resumen_libro" class="campo-label">
                        Resumen del capitulo: <span class="requerido">*</span>
                        </label>
                        
                        <textarea 
                        maxlength="850"
                        id="resumenCapitulo"
                        name="resumenCapitulo" 
                        placeholder="Ingresa el resumen del capítulo" 
                        ></textarea>
                        <div class="texto-extra" id="limite-letras" >0/850</div>
                    </div>
                    <div class="flex-responsive spc-arr">
                            
                            <div class="campo">
                            <label
                            class="campo-label" 
                            for="autoresCapitulo"
                            >Autor(es) del capítulo: <span class="requerido">*</span>  </label>
                            <input
                            class="input-label" 
                            name="autoresCapitulo"
                            id="autoresCapitulo"
                            placeholder="Ejemplo: Osorio Lillian, Galicia Gerardo, Meza Maria Cruz"
                            type="text" >
                        </div>
                        <div class="campo">
                            <label
                            class="campo-label" 
                            for="posicionAutorCapitulo"
                            >Posición del autor: </label>
                            <select 
                            id="posicionAutorCapitulo"
                            name="posicionAutorCapitulo" 
                            >
                                <option selected disabled>[Seleccione un área]</option>
                                <option value="1">1ra Posición</option>
                                <option value="2">2da Posición</option>
                                <option value="3">3ra Posición</option>
                            </select>
                        </div>
                        <div class="campo">
                            <label
                            class="campo-label" 
                            >Rango de las páginas: <span class="requerido">*</span></label>
                        <div class="pp_inputs">
                            De
                            <input
                            id="pp_inicio"
                            name="pp_inicio"
                            class="input-label" 
                            placeholder="Inicio"
                            type="number" 
                             >
                            a
                            <input
                            id="pp_fin"
                            name="pp_final"
                            class="input-label" 
                            placeholder="Fin"
                            type="number"
                            >
                        </div>
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <legend>Área y sector.</legend>
                <div class="flex-responsive spc-arr">

                    <div class="campo">
                        <label
                        class="campo-label" 
                        for="sector_estrategico"
                        >Sector estratégico: <span class="requerido">*</span> 
                        </label>
                        
                        <select 
                        name="sectorEstrategico" 
                        id="sector_estrategico"
                        >
                            <option selected disabled>[Seleccione sector estratégico]</option>
                            <option value="Energías renovables">Energías renovables</option>
                            <option value="Eficiencia energética">Eficiencia energética</option>
                            <option value="Gestión de residuos">Gestión de residuos</option>
                            <option value="Inteligencia artificial">Inteligencia artificial</option>
                            <option value="Ciberseguridad">Ciberseguridad</option>
                            <option value="Internet de las cosas">Internet de las cosas</option>
                            <option value="Computación en la nube">Computación en la nube</option>
                        </select>
                    </div>
                    
                    <div class="campo">
                        <label
                        class="campo-label" 
                        for="area_conocimiento"
                        >Área del conocimiento: <span class="requerido">*</span> </label>
                        
                        <select name="areaConocimiento" id="area_conocimiento">
                            <option selected disabled>[Seleccione un área]</option>
                            <option value="Ingeniería y tecnología">Ingeniería y tecnología</option>
                            <option value="Ciancias naturales">Ciencias Naturales</option>
                            <option value="Ciencias ambientales">Ciencias ambientales</option>
                            <option value="Ciencias de la computación">Ciencias de la computación</option>
                            <option value="Redes y conmutaciónes">Redes y conmutaciónes</option>
                        </select>
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <legend>Información adicional del libro</legend>
                <div class="flex-responsive spc-arr">

                    <div class="campo">
                        <label
                        class="campo-label" 
                        for="nombre"
                        >Titulo del libro: <span class="requerido">*</span> </label>
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
                    >Edición: <span class="requerido">*</span></label>
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
                    >Casa editorial: <span class="requerido">*</span></label>
                    <input
                    name="casaEditorial"
                    class="input-label" 
                    placeholder="Ingresa el capitulado"
                    type="text" >
                </div>
                <div class="campo">
                    <label
                    class="campo-label" 
                    for="nombre"
                    >Fecha de publicación: <span class="requerido">*</span> </label>
                    <input
                    class="input-label" 
                    name="fechaPublicacion"
                    placeholder="Fecha de publicación."
                    type="date" >
                </div>
                <div class="campo">
                    <label
                    class="campo-label" 
                    for="nombre"
                    >ISBN: <span class="requerido">*</span></label>
                    <input
                    name="isbn"
                    class="input-label" 
                    placeholder="Formato: 978-3-16-148410-0"
                    type="text" >
                </div>
                <div class="campo">
                    <label
                    class="campo-label" 
                    for="nombre"
                    >Editorial: <span class="requerido">*</span></label>
                    <input  
                    name="editorial"
                    class="input-label" 
                    placeholder="Ingresa la editorial"
                    type="text" >
                </div>
                <div class="campo">
                    <label
                    class="campo-label" 
                    for="nombre"
                    >Evidencia <span class="parentesis">(Hasta 3 imagenes solo: jpeg/png):</span><span class="requerido">*</span> </label>
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