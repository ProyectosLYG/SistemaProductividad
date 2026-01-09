<?php 
    include '../build/utilities/head.php'; 
    $error = '';
    if( isset( $_SESSION['error'] ) && !empty( $_SESSION['error'] ) ){
        $error = $_SESSION['error'];
        $_SESSION['error'] = '';
    }


?>
<body class="login-bg overflow-hidden">

<section class="d-flex justify-content-center align-items-center vh-100 gap-0">
    <div class="card  p-4 login-card2 d-flex flex-column align-self-center justify-content-center login-container rounded-0" >
        <form action="./createSpecUser.php" class="formlogin d-flex flex-column align-self-center justify-content-center" method="POST">
            <h3 class="mb-5 mt-5 letra1 text-white fs-1 fw-medium">Registrar nuevo Profesor de Tiempo Completo (PTC)</h3>
            <div>
                <fieldset class='mb-5 fildset-border'>
                <legend class="legend-border mb-2 text-white fs-3">Nombre de usuario: </legend>
                    <input type="text" class="form-control letra2 input-borde input-bg fw-bold" id="user" name="user">
                </fieldset>
            </div>
            <div>
                <fieldset class='mb-5 fildset-border'>
                <legend class="legend-border mb-2 text-white fs-3">Correo: </legend>
                    <input type="email" class="form-control letra2 input-borde input-bg fw-bold" id="email" name="email">
                </fieldset>
            </div>
            <div>
                <fieldset class='mb-5 fildset-border'>
                <legend class="legend-border mb-2 text-white fs-3">Contraseña: </legend>
                    <input type="password" class="form-control letra2 input-borde input-bg fw-bold" id="pwd" name="pwd">
                </fieldset> 
            </div>
            <div>
                <fieldset class='mb-5 fildset-border'>
                <legend class="legend-border mb-2 text-white fs-3">Repetir Contraseña: </legend>
                    <input type="password" class="form-control letra2 input-borde input-bg fw-bold" id="pwdRep" name="pwdRep">
                </fieldset>
            </div>
            <div>
                <fieldset class='mb-5 fildset-border'>
                <legend class="legend-border mb-2 text-white fs-3">Rol:</legend>
                    <select name="role" id="role" class="form-select letra2 input-borde input-bg fw-bold">
                        <option value="admin">Admin</option>
                        <option value="leadership">Jefatura</option>
                        <option value="researcher">Investigador</option>
                        <option value="student">Estudiante</option>
                    </select>
                </fieldset>
            </div>
            <div>
                <fieldset class='mb-5 fildset-border'>
                <legend class="legend-border mb-2 text-white fs-3">Area:</legend>
                    <select name="area" id="area" class="form-select letra2 input-borde input-bg fw-bold">
                        <option value="admin">Admin</option>
                        <option value="leadership">Jefatura</option>
                        <option value="ISC">Sistemas computacionales</option>
                        <option value="IM">Mecatrónica</option>
                        <option value="CP">Contabilidad</option>
                        <option value="IL">Logística</option>
                        <option value="IT">Telecomunicaciones</option>
                        <option value="II">Industrial</option>
                        <option value="IGE">Gestión empresarial</option>
                        <option value="IQ">Química</option>

                    </select>
                </fieldset>
            </div>
            <button name="nmd" value="nmd" type="submit" class="btn btn-dark letra2 py-4 fw-bold">Registrar</button>
        </form>
    </div>
    <div class="card p-4 login-card2 d-flex flex-column align-self-center justify-content-center login-container rounded-0" >
        <div class="d-flex flex-column align-self-center justify-content-center">
            <div class=" mb-5">
                <?php if( !empty( $error ) ): ?>
                    <p class="text-white fw-bold w-100 bg-danger rounded px-5 py-1 text-center">Error: <?php echo $error ?></p>
                <?php endif; ?>
                <img src="../build/img/escudo_isc.png" alt="Descripción" class="img-fluid d-flex align-self-start mx-auto" style="max-width: 1000px;">
            </div>
        </div>
    </div>
</section>
</body>

</html>
