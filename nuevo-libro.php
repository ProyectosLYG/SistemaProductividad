<?php include 'base/header.php'; ?>

    
    <main class="principal contenedor">
        <div class="header-proyectos">
            <h2>Agregar nuevo libro</h2>

            <div class="busqueda">
                <input id="filtro-Proyectos" type="text" placeholder="Buscar...">
                <a id="buscar-Proyectos" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#000" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                    </svg>
                </a>
                <a id="Filtrar-Proyectos" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#000" class="bi bi-funnel" viewBox="0 0 16 16">
                        <path d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5zm1 .5v1.308l4.372 4.858A.5.5 0 0 1 7 8.5v5.306l2-.666V8.5a.5.5 0 0 1 .128-.334L13.5 3.308V2z"/>
                    </svg>
                </a>
            </div>
        </div>

        <form>
            <div class="campo">
                <label
                class="campo-label" 
                for="nombre"
                >titulo del libro: </label>
                <input
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
            <input type="submit" value="Crear">
        </form>
        
    
    </main>

<?php include 'base/footer.php'; 