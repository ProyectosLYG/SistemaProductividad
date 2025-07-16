<?php include 'base/nav.php'; ?>

    
    <main class="principal contenedor">
        <div class="header-proyectos">
        </div>
<h1> Agregar Tesis Dirigida</h1>
        <form>
            <div class="flex-responsive, spc-arr">

            <fieldset>
                <legend>INFORMACIÓN BÁSICA</legend>
                <div class="formulario-agregartesis">

                <div class="campo">
                    <label
                    class="campo-label" 
                    for="nombre"
                    >Titulo: <span>*</span> </label>
                    <input
                    id = "libroTesis"
                    class="input-label" 
                    placeholder="Título de Tesis: "
                    type="text" 
                    required>

                    <div class="campo">
                            <label
                            class="campo-label" 
                        for="sector_estrategico"
                        >Grado:  </label>
                        
                        <select name="sector_estratégico" id="sector_estrategico">
                            <option value="0">[Seleccionar grado]</option>
                        </select>
                    </div>

                    <div class="campo">
                            <label
                            class="campo-label" 
                        for="sector_estrategico"
                    >Propósito:  </label>
                        
                        <select name="sector_estratégico" id="sector_estrategico">
                            <option value="0">[Seleccionar un propósito]</option>
                        </select>
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
                        for="sector_estrategico"
                    >Estado:  </label>
                        
                        <select name="sector_estratégico" id="sector_estrategico">
                            <option value="0">Concluida</option>
                        </select>
                    </div>

                      <div class="campo">
                            <label
                            class="campo-label" 
                            for="fecha"
                            >Fecha de Publicación:  </label>
                        
                                

                                <input type="date" id="fecha" name="fecha">
                        </select>
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
                    required></textarea>
                </div>

                
                
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

            
            <fieldset>
                <legend>DATOS COMPLEMENTARIOS</legend>
                <div class="flex-row, flex-responsive">

                    <div class="campo">
                            <label
                            class="campo-label" 
                        for="pais_procedencia"
                        >País de Procedencia:  
                    </label>
                      <select name="pais" id="pais_procedencia">
                            <option value="0">[México]</option>
                        </select>  
                    </div>


                    <div> 
                    <input class="boton-obscuro boton-nuevo_libro" type="submit" value="Seleccionar archivo" >
                         <input
                    id = "libroTesis"
                    class="input-label" 
                    placeholder="Sin archivos seleccionados "
                    type="text" 
                    required>

                    </div>
                    
            </fieldset>

            </div>

            <input class="boton-obscuro boton-nuevo_libro" type="submit" value="Cancelar" >
             <input class="boton-obscuro boton-nuevo_libro" type="submit" value="Agregar" >

        </form>
        
    
    </main>

<?php include 'base/footer.php'; 