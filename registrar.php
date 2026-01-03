<?php include './build/utilities/head.php'; ?>
<body class="login-bg overflow-hidden">

<section class="d-flex justify-content-center align-items-center vh-100 gap-0">
    <div class="card  p-4 login-card2 d-flex flex-column align-self-center justify-content-center login-container rounded-0" >
        <form action="./build/config/createUser.php" class="formlogin d-flex flex-column align-self-center justify-content-center" method="POST">

            <h3 class="mb-5 mt-5 letra1 text-white fs-1 fw-medium">Ingresa tus datos para poder registrarte:</h3>


            <div>
                <fieldset class='mb-5 fildset-border'>
                <legend class="legend-border mb-2 text-white fs-3">Nombre: </legend>
                    <input type="text" class="form-control letra2 input-borde input-bg fw-bold" id="nombre" name="user">

                </fieldset>
            </div>
            
            <div>
                <fieldset class='mb-5 fildset-border'>
                <legend class="legend-border mb-2 text-white fs-3">Matrícula: </legend>
                    <input type="text" class="form-control letra2 input-borde input-bg fw-bold" id="matricula" name="matricula">

                </fieldset>
            </div>

            <div>
                <fieldset class='mb-5 fildset-border'>
                <legend class="legend-border mb-2 text-white fs-3">Correo: </legend>
                    <input type="email" class="form-control letra2 input-borde input-bg fw-bold" id="correo" name="correo">

                </fieldset>
            </div>


            <div class="mb-4"></div>

            <div>
                <fieldset class='mb-5 fildset-border'>
                <legend class="legend-border mb-2 text-white fs-3">Contraseña</legend>
                    <input type="password" class="form-control letra2 input-borde input-bg fw-bold" id="pwd" name="pwd"required>
                </fieldset>
            </div>

            <div>
                <fieldset class='mb-3 fildset-border'>
                <legend class="legend-border mb-2 text-white fs-3">Confirmar Contraseña</legend>
                    <input type="password" class="form-control letra2 input-borde input-bg fw-bold" id="pwd" name="pwdRep"required>
                </fieldset>
            </div>

            <button type="submit" class="btn btn-dark letra2 py-4 fw-bold">Registrar</button>
        </form>
    </div>

    <div class="card p-4 login-card2 d-flex flex-column align-self-center justify-content-center login-container rounded-0" >
        <div class="d-flex flex-column align-self-center justify-content-center">
            <div class=" mb-5">
                <img src="./build/img/escudo_isc.png" alt="Descripción" class="img-fluid d-flex align-self-start" style="max-width: 1000px;">
            </div>
        </div>
    </div>
</section>
</body>

</html>
