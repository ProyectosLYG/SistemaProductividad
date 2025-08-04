<?php include './build/utilities/nav.php'; ?>

<section class="mt-xxl">
    <h3 class="fw-bold">REGISTRO DE PRODUCTIVIDAD</h3>
</section>

<section class="container text-center fs-1">
    <div class="d-flex flex-column flex-xl-row justify-content-center align-items-center ms-4 me-4 p-4 gap-5">

        <div class="card texto-card p-5"> 
            <div>
                <p class="fw-semibold lh-1">Investigador 1</p>
                <p class="lh-1">Matricula: 223107037</p>

                <section class="prueba1">
                    <canvas id="grafica1" height="300" width="300"></canvas>
                </section>

            </div>
    
            <div>
                <a href="admin.php" class="col btn btn-warning me-2 d-flex justify-content-around fs-4 fw-medium">Ver más</a>
             </div>

    </div>


<div class="card texto-card p-5"> 
        <div>
            <p class="fw-semibold lh-1">Investigador 2</p>
            <p class="lh-1">Matricula: 223107066</p>

            <section class="prueba1">
                <canvas id="grafica2" height="300" width="300"></canvas>
            </section>

        </div>

        <div>
            <a href="admin2.php" class="col btn btn-warning me-2 d-flex justify-content-around fs-4 fw-medium">Ver más</a>

        </div>

    </div>

    <div class="card texto-card p-5"> 

        <div>
            <p class="fw-semibold lh-1">Investigador 3</p>
            <p class="lh-1">Matricula: 223107058</p>

            <section class="prueba1">
                <canvas id="grafica3" height="300" width="300"></canvas>
            </section>
        </div>

        <div>
            <a href="admin3.php" class="col btn btn-warning me-2 d-flex justify-content-around fs-4 fw-medium">Ver más</a>

        </div>

    </div>

</section>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script src="../main.js"></script>
<?php include './build/utilities/footer.php'; 