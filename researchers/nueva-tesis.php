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
        </div>
<h1> Agregar Tesis Dirigida</h1>
        <form>
            <div class="flex-responsive, spc-arr">
            <?php foreach($errores as $error): ?>
                <p class="alert text-danger text-center"><?php echo $error; ?></p>
            <?php endforeach; ?>
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
                        
                        <select name="gradoTesis" id="sector_estrategico">
                            <option disabled selected>[Seleccionar grado]</option>
                            <option value="Ingeniería">Ingeniería</option>
                            <option value="Especialidad">Especialidad</option>
                            <option value="Maestria">Maestria</option>
                        </select>
                    </div>
                    
                    <div class="campo">
                        <label
                        class="campo-label" 
                        for="propositoTesis"
                        >Propósito:  </label>
                        <select name="propositoTesis" id="sector_estrategico">
                            <option selected disabled>[Seleccionar un propósito]</option>
                            <option value="Titulación">Titulación</option>
                            <option value="Investigación aplicada"> Investigación aplicada</option>
                            <option value="Investigación básica">Investigación básica</option>
                            <option value="Desarrollo tecnológico">Desarrollo tecnológico</option>
                            <option value="Innovación">Innovación</option>
                        </select>
                    </div>
                </div>

                <div class="d-flex flex-column flex-xl-row justify-content-around">    
                    <div class="campo">
                        <label
                        class="campo-label" 
                        for="autores"
                        >Autores: <span>*</span>  </label>
                        <input
                        name="autores"
                        class="input-label" 
                        placeholder="Ejemplo: Osorio Lillian, Galicia Gerardo, Meza Maria Cruz"
                        type="text" >
                    </div>
                    
                    <div class="campo">
                        <label
                        class="campo-label" 
                        for="estado"
                        >Estado:  </label>
                        <select name="estado" id="estado">
                            <option selected disabled>[ Estado ]</option>    
                            <option value="En curso">En curso</option>
                            <option value="Terminada">Terminada</option>
                            <option value="Publicada">Publicada</option>
                            <option value="En revisión">En revisión</option>
                            <option value="Aprovada">Aprovada</option>
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
                    <label for="descripcion" class="campo-label">
                    Descripción: <span>*</span>
                    </label>
                    <textarea 
                    name="descripcion" 
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
                        for="sector"
                        >Sector estratégico:  </label>
                        
                        <select name="sector" id="sector">
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
                        for="area"
                        >Área del conocimiento:  </label>
                        
                        <select name="area" id="area">
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
                    for="imgEvidencia"
                    >Evidencia <span class="parentesis">(Hasta 3 imagenes solo: jpeg/png):</span><span class="requerido">*</span> </label>
                    <input
                    class="input-label" 
                    id="imgEvidencia"
                    name="imgEvidencia[]"
                    accept="image/jpeg, image/png"
                    placeholder="Ingresa la edición"
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