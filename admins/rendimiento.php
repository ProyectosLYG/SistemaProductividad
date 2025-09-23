<?php 
    include '../build/utilities/nav.php'; 
    include "../build/config/sesssionValidation.php";
    include '../build/config/connection.php';

    $conn = connect();
    $datos = [];

    if(!authAdmin($_SESSION['role'])){
        header("Location: ../login.php");
        exit;
    }

    $sql = "SELECT 
            r.user_id,
            p.first_name,
            p.last_name,
            p.area,
            COUNT(cha.id_res) AS capLibros,
            COUNT(con.id_res) AS congresos,
            COUNT(tes.id_res) AS tesis,
            COUNT(art.id_res) AS articulos
            FROM user_roles r
            INNER JOIN user_profile p 
            ON r.user_id = p.user_id
            LEFT JOIN chap_book cha
            ON r.user_id = cha.id_res
            LEFT JOIN  congreso con
            ON r.user_id = con.id_res
            LEFT JOIN tesis tes
            ON r.user_id = tes.id_res
            LEFT JOIN articulos art
            ON r.user_id = art.id_res
            WHERE r.role = 'researcher'
            GROUP BY p.first_name, p.last_name, p.area
    ";

    $stmt = $conn -> prepare($sql);
    $stmt -> execute();
?>

<section class="mt-xxl">
    <h3 class="fw-bold">REGISTRO DE PRODUCTIVIDAD</h3>
</section>

<section class="container text-center fs-1">
    <div class="d-flex flex-column flex-xl-row justify-content-center align-items-center ms-4 me-4 p-4 gap-5">
        <?php while( $res = $stmt -> fetch() ){ ?>
            <div class="card texto-card p-5"> 
                <div>
                    <p class="fw-semibold lh-1">PTC: <?php echo $res['last_name'] . ' ' . $res['first_name'] ?></p>
                    <p class="lh-1">Área: <?php echo $res['area'] ?></p>
                    <p class="lh-1">Orcid: 223107037</p>
                    <section class="prueba1">
                        <canvas id="grafica_<?php echo $res['user_id'] ?>" height="300" width="300"></canvas>
                    </section>
                </div>
                <div>
                    <a href="admin.php?id=<?php echo $res['user_id'] ?>" class="col btn btn-warning me-2 d-flex justify-content-around fs-4 fw-medium">Ver más</a>
                </div>
            </div>
            <?php   $datos[] = [
                        'id' => 'grafica_'.$res['user_id'],
                        'valores' => [4, $res['articulos'], $res['congresos'],2, $res['capLibros'], $res['tesis'], 1]
                    ]; 
            ?>
        <?php  }?>
    </div>
</section>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const etiquetas = [ 'Proyectos de Alumnos', 'Articulos', 'Congresos', 'Libros','Capitulos de libros', 'Tesis Dirigidas', 'Otro'];
    const colores = ['#B9375D','#7ADAA5','#8AA624','#FAA533', '#3B38A0', '#F97A00', '#3A6F43'];
    
    const crearGrafica = (canvasId, valores) => {
        const ctx = document.getElementById(canvasId);
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: etiquetas,
                datasets: [{
                    data: valores,
                    backgroundColor: colores,
                    borderWidth: 1.5
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false 
                    }
                }
            }
        });
    };

    const graficas = <?php echo json_encode($datos); ?>

    graficas.forEach( g => crearGrafica(g.id, g.valores));

    
</script>
<?php include '../build/utilities/footer.php'; ?> 