<?php include 'base/head.php'; ?>
<body class="login-bg overflow-hidden">

<section class="d-flex justify-content-center align-items-center vh-100">
    <div class="card rounded-4 shadow p-4 login-card align-items-center login-container" >
        <form action="" class="formlogin" method="POST">

        <div class="d-flex justify-content-center my-4">
        <img src="build/img/escudo_isc.png" alt="Descripción" class="img-fluid" style="max-width: 200px;">
        </div>

            <h3 class="text-center mb-5 letra1 text-white fw-bold">Iniciar Sesión</h3>


            <div>
            <fieldset class='mb-5 fildset-border'>
            <legend class="legend-border mb-2 text-white fw-bold">Usuario</legend>
                 <input type="text" class="form-control letra2 input-borde input-bg" id="usuario" name="usuario">

            </fieldset>
            </div>

            <div class="mb-4"></div>
            <div>
            <fieldset class='mb-3 fildset-border'>
            <legend class="legend-border mb-2 text-white fw-bold">Contraseña</legend>
                 <input type="password" class="form-control letra2 input-borde input-bg" id="contra" name="contra"required>

            </fieldset>
            </div>

            <div class="form-check mb-5 d-flex justify-content-between">
            
            <div class=" d-flex gap-2 align-items-center justify-content-center"> 
                <input class="form-check-input form-check-input mt-0" type="checkbox" id="recordar" name="recordar">
                <label class="form-check-label letra3 text-white fw-bold" for="recordar"> Recordar contraseña</label>
            </div>
            
            <a class="text-white fw-bold" href="#">¿Olvidaste tu contraseña?</a>
        </div>


            <div class="d-grid">
                <button type="submit" class="btn btn-dark letra2 py-4">Entrar</button>
            </div>
        </form>
    </div>
</section>

</body>
</html>
