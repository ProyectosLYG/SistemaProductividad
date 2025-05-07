<?php include 'base/header.php'; ?>

    
    <main class="principal contenedor">
        <div class="header-proyectos">
        </div>

        <form>
            <fieldset>
                <legend>Datos principales del libro</legend>
                <div class="formulario-nuevo-libro">

                <div class="campo">
                    <label
                    class="campo-label" 
                    for="nombre"
                    >Titulo del capítulo: <span>*</span> </label>
                    <input
                    id = "libroTitulo"
                    class="input-label" 
                    placeholder="Nombre del libro"
                    type="text" 
                    required>
                </div>
                <div class="campo">
                    <label for="resumen_libro" class="campo-label">
                    Resumen del capitulo: <span>*</span>
                    </label>
                    <textarea 
                    name="resumen_libro" 
                    class="textarea" 
                    id="resumen_libro"
                    placeholder="Ingresa el resumen del capítulo" 
                    required></textarea>
                </div>
                
                <div class="campo">
                    <label
                    class="campo-label" 
                    for="nombre"
                    >Autores: <span>*</span>  </label>
                    <input
                    class="input-label" 
                    placeholder="Ejemplo: Osorio Lillian, Galicia Gerardo, Meza Maria Cruz"
                    type="text" >
                </div>
                <div class="campo">
                    <label
                    class="campo-label" 
                    for="nombre"
                    >Rango de las páginas: <span>*</span></label>
                    <div class="pp_inputs">
                        De
                        <input
                        id="pp_inicio"
                        class="input-label" 
                        placeholder="Inicio"
                        type="number" 
                        required >
                        a
                        <input
                        id="pp_fin"
                        class="input-label" 
                        placeholder="Fin"
                        type="number"
                        required >
                    </div>
                </div>
                
            </fieldset>

            <fieldset>
                <legend>Área, sector y disciplina.</legend>
                <div class="flex-row">

                    <div class="campo">
                            <label
                            class="campo-label" 
                        for="sector_estrategico"
                        >Sector estratégico:  </label>
                        
                        <select name="sector_estratégico" id="sector_estrategico">
                            <option value="0">[Seleccione sector estratégico]</option>
                        </select>
                    </div>
                    <div class="campo">
                        <label
                        class="campo-label" 
                        for="subsector_estrategico"
                        >Subsector estratégico:  </label>
                        
                        <select name="subsector_estratégico" id="subsector_estrategico">
                            <option value="0">[Seleccione subsector estratégico]</option>
                        </select>
                    </div>
                    <div class="campo">
                        <label
                        class="campo-label" 
                        for="area_prioritaria"
                        >Área prioritaria del país:  </label>
                        
                        <select name="area_prioritaria" id="area_prioritaria">
                            <option value="0">[Seleccione un área]</option>
                        </select>
                    </div>
                    <div class="campo">
                        <label
                        class="campo-label" 
                        for="area_conocimiento"
                        >Área del conocimiento:  </label>
                        
                        <select name="area_conocimiento" id="area_conocimiento">
                            <option value="0">[Seleccione un área]</option>
                        </select>
                    </div>
                </div>
            </fieldset>

                <div class="campo">
                    <label
                    class="campo-label" 
                    for="nombre"
                    >Capitulado:  </label>
                    <input
                    class="input-label" 
                    placeholder="Ingresa el capitulado"
                    type="text" >
                </div>
                <div class="campo">
                    <label
                    class="campo-label" 
                    for="nombre"
                    >ESBN: </label>
                    <input
                    class="input-label" 
                    placeholder="Ingresa el ESBN"
                    type="text" >
                </div>
                <div class="campo">
                    <label
                    class="campo-label" 
                    for="nombre"
                    >Editorial: </label>
                    <input
                    class="input-label" 
                    placeholder="Ingresa la editorial"
                    type="text" >
                </div>
                <div class="campo">
                    <label
                    class="campo-label" 
                    for="nombre"
                    >Edición: </label>
                    <input
                    class="input-label" 
                    placeholder="Ingresa le edición"
                    type="text" >
                </div>
                <input class="boton-obscuro boton-nuevo_libro" type="submit" value="Crear">
            </div>
        </form>
        
    
    </main>

<?php include 'base/footer.php'; 