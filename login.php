<?php include './build/utilities/head.php'; ?>
<body class="login-bg overflow-hidden">

<section class="d-flex justify-content-center align-items-center vh-100">
    <div class="card rounded-4 shadow p-4 login-card align-items-center login-container" >
        <form action="./build/config/startSession.php" class="formlogin" method="POST">

            <a class="d-flex justify-content-center my-4" href="/">
                <img src="./build/img/escudo_isc.png" alt="Descripción" class="img-fluid" style="max-width: 200px;">
            </a>

            <h3 class="text-center mb-5 letra1 text-white fw-bold">Iniciar Sesión</h3>


            <div>
                <fieldset class='mb-5 fildset-border'>
                <legend class="legend-border mb-2 text-white fw-bold">Usuario</legend>
                    <input type="text" class="form-control letra2 input-borde input-bg fw-bold" id="user" name="user">

                </fieldset>
            </div>

            <div class="mb-4"></div>

            <div>
                <fieldset class='mb-3 fildset-border'>
                <legend class="legend-border mb-2 text-white fw-bold">Contraseña</legend>
                    <input type="password" class="form-control letra2 input-borde input-bg fw-bold" id="pwd" name="pwd"required>
                </fieldset>
            </div>

            <div class="form-check mb-5 d-flex justify-content-between">
                <div class=" d-flex gap-2 align-items-center justify-content-center"> 
                    <input class="form-check-input form-check-input mt-0" type="checkbox" id="rmbr" name="rmbr">
                    <label class="form-check-label letra3 text-white fw-bold" for="recordar"> Recordar contraseña</label>
                </div>
                <a class="text-white fw-bold" href="#">¿Olvidaste tu contraseña?</a>
            </div>


            <div class="d-grid">
                <button type="submit" class="btn btn-dark letra2 py-4 fw-bold">Entrar</button>
            </div>
        </form>
    </div>
</section>

</body>
</html>
