<?php 
    include '../build/utilities/nav.php'; 
    include "../build/config/sesssionValidation.php";
    include '../build/config/connection.php';
    if(authAdmin($_SESSION['role']) != true){
        header("Location: ../login.php");
        exit;
    }

    $conn = connect();
    $datos = [];
    $sql = "SELECT 
            p.first_name,
            p.last_name,
            p.area,
            COUNT(cha.id_res) AS capLibros,
            COUNT(con.id_res) AS congresos,
            COUNT(tes.id_res) AS tesis,
            COUNT(art.id_res) AS articulos
            FROM user_profile p
            LEFT JOIN chap_book cha
            ON p.user_id = cha.id_res
            LEFT JOIN congreso con 
            ON p.user_id = con.id_res
            LEFT JOIN tesis tes
            ON p.user_id = tes.id_res
            LEFT JOIN articulos art
            ON p.user_id = art.id_res
            WHERE p.user_id = :userId
            GROUP BY p.first_name, p.last_name, p.area
    ";
    $stmt = $conn -> prepare($sql);
    $stmt -> execute(['userId' => $_GET['id']]);
    $res =  $stmt -> fetch();


?>

<section class="mt-xxl">
    <h3 class="fw-bold">REGISTRO DE PRODUCTIVIDAD</h3>
</section>


<section>
    <div class="d-flex justify-content-center align-items-center me-4 p-4 gap-5">
    

        <div class="card texto-card p-5 text-center"> 
            <div>
                <h3 class="fw-semibold lh-2"><?php echo $res['last_name'] . ' ' . $res['first_name'];  ?></h3>
                <p class="lh-1">ORCID: 223107037</p>
                <p class="lh-1">Area: <?php echo $res['area']; ?></p>
                <section>
                    <canvas id="adminGrafica_<?php echo $_GET['id']; ?>" height="600" width="1000"></canvas>
                </section>
            </div>
            <?php   $datos[] = [
                        'id' => 'adminGrafica_'. $_GET['id'],
                        'valores' => [4, $res['articulos'], $res['congresos'],2, $res['capLibros'], $res['tesis'], 1]
                    ];
            ?>
            <div class="d-flex justify-content-start mt-5">
            <a href="rendimiento.php" class="btn btn-warning me-2 d-flex justify-content-around fs-4 fw-medium">Regresar</a>
            </div>

        </div>

    </div>
</section>

<section class="container mx-auto">
    <div class="my-5 d-flex justify-content-start gap-3">
        <a id="" class="border-bottom border-warning p-2 bg-white fw-bold text-black " >Capitulos de libros</a>
        <a id="" class="border-bottom border-warning p-2 bg-white fw-bold text-black " >Libros</a>
        <a id="" class="border-bottom border-warning p-2 bg-white fw-bold text-black " >Congresos</a>
        <a id="" class="border-bottom border-warning p-2 bg-white fw-bold text-black " >Articulos</a>
    </div>
</section>




<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const etiquetas = [ 'Proyectos de Alumnos', 'Articulos', 'Congresos', 'Libros','Capitulos de libros', 'Tesis Dirigidas', 'Otro'];
    const colores = ['#B9375D','#7ADAA5','#8AA624','#FAA533', '#3B38A0', '#F97A00', '#3A6F43'];
    
    const crearGrafica = (canvasId, valores ) => {
    const ctx = document.getElementById(canvasId);
        if (!ctx) {
            console.warn(`No se encontró el canvas con id: "${canvasId}"`);
            return;
        }

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: etiquetas,
                datasets: [{
                    data: valores,
                    backgroundColor: colores,
                }]
            },
            options: {
                indexAxis: 'y',
                plugins: {
                    legend: {
                        display: false
                    }
                },
                responsive: true,
                scales: {
                    x: {
                        beginAtZero: true,
                        min: 0,
                        max: 10,
                        grid: {
                            display: false
                        }
                    },
                    y: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            color: '#333333',
                            font: {
                                family: 'Raleway, sans serif',
                                size: 15,
                                weight: '600'
                            }
                        }
                    }
                }
            }
        });
    };
    const datosGrafica = <?php echo json_encode($datos) ?>;
        datosGrafica.forEach( dat => crearGrafica(dat.id, dat.valores) );


</script>
<?php include '../build/utilities/footer.php'; 