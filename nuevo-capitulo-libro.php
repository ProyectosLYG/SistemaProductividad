<?php include 'base/header.php'; ?>

    
    <main class="principal contenedor">
        <div class="header-proyectos">
            <h1>Añadir capitulo de libro</h1>
        </div>

        <form>
            <div class="aviso-rojo">Los campos con (*) son obligatorios.</div>
            <fieldset>
                <legend>Datos principales del libro</legend>
                    <div class="campo">
                        <label
                        class="campo-label" 
                        for="nombre"
                        >Titulo del capítulo: <span class="requerido">*</span> </label>
                        <input
                        id = "libroTitulo"
                        class="input-label focus" 
                        placeholder="Nombre del libro"
                        type="text" 
                        required>
                    </div>
                    <div class="campo">
                        <label for="resumen_libro" class="campo-label">
                        Resumen del capitulo: <span class="requerido">*</span>
                        </label>
                        
                        <textarea 
                        name="resumen_libro" 
                        id="resumen_libro"
                        placeholder="Ingresa el resumen del capítulo" 
                        required></textarea>
                        <div class="texto-extra" id="limite-palabras" >0/350</div>
                    </div>
                    <div class="flex-responsive spc-arr">
                            
                            <div class="campo">
                            <label
                            class="campo-label" 
                            for="nombre"
                            >Autor(es) del capítulo: <span class="requerido">*</span>  </label>
                            <input
                            class="input-label" 
                            placeholder="Ejemplo: Osorio Lillian, Galicia Gerardo, Meza Maria Cruz"
                            type="text" >
                        </div>
                        <div class="campo">
                            <label
                            class="campo-label" 
                            for="nombre"
                            >Posición del autor: <span class="requerido">*</span>  </label>
                            <select name="" id="">
                                <option value="0">[Seleccione un área]</option>
                                <option value="1">1ra Posición</option>
                                <option value="2">2da Posición</option>
                            </select>
                        </div>
                        <div class="campo">
                            <label
                            class="campo-label" 
                            for="nombre"
                            >Rango de las páginas: <span class="requerido">*</span></label>
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
                </div>
            </fieldset>

            <fieldset>
                <legend>Área, sector y disciplina.</legend>
                <div class="flex-responsive spc-arr">

                    <div class="campo">
                            <label
                            class="campo-label" 
                        for="sector_estrategico"
                        >Sector estratégico: <span class="requerido">*</span> </label>
                        
                        <select name="sector_estratégico" id="sector_estrategico">
                            <option value="0">[Seleccione sector estratégico]</option>
                        </select>
                    </div>
                    <div class="campo">
                        <label
                        class="campo-label" 
                        for="subsector_estrategico"
                        >Subsector estratégico: <span class="requerido">*</span> </label>
                        
                        <select name="subsector_estratégico" id="subsector_estrategico">
                            <option value="0">[Seleccione subsector estratégico]</option>
                        </select>
                    </div>
                    <div class="campo">
                        <label
                        class="campo-label" 
                        for="area_prioritaria"
                        >Área prioritaria del país: <span class="requerido">*</span> </label>
                        
                        <select name="area_prioritaria" id="area_prioritaria">
                            <option value="0">[Seleccione un área]</option>
                        </select>
                    </div>
                    <div class="campo">
                        <label
                        class="campo-label" 
                        for="area_conocimiento"
                        >Área del conocimiento: <span class="requerido">*</span> </label>
                        
                        <select name="area_conocimiento" id="area_conocimiento">
                            <option value="0">[Seleccione un área]</option>
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
                    placeholder="Ingresa el capitulado"
                    type="date" >
                </div>
                <div class="campo">
                    <label
                    class="campo-label" 
                    for="nombre"
                    >País de publicación: <span class="requerido">*</span> </label>
                    <input
                    class="input-label" 
                    placeholder="Ingresa el capitulado"
                    type="text" >
                </div>
                <div class="campo">
                    <label
                    class="campo-label" 
                    for="nombre"
                    >ISBN: <span class="requerido">*</span></label>
                    <input
                    class="input-label" 
                    placeholder="Ingresa el ESBN"
                    type="text" >
                </div>
                <div class="campo">
                    <label
                    class="campo-label" 
                    for="nombre"
                    >Propósito: <span class="requerido">*</span> </label>
                    <input
                    class="input-label" 
                    placeholder="Ingresa el capitulado"
                    type="text" >
                </div>
                <div class="campo">
                    <label
                    class="campo-label" 
                    for="nombre"
                    >Editorial: <span class="requerido">*</span></label>
                    <input
                    class="input-label" 
                    placeholder="Ingresa la editorial"
                    type="text" >
                </div>
                <div class="campo">
                    <label
                    class="campo-label" 
                    for="nombre"
                    >Evidencia <span class="parentesis">(Portada y primera hoja del capítulo):</span><span class="requerido">*</span> </label>
                    <input
                    class="input-label" 
                    placeholder="Ingresa le edición"
                    type="file" >
                </div>
            </div>
            </fieldset>
                <input class="boton-obscuro boton-nuevo-cap" type="submit" value="Crear">
            </div>
        </form>
        
        
    </main>
    
<?php include 'base/footer.php'; 