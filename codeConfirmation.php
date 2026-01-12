<?php 
    include './build/utilities/head.php'; 
    $error = '';
    if( isset( $_SESSION['error'] ) && !empty( $_SESSION['error'] ) ){
        $error = $_SESSION['error'];
        $_SESSION['error'] = '';
    }
?>
<body class="login-bg overflow-hidden">

<section class="d-flex justify-content-center align-items-center vh-100 gap-0">
    <div class="card p-4 login-card2 d-flex flex-column align-self-center justify-content-center login-container rounded-0">
        <form action="./confirmToken.php" method="POST"
            class="formlogin d-flex flex-column align-self-center justify-content-center">

            <h3 class="mb-5 mt-5 letra1 text-white fs-1 fw-medium">
                Confirmación de cuenta
            </h3>

            <p class="text-white letra2 fs-4 mb-5 text-center">
                Ingresa el token de confirmación enviado a tu correo electrónico
            </p>

            <div>
                <fieldset class="mb-5 fildset-border">
                    <legend class="legend-border mb-2 text-white fs-3">
                        Token de confirmación:
                    </legend>
                    <input type="text"
                        class="form-control letra2 input-borde input-bg fw-bold text-center"
                        id="token"
                        name="token"
                        placeholder="Ej. A3F9K2"
                        required>
                </fieldset>
            </div>

            <button type="submit"
                    class="btn btn-dark letra2 py-4 fw-bold">
                Confirmar cuenta
            </button>
        </form>
    </div>
    <div class="card p-4 login-card2 d-flex flex-column align-self-center justify-content-center login-container rounded">
        <div class="d-flex flex-column align-self-center justify-content-center">

            <div class="mb-5">
                <?php if( !empty( $error ) ): ?>
                    <p class="text-white fw-bold w-100 bg-danger rounded px-5 py-1 text-center">
                        Error: <?php echo $error ?>
                    </p>
                <?php endif; ?>
                <a href="/">
                    <img src="../build/img/escudo_isc.png"
                        alt="Descripción"
                        class="img-fluid d-flex align-self-start mx-auto"
                        style="max-width: 1000px;">
                </a>
            </div>

        </div>
    </div>

</section>
</body>
</html>
