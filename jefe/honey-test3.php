<?php
    session_start();
    include '../config.php';

    /*Este codigo manda al archivo index.html si se trata de ingresar al dashboard sin haber iniciado sesion*/
    if (!isset($_SESSION['email'])) {
    header("location: index.php");
    exit();
}

    // Consulta SQL para obtener los datos de la tabla test1.
    $sql = "SELECT p1, p2, p3, p4, p5, p6, p7, p8, p9, p10, p11, p12, p13, p14, p15, p16, p17, p18, p19, p20, p21, p22, p23, p24, p25, p26, p27, p28, p29, p30, p31, p32, p33, p34, p35, p36, p37, p38, p39, p40, p41, p42, p43, p44, p45, p46, p47, p48, p49, p50, p51, p52, p53, p54, p55, p56, p57, p58, p59, p60, p61, p62, p63, p64, p65, p66, p67, p68, p69, p70, p71, p72, p73, p74, p75, p76, p77, p78, p79, p80 FROM honey";
    $result = $con->query($sql);

    // Variables para almacenar la suma de cada categoría.
    $activoSum = 0;
    $reflexivoSum = 0;
    $teoricoSum = 0;
    $pragmaticoSum = 0;

    // Calcular la suma de cada categoría.
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $activoSum += $row['p3'] + $row['5'] + $row['p7'] + $row['9'] + $row['p13'] + $row['p20'] + $row['p26'] + $row['p27'] + $row['p35'] + $row['p37'] + $row['p41'] + $row['p43'] + $row['p46'] + $row['p48'] + $row['p51'] + $row['p61'] + $row['p67'] + $row['p74'] + $row['p75'] + $row['p77'];

            $reflexivoSum += $row['p10'] + $row['p16'] + $row['p18'] + $row['p19'] + $row['p28'] + $row['p31'] + $row['p32'] + $row['p34'] + $row['p36'] + $row['p39'] + $row['p42'] + $row['p44'] + $row['p49'] + $row['p55'] + $row['p58'] + $row['p63'] + $row['p65'] + $row['p69'] + $row['p70'] + $row['p79'];

            $teoricoSum += $row['p2'] + $row['p4'] + $row['p6'] + $row['p11'] + $row['p15'] + $row['p17'] + $row['p21'] + $row['p23'] + $row['p25'] + $row['p29'] + $row['p33'] + $row['p45'] + $row['p50'] + $row['p54']  + $row['p60'] + $row['p64']  + $row['p66'] + $row['p71']  + $row['p78'] + $row['p80'];

            $pragmaticoSum += $row['p1'] + $row['p8'] + $row['p12'] + $row['p14'] + $row['p22'] + $row['p24'] + $row['p30'] + $row['p38'] + $row['p40'] + $row['p47'] + $row['p52'] + $row['p53'] + $row['p56'] + $row['p57']  + $row['p59'] + $row['p62']  + $row['p68'] + $row['p72']  + $row['p73'] + $row['p76'];
        }
    }

    // Cerrar la conexión a la base de datos.
    $con->close();
    ?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Resultado Global Cuestionario Honey-Alonso</title>
        <!-- Estilos CSS locales -->
        <link href="css/styles.css" rel="stylesheet" />
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
        <!-- Fontawesome -->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="dash_jefe.php">Psicopedagogia</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Conectado como: <?php echo ($_SESSION['nombre']);?><i class="fas fa-user fa-fw"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="logout.php">Cerrar sesion</a></li>
                        <li><hr class="dropdown-divider"/></li>
                        <li><a class="dropdown-item" href="cambiar_pass.php">Cambiar contraseña</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Dashboard</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-chart-simple"></i></div>
                                Gráficas globales
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse show" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="ver_alumnos_test1global.php">Linn O´Brien</a>
                                    <a class="nav-link" href="honey-test3.php">Honey Alonso</a>
                                    <a class="nav-link" href="pnl_test2.php">Modelo PNL</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-user-plus"></i></div>
                                Opciones
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse " id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="registro_psicologo.php">Registrar Psicólogo</a>
                                    <a class="nav-link" href="registro_alumno.php">Registrar Alumno</a>
                                </nav>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Resultado Global del:</h1>
                        <h3 class="mt-4">Canal de Aprendizaje Cuestionario Honey-Alonso</h3>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Vista Psicologo</li>
                        </ol>
                        <div class="row">
                        <div class="container">
                            <div class="font-monospace">A continuacion se muestra la Gráfica General de Resultados del <strong>Test de Canal de Aprendizaje Cuestionario Honey-Alonso.</strong></div>         <head>
                                
                                
                                
                                
                                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                                    <html>
                                    <head>
                                        <title>Resultados Finales</title>
                                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                                    
                                        <canvas id="chart1" style="display: block;box-sizing: border-box;height: 450px;width: 450px;background: white;"></canvas>
                                    <script>
                                            function goBack() {
                                                window.history.back();
                                            }
                                    </script>
                                    <script>
                                    
                                    var ctx = document.getElementById("chart1");
                                    var data = {
                                            labels: ["ACTIVO", "REFLEXIVO", "TEORICO", "PRAGMATICO"],
                                            datasets: [{
                                                label: 'Perfil de Aprendizaje',
                                                data:[
                                                <?php echo $activoSum;; ?>,
                                                <?php echo $reflexivoSum; ?>,
                                                <?php echo $teoricoSum; ?>,
                                                <?php echo $pragmaticoSum; ?>
                                            ],
                                                backgroundColor: [ "#000000"
                                    
                                            ],
                                            borderColor: "#000000",
                                    
                                            pointBackgroundColor: [
                                                "#05AD3C", // Color del primer punto (ACTIVO)
                                                "#D70000", // Color del segundo punto (REFLEXIVO)
                                                "#FFFF00", // Color del tercer punto (TEORICO)
                                                "#00B8DF" // Color del cuarto punto (PRAGMATICO)
                                            ],
                                                borderWidth: 1,
                                                fill: false
                                            },
                                            ]
                                        };
                                    
                                    var options = {
                                    
                                                maintainAspectRatio: true,
                                                spanGaps: false,
                                                scales: {
                                                        r: {
                                                            beginAtZero: true,
                                                            stepSize: 0.01
                                                        }
                                                    },
                                                elements: {
                                    
                                                    line: {
                                                        tension: 0.01
                                                    }
                                    
                                                },
                                    
                                                };
                                                
                                    
                                    var chart1 = new Chart(ctx, {
                                        type: 'radar',
                                        data: data,
                                        options: options
                                    });
                                    </script>
                                    </head>
                                    </html>
    
    
    
    
</head>
<body>
    <div id="curve_chart" style="width: 900px; height: 400px"></div>
</body>          
                        <!-- Div para la gráfica de pastel -->
                        <div id="piechart_3d" style="width: 900px; height: 50px;"></div>
                        
                        <!-- Linea separador -->
                        <div class="card mb-4">
                        </div>
                        <!-- Fin Linea separador -->
                        </div>
                </main>
                
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Psicopedagogia web</div>
                            <div>
                                <a href="#">Politicas de privacidad</a>
                                &middot;
                                <a href="#">Terminos &amp; Condiciones</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div> <!-- Fin del <div id="layoutSidenav_content"> -->
        
        </div> <!-- Fin del <div id="layoutSidenav"> -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    </body>
</html>