<?php

    include("../teste_sessao/testa_sessao.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Academia Fit - cadastro de Treinos</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.css" rel="stylesheet">
    
    <!-- icon bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-solid-straight/css/uicons-solid-straight.css'>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="d-block navbar-nav bg-warning sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item ">
                <div class="sidebar-brand-icon ">
                    <img src="../img/logo.png" class="logo1" alt="logo" >
                </div>
                
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item ">
                <a class="nav-link" href="../principal/principal.php">
                <img class="w-10" src="../img/icon/home.png" alt="home">
                    <span>Home</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

        
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item ">
                <a class="nav-link" href="../treino/treinos.php">
                <img src="../img/icon/treino.png" alt="home">
                    <span>Treinos</span></a>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link " href="cadbuscausuario.php">
                <img src="../img/icon/user.png" alt="home">
                    <span>Usuarios</span>
                </a>
                
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link " href="../personal/cadbuscapersonal.php">
                    <img src="../img/icon/personal.png" alt="personal">
                    <span>Personal</span>
                </a>
                
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            

             <!-- Nav Item - cadastro treino -->
                <li class="nav-item">
                    <a class="nav-link" href="../treino/cadtreino.php">
                        <img src="../img/icon/treino.png" alt="home">
                        <span>Cadastrar treinos</span>
                    </a>
                
                </li>

            <!-- Nav Item - cadastro usuarios -->
                <li class="nav-item">
                    <a class="nav-link" href="cadusuario.php" >
                        <img src="../img/icon/user.png" alt="home">
                        <span>Cadastrar usuarios</span>
                    </a>
                
                </li>

            <!-- Nav Item - cadastro personal -->
                <li class="nav-item">
                    <a class="nav-link " href="../personal/cadpersonal.php" >
                        <img src="../img/icon/personal.png" alt="personal">
                        <span>Cadastrar Personal</span>
                    </a>
                
                </li>


        

            

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <?php       
                                if(isset( $_SESSION['personal'])){
                                    include('../banco.php');

                                    $sql = "SELECT * FROM tbpersonal where id_adm = ".$_SESSION['personal']." ";
            
                                    $resultado = $conexao->query($sql);
                                         
                                    if ($resultado-> num_rows > 0) {
                                        while ($linha = $resultado->fetch_array()) {
                                                echo '<ul class="navbar-nav ml-auto">';
                                                echo '<li class="nav-item dropdown no-arrow">';
                                                echo '<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                                                echo '<span>'.$linha['nome'].'</span>';
                                                echo '<img class="img-profile rounded-circle" src=" '.$linha['foto_personal'].'">';
                                                echo '</a>';
                                                echo '<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">';
                                                echo '<a class="dropdown-item" href="../acoes/perfil.php"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Perfil</a>';
                                                echo '<a class="dropdown-item" href="../acoes/configuracao.php"><i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>Configurações</a>';
                                                echo '<div class="dropdown-divider"></div>';
                                                echo '<a class="dropdown-item" href="../acoes/sair.php" data-toggle="modal" data-target="#logoutModal"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Sair</a>';
                                                echo '</div>';
                                                echo '</li>';
                
                                                echo '</ul>';
                
                                
                                            }
                                    }
                                }
                            ?>

                    
                </nav>
                <!-- End of Topbar -->
                
                        <?php
                            
                                if (isset($_GET['msg2']) == 'usuario_editado') {
                                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>Usuario editado com sucesso! </strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>';
                                }
                                if (isset($_GET['msg3']) == 'usuario_nao_editado') {
                                    echo '<div class=" w-80 alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>Usuario nao editado!</strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>';
                                }
                                if (isset($_GET['msg']) == 'arquivo_nao_compativel') {
                                    echo '<div class="w-80  alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>Arquivo nao compativel </strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>';
                                }
                                if (isset($_GET['msg4']) == 'usuario_excluido') {
                                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>Usuario excluido com sucesso! </strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>';
                                }
                                if (isset($_GET['msg5']) == 'usuario_nao_excluido') {
                                    echo '<div class=" w-80 alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>Usuario nao excluido!</strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>';
                                }
                                
                            
                            ?>
            


                <div class="busca w-80 " >
                    
                    <!-- campoSearch -->
                    <form class=" d-sm-inline-block form-inline w-100 navbar-search" method="POST" action="">
                        <div class="input-group">
                            <input type="text" class="form-control1 form-control bg-light border-2 small" placeholder="Procure por um usuario"
                                aria-label="Search" aria-describedby="basic-addon2" name="usu">
                            <div class="input-group-append">
                                <button class="btn btn-warning" type="submit">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    
                    
                </div>
                <div class="col-xl-12 col-md-12 mb-12">
                        <div class="card border-left-warning shadow h-7 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class=" col mr-0">
                                        Foto
                                    </div> 
                                    <div class="col mr-2">
                                        
                                        | Nome
                                    </div>
                                    <div class="col mr-2">
                                        
                                        | Email
                                    </div>
                                    <div class="col mr-3">
                                       | Telefone
                                        
                                    </div>
                                    <div class="col mr-2">
                                        
                                        | Atividade
                                    </div>
                                    <div class="col mr-2">
                                        | Editar
                                        
                                    </div>
                                    <div class="col mr-2">
                                        | Excluir
                                        
                                    </div>
                                    
                                        
                                </div>
                             </div>
                        </div>
                    </div>
                    <br>
                    <?php

                        include('../banco.php');

                       if(isset( $_POST['usu'])){
                            $busca = $_POST['usu'];

                            $sql = "SELECT * FROM tbusu where nome like '%$busca%' ";

                            $resultado = $conexao->query($sql);
                            
                            if ($resultado-> num_rows > 0) {
                                while ($linha = $resultado->fetch_array()) {
                                    echo '    <div class="select col-xl-12 col-md-12 mb-12 py-1">';
                                    echo '            <div class="card border-left-warning shadow h-100 py-2">';
                                    echo '                <div class="card-body">';
                                    echo '                    <div class="row no-gutters align-items-center">';
                                    echo '                        <div class="">'.'<img class="foto_usu1"src=" ' .$linha['foto_usu'].' ">'.'</div> ';
                                    echo '                        <div class="col mr-2">'.$linha['nome'].'</div>';
                                    echo '                        <div class="col mr-2">'.$linha['email'].'</div>';
                                    echo '                        <div class="col mr-2">'.$linha['telefone'].'</div>';
                                    echo '                        <div class="col mr-2">'.$linha['atividade'].'</div>';
                                    echo '                        <div class="col mr-2"><a href="edit.php?id='.$linha['id_usu'].' " '.'><button type="button"  class="btn btn-outline-success">Editar <i class="fa fa-edit"></i></button></a></div>';
                                    echo '                        <div class="col mr-2"><a href="excluir.php?id='.$linha['id_usu'].' " '.'><button type="button" class="btn btn-outline-danger">Excluir <i class="fa fa-trash"></i></button></a></div>';
                                    echo '                    </div>';
                                    echo '                </div>';
                                    echo '            </div>';
                                    echo '        </div>';
                                }
                                
                                }else {
                                    echo '<div class=" w-80 alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>Usuario não encontrado!</strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>';
                                }
                            }
                        
                        
                    ?>


            </div>
        </div>
    </div>
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Deseja realmente sair?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body"></div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-danger" href="../acoes/sair.php">Sair</a>
                </div>
            </div>
        </div>
    </div>

</body>


    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>


</html>