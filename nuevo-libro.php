<?php include 'base/header.php'; ?>

    
    <main class="principal contenedor">
        <div class="header-proyectos">
        </div>

        <form>
            <fieldset>
            <legend>Agregar nuevo libro</legend>
            <div class=" formulario-nuevo-libro">

                <div class="campo">
                    <label
                    class="campo-label" 
                    for="nombre"
                    >Titulo del libro: </label>
                    <input
                    id = "libroTitulo"
                    class="input-label" 
                    placeholder="Nombre del libro"
                    type="text" >
                </div>
                    
                <div class="campo">
                        <label
                    class="campo-label" 
                    for="nombre"
                    >Nombre del autor:  </label>
                    <input
                    class="input-label" 
                    placeholder="Nombre del autor"
                    type="text" >
                </div>
                <div class="campo">
                    <label
                    class="campo-label" 
                    for="nombre"
                    >Nombre de los colaboradores:  </label>
                    <input
                    class="input-label" 
                    placeholder="Nombres separados por comillas"
                    type="text" >
                </div>
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
            </fieldset>
        </form>
        
    
    </main>

<?php include 'base/footer.php'; 