<?php 
    include '../build/utilities/nav.php';
    $errores = [];
    if(isset($_SESSION['errores'])){
        $errores = $_SESSION['errores'];
        unset($_SESSION['errores']);
    }
        
?>
<main class="principal contenedor"> 
    <div class="header-proyectos">
        <h2>Agregar nuevo artículo</h2>
    </div>

    <?php foreach($errores as $error): ?>
        <p class="alert alert-danger text-center"><?php echo $error; ?></p>
    <?php endforeach; ?>

    <form action="res-consultas/ConsultaNuevoArticulo.php" method="POST" class="formulario">
        <div class="aviso-rojo">Todos los datos con (*) son obligatorios.</div>
        <fieldset>
            <legend>Datos principales del Artículo</legend>
            <div class="flex-responsive spc-bet">
                <div class="campo">
                    <label
                    class="" 
                    for="tituloArticulo"
                    >Título: <span class="requerido">*</span></label>
                    <input 
                    name="tituloArticulo"
                    class="input-largo focus"
                    placeholder="Ingresa el titulo del artículo..."
                    type="text"
                    
                    >
                </div>
                <div class="campo">
                    <label
                    class="" 
                    for="nombrerevista"
                    >Nombre de la revista: <span class="requerido">*</span></label>
                    <input 
                    name="nombreRevista"
                    id="nombreRevista"
                    class="input-largo"
                    placeholder="Ingresa el nombre de la revista..."
                    type="text"
                    
                    >
                </div>
                <div class="campo">
                    <label
                    class="" 
                    for="autoresArticulo"
                    >Autor(es): <span class="requerido">*</span></label>
                    <input 
                    id="autoresArticulo"
                    class=""
                    name="autoresArticulo"
                    placeholder="Ingresa nombre de los autores..."
                    type="text"
                    >
                    <div class="texto-extra">Separar nombres por punto y coma ( ; )</div>
                    <div class="texto-extra">Formato: Apellido paterno apellido materno, nombre(s)</div>
                </div>
                <!-- <div class="campo">
                    <label 
                    for="pos_autor_articulo"
                    >Posición del autor:<span class="requerido">*</span></label>
                    <select 
                    name="pos_autor_articulo" 
                    id="pos_autor_articulo"
                    >
                        <option value="0">[Seleccione la posición del autor]</option>
                        <option value="1">1ra posición</option>
                        <option value="2">2da posición</option>
                        <option value="3">3ra posición</option>
                        <option value="4">4ta posición</option>
                    </select>
                </div> -->
                <div class="campo">
                    <label
                    class="" 
                    for="propositoAutor"
                    >Propósito del autor: <span class="requerido">*</span></label>
                    <select 
                    name="propositoAutor" 
                    id="propositoAutor"
                    >
                        <option value="0">[Seleccione el propósito]</option>
                        <option value="Informar">Informar</option>
                        <option value="Persuadir">Persuadir</option>
                        <option value="Entretener">Entretener</option>
                        <option value="Educar">Educar</option>
                    </select>
                </div>
            </div>
            <div class="campo">
                <label
                class="" 
                for="resumen"
                >Resumen: <span class="requerido">*</span></label>
                <textarea 
                name="resumen" 
                id="resumen"
                placeholder="Resumen del artículo..."
                ></textarea>
            </div>
            <div class="flex-responsive spc-bet">

                <div class="campo">
                    <label 
                    for="estadoArticulo"
                    >Estado:<span class="requerido">*</span></label>
                    <select 
                    name="estadoArticulo" 
                    id="estadoArticulo"
                    >
                        <option disabled selected>[Seleccione una opcion]</option>
                        <option value="Enviado">Enviado</option>
                        <option value="En Revision">En revisión</option>
                        <option value="Con revisiones">Con revisiones</option>
                        <option value="Aceptado">Aceptado</option>
                        <option value="Rechazado">Rechazado</option>
                        <option value="Publicado">Publicado</option>
                        <option value="Retractado">Retractado</option>
                    </select>
                </div>
                <div class="campo">
                    <label 
                    for="fechaArticulo"
                    >Fecha:<span class="requerido">*</span></label>
                    <input
                    id="fechaArticulo" 
                    type="date"
                    name="fechaArticulo"
                    >
                </div>
                <div class="campo">
                    <label 
                    for="casaEditorial"
                    >Casa editorial:<span class="requerido">*</span></label>
                    <input
                    name="casaEditorial"
                    id="casaEditorial" 
                    type="text"
                    placeholder="Ingresar la editorial..."
                    >
                </div>
                <!-- <div class="campo">
                    <label 
                    for="pais_articulo"
                    >País de publicación:<span class="requerido">*</span></label>
                    <select 
                    name="pais_articulo" 
                    id="pais_articulo"
                    >
                        <option value="0">[seleccione un país]</option>
                    </select>
                </div> -->
            </div>
        </fieldset>
        <fieldset>
            <legend>Área y sector.</legend>
            <div class="flex-responsive spc-bet">
                <div class="campo">
                    <label 
                    for="sectorArticulo"
                    >Sector estratégico:<span class="requerido">*</span></label>
                    <select 
                    name="sectorArticulo" 
                    id="sectorArticulo"
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
                    for="areaConocimiento"
                    >Área del conocimiento:<span class="requerido">*</span></label>
                    <select 
                    name="areaConocimiento" 
                    id="areaConocimiento"
                    >
                        <option selected disabled>[Seleccione un área]</option> 
                        <option value="Ingeniería y tecnología">Ingeniería y tecnología</option>
                        <option value="Ciancias naturales">Ciencias Naturales</option>
                        <option value="Ciencias ambientales">Ciencias ambientales</option>
                        <option value="Ciencias de la computación">Ciencias de la computación</option>
                        <option value="Redes y conmutaciónes">Redes y conmutaciónes</option>                    </select>
                </div>
            </div>
        </fieldset>

        <fieldset>
            <legend>Datos Complementarios</legend>
            <div class="flex-responsive spc-bet">
                <div class="campo">
                    <label 
                    for="tipoArticulo"
                    >Tipo de artículo:<span class="requerido">*</span></label>
                    <select 
                    name="tipoArticulo" 
                    id="tipoArticulo"
                    >
                        <option selected disabled>[seleccione un tipo]</option>
                        <option value="investigación">Artículo de investigación</option>
                        <option value="revisión">Artículo de revisión</option>
                        <option value="divulgación científica">Divulgación científica</option>
                        <option value="opinión">Artículo de opinión</option>
                        <option value="técnico">Artículo técnico</option>
                        <option value="educativo">Artículo educativo</option>
                    </select>
                </div>
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
                    id="pp_final"
                    name="pp_final"
                    class="input-label" 
                    placeholder="Fin"
                    type="number"
                    >
                </div>
                <div class="campo">
                    <label 
                    for="indiceRegistro"
                    >Índices del registro:<span class="requerido">*</span></label>
                    <input
                    class="input-largo"
                    name="indiceRegistro"
                    id="indiceRegistro" 
                    placeholder="Ejemplo: JCR, LATINDEX,EBSCO, etc"
                    type="text"
                    
                    >
                </div>
                <div class="campo">
                    <label 
                    for="issn"
                    >ISSN:<span class="requerido">*</span></label>
                    <input
                    class=""
                    name="issn"
                    id="issn" 
                    placeholder="5246-5413"
                    type="text"
                    
                    >
                </div>
            </div>
        </fieldset>
        <button type="submit" class="boton-claro" >Subir artículo</button>
    </form>
</main>
<?php 
    include '../build/utilities/footer.php';
 ?>