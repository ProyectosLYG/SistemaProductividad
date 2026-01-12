<?php 
    include '../build/utilities/nav.php'; 
    include "../build/config/sesssionValidation.php";
    include '../build/config/connection.php';
    
    if(authAdmin($_SESSION['role']) != true){
        header("Location: ../login.php");
        exit;
    }
    $conn = connect();


    
    if( isset( $_SESSION['role'] ) && !empty( $_SESSION['role'] && $_SESSION['role'] !== 'guest' ) ){
        $sqlVerifyEmail = "SELECT emailVer FROM users WHERE id = :userId";
        try{
            $stmt = $conn -> prepare( $sqlVerifyEmail );
            $stmt -> execute( [ 'userId' => $_SESSION['user'] ] );
            $res = $stmt -> fetch();
        } catch( PDOException $e ) {
            $error = 'Hubo un problema al consultar la base de datos';
            header('Location: /');
            exit;
        }
        
        if( !$res ){
            header('Location: ../codeConfirmation.php');
            exit;
        }
    }

    $datos = [];
    $sql = "SELECT 
            p.firstName,
            p.lastName,
            p.area,
            COUNT(cha.userId) AS capLibros,
            COUNT(con.userId) AS congresos,
            COUNT(tes.userId) AS tesis,
            COUNT(art.userId) AS articulos
            FROM user_profile p
            LEFT JOIN chap_book cha
            ON p.userId = cha.userId
            LEFT JOIN congreso con 
            ON p.userId = con.userId
            LEFT JOIN tesis tes
            ON p.userId = tes.userId
            LEFT JOIN articulos art
            ON p.userId = art.userId
            WHERE p.userId = :userId
            GROUP BY p.firstName, p.lastName, p.area
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
                <h3 class="fw-semibold lh-2"><?php echo $res['lastName'] . ' ' . $res['firstName'];  ?></h3>
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
        <button id="capitulosLibrosAdmin" class="border-0 border-bottom  p-2 bg-white fw-bold text-black adminHover " >Capitulos de libros</button>
        <button id="librosAdmin" class="border-0 border-bottom p-2 bg-white fw-bold text-black adminHover " >Libros</button>
        <button id="congresosAdmin" class="border-0 border-bottom  p-2 bg-white fw-bold text-black adminHover " >Congresos</button>
        <button id="articulosAdmin" class="border-0 border-bottom bg-white fw-bold text-black adminHover  " >Articulos</button>
        <button id="tesisAdmin" class="border-0 border-bottom bg-white fw-bold text-black adminHover  " >Tesis</button>
    </div>

    <div id="resSummary" class=" my-5 row row-cols-1 row-cols-md-2 row-cols-xl-3 g-5 justify-content-around align-items-center">       
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


    const capitulosLibrosAdmin = document.getElementById('capitulosLibrosAdmin');
    const librosAdmin = document.getElementById('librosAdmin');
    const congresosAdmin = document.getElementById('congresosAdmin');
    const articulosAdmin = document.getElementById('articulosAdmin');
    const tesisAdmin = document.getElementById('tesisAdmin');

    capitulosLibrosAdmin.addEventListener('click', () => {
        capitulosLibrosAdmin.classList.add('adminSelected');
        librosAdmin.classList.remove('adminSelected');
        congresosAdmin.classList.remove('adminSelected');
        articulosAdmin.classList.remove('adminSelected');
        tesisAdmin.classList.remove('adminSelected');
        fetch('../researchers/consultasModulos/adminCapModulo.php?id=<?php echo $_GET['id'] ?>')
        .then( response => {
            if( !response.ok ){
                throw new Error("Error: " + response.status);
            }
            return response.json();
        })
        .then( data => {
            document.getElementById("resSummary").innerHTML = data.mensaje;
        })
        .catch( error =>console.error('Error:', error) )
    });

    articulosAdmin.addEventListener('click', () => {
        capitulosLibrosAdmin.classList.remove('adminSelected');
        librosAdmin.classList.remove('adminSelected');
        congresosAdmin.classList.remove('adminSelected');
        articulosAdmin.classList.add('adminSelected');
        tesisAdmin.classList.remove('adminSelected');

        fetch('../researchers/consultasModulos/adminArtModulo.php?id=<?php echo $_GET['id'] ?>')
        .then( response => {
            if( !response.ok ){
                throw new Error("Error: " + response.status);
            }
            return response.json();
        })
        .then( data => {
            document.getElementById("resSummary").innerHTML = data.mensaje;
        })
        .catch( error =>console.error('Error:', error) )
    });

    tesisAdmin.addEventListener('click', () => {
        capitulosLibrosAdmin.classList.remove('adminSelected');
        librosAdmin.classList.remove('adminSelected');
        congresosAdmin.classList.remove('adminSelected');
        articulosAdmin.classList.remove('adminSelected');
        tesisAdmin.classList.add('adminSelected');

        fetch('../researchers/consultasModulos/adminTesModulo.php?id=<?php echo $_GET['id'] ?>')
        .then( response => {
            if( !response.ok ){
                throw new Error("Error: " + response.status);
            }
            return response.json();
        })
        .then( data => {
            document.getElementById("resSummary").innerHTML = data.mensaje;
        })
        .catch( error =>console.error('Error:', error) )
    });

</script>
<?php include '../build/utilities/footer.php'; 