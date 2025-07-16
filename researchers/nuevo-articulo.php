<?php 
    include 'base/nav.php';
?>
<main class="principal contenedor"> 
    <div class="header-proyectos">
        <h2>Agregar nuevo artículo</h2>
    </div>
    <form>
        <div class="aviso-rojo">Todos los datos con (*) son obligatorios.</div>
        <fieldset>
            <legend>Datos principales del Artículo</legend>
            <div class="flex-responsive spc-bet">
                <div class="campo">
                    <label
                    class="" 
                    for="txt_titulo_articulo"
                    >Título: <span class="requerido">*</span></label>
                    <input 
                    name="txt_titulo_articulo"
                    id="txt_titulo_articulo"
                    class="input-largo focus"
                    placeholder="Ingresa el titulo del artículo..."
                    type="text"
                    required
                    >
                </div>
                <div class="campo">
                    <label
                    class="" 
                    for="txt_nombre_revista"
                    >Nombre de la revista: <span class="requerido">*</span></label>
                    <input 
                    name="txt_nombre_revista"
                    id="txt_nombre_revista"
                    class="input-largo"
                    placeholder="Ingresa el nombre de la revista..."
                    type="text"
                    required
                    >
                </div>
                <div class="campo">
                    <label
                    class="" 
                    for="txt_autores_articulo"
                    >Autor(es): <span class="requerido">*</span></label>
                    <input 
                    id="txt_autores_articulo"
                    class=""
                    placeholder="Ingresa nombre de los autores..."
                    type="text"
                    required
                    >
                    <div class="texto-extra">Separar nombres por punto y coma ( ; )</div>
                    <div class="texto-extra">Formato: Apellido paterno apellido materno, nombre(s)</div>
                </div>
                <div class="campo">
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
                </div>
                <div class="campo">
                    <label
                    class="" 
                    for="prop_autor_articulo"
                    >Propósito del autor: <span class="requerido">*</span></label>
                    <select 
                    name="prop_autor_articulo" 
                    id="prop_autor_articulo"
                    >
                        <option value="0">[Seleccione el propósito]</option>
                    </select>
                </div>
            </div>
            <div class="campo">
                <label
                class="" 
                for="txt_resumen_articulo"
                >Propósito del autor: <span class="requerido">*</span></label>
                <textarea 
                name="txt_resumen" 
                id="txt_resumen_articulo"
                placeholder="Resumen del artículo..."
                ></textarea>
            </div>
            <div class="flex-responsive spc-bet">

                <div class="campo">
                    <label 
                    for="estado_articulo"
                    >Estado:<span class="requerido">*</span></label>
                    <select 
                    name="estado_articulo" 
                    id="estado_articulo"
                >
                    <option value="0">Publicado</option>
                    <option value="1">En revisión</option>
                    <option value="2">Revisado</option>
                </select>
                </div>
                <div class="campo">
                    <label 
                    for="estado_articulo"
                    >Fecha:<span class="requerido">*</span></label>
                    <input
                    id="date_articulo" 
                    type="date"
                    required
                    >
                </div>
                <div class="campo">
                    <label 
                    for="editorial_articulo"
                    >Casa editorial:<span class="requerido">*</span></label>
                    <input
                    name="editorial_articulo"
                    id="date_articulo" 
                    type="text"
                    placeholder="Ingresar la editorial..."
                    required
                    >
                </div>
                <div class="campo">
                    <label 
                    for="pais_articulo"
                    >País de publicación:<span class="requerido">*</span></label>
                    <select 
                    name="pais_articulo" 
                    id="pais_articulo"
                    >
                        <option value="0">[seleccione un país]</option>
                    </select>
                </div>
            </div>
        </fieldset>
        <fieldset>
            <legend>Área, sector y disciplina del artículo</legend>
            <div class="flex-responsive spc-bet">
                <div class="campo">
                    <label 
                    for="sector_articulo"
                    >Sector estratégico:<span class="requerido">*</span></label>
                    <select 
                    name="sector_articulo" 
                    id="sector_articulo"
                    >
                        <option value="0">[seleccione un sector]</option>
                    </select>
                </div>
                <div class="campo">
                    <label 
                    for="subsector_articulo"
                    >Subsector estratégico:<span class="requerido">*</span></label>
                    <select 
                    name="subsector_articulo" 
                    id="subsector_articulo"
                    >
                        <option value="0">[seleccione un subsector]</option>
                    </select>
                </div>
                <div class="campo">
                    <label 
                    for="areaPrioritaria_articulo"
                    >Área prioritaria del país:<span class="requerido">*</span></label>
                    <select 
                    name="areaPrioritaria_articulo" 
                    id="areaPrioritaria_articulo"
                    >
                        <option value="0">[seleccione un área]</option>
                    </select>
                </div>
                <div class="campo">
                    <label 
                    for="subsector_articulo"
                    >Área del conocimiento:<span class="requerido">*</span></label>
                    <select 
                    name="subsector_articulo" 
                    id="subsector_articulo"
                    >
                        <option value="0">[seleccione un área]</option>
                    </select>
                </div>
            </div>
        </fieldset>

        <fieldset>
            <legend>Datos Complementarios</legend>
            <div class="flex-responsive spc-bet">
                <div class="campo">
                    <label 
                    for="subsector_articulo"
                    >Tipo de artículo:<span class="requerido">*</span></label>
                    <select 
                    name="subsector_articulo" 
                    id="subsector_articulo"
                    >
                        <option value="0">[seleccione un tipo]</option>
                        <option value="1">Divulgación</option>
                    </select>
                </div>
                <div class="pp_inputs">
                    De
                    <input
                    id="pp_inicio_articulo"
                    class="input-label" 
                    placeholder="Inicio"
                    type="number" 
                    required >
                    a
                    <input
                    id="pp_fin_-articulo"
                    class="input-label" 
                    placeholder="Fin"
                    type="number"
                    required >
                </div>
                <div class="campo">
                    <label 
                    for="subsector_articulo"
                    >Volumen:<span class="requerido">*</span></label>
                    <select 
                    name="subsector_articulo" 
                    id="subsector_articulo"
                    >
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4 o más</option>
                    </select>
                </div>
                <div class="campo">
                    <label 
                    for="subsector_articulo"
                    >Índices del registro:<span class="requerido">*</span></label>
                    <input
                    class="input-largo"
                    name="indice_registro_artículo"
                    id="indice_registro_articulo" 
                    placeholder="Ejemplo: JCR, LATINDEX,EBSCO, etc"
                    type="text"
                    required
                    >
                </div>
                <div class="campo">
                    <label 
                    for="subsector_articulo"
                    >ISSN:<span class="requerido">*</span></label>
                    <input
                    class=""
                    name="issn_artículo"
                    id="issn_articulo" 
                    placeholder="5246-5413"
                    type="text"
                    required
                    >
                </div>
            </div>
        </fieldset>
        <button class="boton-claro" onclick="preventDefault();">Subir artículo</button>
    </form>
</main>
<?php 
    include 'base/footer.php';
 ?>