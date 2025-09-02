<?php 
    include '../build/utilities/nav.php'; 
    include "../build/config/sesssionValidation.php";
    if(authAdmin($_SESSION['role']) != true){
        header("Location: ../login.php");
        exit;
    }
?>

<section class="mt-xxl">
    <h3 class="fw-bold">REGISTRO DE PRODUCTIVIDAD</h3>
</section>


<section>
    <div class="d-flex justify-content-center align-items-center me-4 p-4 gap-5">
    

        <div class="card texto-card p-5 text-center"> 
            <div>
                <h3 class="fw-semibold lh-2">Investigador 1</h3>
                <p class="lh-1">Matricula: 223107037</p>

                <section>
                    <canvas id="admingrafic1" height="600" width="1000"></canvas>
                </section>
            </div>

            <div class="d-flex justify-content-start mt-5">
            <a href="rendimiento.php" class="btn btn-warning me-2 d-flex justify-content-around fs-4 fw-medium">Regresar</a>
            </div>

        </div>

    </div>
</section>





<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="admingrafic.js"></script>
<?php include '../build/utilities/footer.php'; 