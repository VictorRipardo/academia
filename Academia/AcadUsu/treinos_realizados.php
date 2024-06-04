
<?php

include('testa_sessao/testa_sessao.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Personal - Start Bootstrap Theme</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Custom Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>
<?php 
    include('../banco.php');
    $idusu = $_SESSION['usuario'];

    
?>
<body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-white  py-3">
            <div class=" bg-warning menus container px-3">
                <img class="logo" src="../img/logo.png" alt="" srcset="">

                <h5 class="nav-h5"></h5>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 small ">
                        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link " href="meu_treino.php">Meu Treino</a></li>
                        <li class="nav-item"><a class="nav-link active" href="treinos_realizados.php">Treinos realizados</a></li>
                        <li class="nav-item"><a class="nav-link" href="perfil.php">Perfil</a></li>
                        <li class="nav-item"><a class="nav-link" href="sair.php">Sair</a></li>
                    </ul>
                </div>
            </div>
            
        </nav>
        <!-- Header-->
        <header class="py-2">

                    
            
            <div class="container px-2 pb-2">
                
                <p class="m-3 fw-bold">treinos realizados: </p> 
                    <?php

                        include('../banco.php');

                       
                            $sql = "SELECT tbusu.nome as usu, tbtreino.nome as treino, tbtreinorealizado.data as dtf  FROM tbtreinorealizado
                               INNER JOIN tbtreino ON  tbtreino.id_treino = tbtreinorealizado.id_treino
                               INNER JOIN tbusu ON tbusu.id_usu = tbtreinorealizado.id_usu where tbtreinorealizado.id_usu = $idusu";

                            $resultado = $conexao->query($sql);
                            
                            if ($resultado-> num_rows > 0) {
                                while ($linha2 = $resultado->fetch_array()) {
                                    echo '    <div class="select col-xl-12 col-md-12 mb-12">';
                                    echo '            <div class="card border-left-warning shadow h-100 py-2">';
                                    echo '                <div class="card-body">';
                                    echo '                    <div class="row no-gutters align-items-center">';
                                    echo '                        <div class="col mr-4">'.$linha2['usu'].'</div>';
                                    echo '                        <div class="col mr-4">'.$linha2['treino'].'</div>';
                                    echo '                        <div class="col mr-4 ir">'.$linha2['dtf'].'</div>';
                                    echo '                    </div>';
                                    echo '                </div>';
                                    echo '            </div>';
                                    echo '        </div>';
                                    echo '        </br>';
                                }
                                
                                }else {
                                    echo '<div class=" w-80 alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>Nenhum treino realizado!</strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>';
                                }
                            
                        
                        
                    ?>
                        
                    </div>           
                </div>
            </div>
        </header>
        <!-- About Section-->
        <br>
        
    </main>
    <!-- Footer-->
    <footer class="bg-white py-4 mt-auto">
        <div class="container px-5">
            <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                <div class="col-auto"><div class="small m-0">Copyright &copy; Your Website 2023</div></div>
                <div class="col-auto">
                    <a class="small" href="#!">Privacy</a>
                    <span class="mx-1">&middot;</span>
                    <a class="small" href="#!">Terms</a>
                    <span class="mx-1">&middot;</span>
                    <a class="small" href="#!">Contact</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>
</html>
