<?php include '../build/utilities/nav.php'; ?>

    
    <main class="principal contenedor">
        <div class="header-proyectos">
        </div>
<h1> Agregar Tesis Dirigida</h1>
        <form>
            <div class="flex-responsive, spc-arr">

            <fieldset>
                <legend>INFORMACIÓN BÁSICA</legend>
                
                <div class="d-flex flex-column flex-xl-row justify-content-around ">

                    <div class="campo">
                        <label
                        class="campo-label" 
                        for="tituloTesis"
                        >Titulo: <span>*</span> </label>
                        <input
                        id = "tituloTesis"
                        name="tituloTesis"
                        class="input-label" 
                        placeholder="Título de Tesis: "
                        type="text" 
                        >
                    </div>
                    <div class="campo">
                        <label
                        class="campo-label" 
                        for="sector_estrategico"
                        >Grado:  </label>
                        
                        <select name="sector_estratégico" id="sector_estrategico">
                            <option disabled selected>[Seleccionar grado]</option>
                            <option value="Ingenieria">Ingenieria</option>
                            <option value="Especialidad">Especialidad</option>
                            <option value="Maestria">Maestria</option>
                        </select>
                    </div>
                    
                    <div class="campo">
                        <label
                        class="campo-label" 
                        for="sector_estrategico"
                        >Propósito:  </label>
                        <select name="sector_estratégico" id="sector_estrategico">
                            <option selected disabled>[Seleccionar un propósito]</option>
                        </select>
                    </div>
                </div>
                <div class="d-flex flex-column flex-xl-row justify-content-around">

                    
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
                        for="sector_estrategico"
                        >Estado:  </label>
                        
                        <select name="sector_estratégico" id="sector_estrategico">
                            </select>
                        </div>
                        
                        <div class="campo">
                            <label
                            class="campo-label" 
                            for="fecha"
                            >Fecha de Publicación:  </label>
                            <input type="date" id="fecha" name="fecha">
                        </div>
                    </div>  
                
                <div class="campo">
                    <label for="descripcion_libro" class="campo-label">
                    Descripción: <span>*</span>
                    </label>
                    <textarea 
                    name="descripcion_tesis" 
                    class="textarea" 
                    id="resumen_libro"
                    placeholder="Descripción base del producto" 
                    ></textarea>
                </div>
            </fieldset>

            <fieldset>
                <legend>IDENTIFICACIÓN DEL PRODUCTO</legend>
                <div class="flex-row">

                    <div class="campo">
                        <label
                        class="campo-label" 
                        for="sector_estrategico"
                        >Sector estratégico:  </label>
                        
                        <select name="sector_estratégico" id="sector_estrategico">
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
                        >Área del conocimiento:  </label>
                        
                        <select name="area_conocimiento" id="area_conocimiento">
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
                <legend>DATOS COMPLEMENTARIOS</legend>
                <div class="flex-row, flex-responsive">

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
                    
            </fieldset>

            </div>

            <input class="boton-obscuro boton-nuevo_libro" type="submit" value="Cancelar" >
             <input class="boton-obscuro boton-nuevo_libro" type="submit" value="Agregar" >

        </form>
        
    
    </main>

<?php include '../build/utilities/footer.php'; 