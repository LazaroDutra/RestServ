<?PHP
session_start();

//Caso o usuário não esteja autenticado, limpa os dados e redireciona
if ( !isset($_SESSION['user']) ) {
    //Destrói
    session_destroy();

    //Limpa
    unset ($_SESSION['user']);

    //autenticado
    echo  "<script>alert('Para fazer login, digite seu e-mail do usuário e sua senha');
        window.location='../';
        </script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" lang="pt-br">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>RestServ</title>
    <!--  Configuração do Bootstrap -->
    <link rel="stylesheet" href="../bootstrap-3.3.6/css/bootstrap.min.css">
    <script src="../bootstrap-3.3.6/js/jquery1.11.3.js">></script>
    <script src="../bootstrap-3.3.6/js/bootstrap.min.js"></script>
    <link href="../bootstrap-3.3.6/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="../js/metisMenu.js"></script>
    <link href="../css/sb2.css" rel="stylesheet">
    <link rel="shortcut icon" href="../img/logo.png"/>
    <link rel="icon" href="../img/logo.png"/>

</head>
<body>
<!--
    <a class="navbar-brand" href="#">RestServ  </a>
    <li><a href="conteudo.php?funcionarios">Editar Funcionario</a></li>>
    <li><a href="conteudo_c.php?cliente">Editar Cliente</a></li>

-->
<div id="wrapper">
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html"><strong>RestServ - </strong>Seja Bem-Vindo: <?php  print $_SESSION['user']; ?></a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
            </li>
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#"><i class="fa fa-user fa-fw"></i>Perfil de usuário</a>
                    </li>
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i>Configurações</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i>Sair</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="\www\Restserv\pages"><i class="fa fa-dashboard fa-fw"></i> Visão Geral</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-users" ></i> Funcionários <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="cadastro_funcionario.php" > Cadastrar Funcionario</a>
                            </li>
                            <li>
                                <a href="listar_funcionario.php" > Funcionarios Cadastrados</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-th-large" ></i> Mesas <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="cadastro_mesa.php" > Cadastrar Mesas</a>
                            </li>
                            <li>
                                <a href="listar_mesa.php" > Mesas Cadastradas</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-circle" ></i> Pratos <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="cadastro_prato.php" > Cadastrar Pratos</a>
                            </li>
                            <li>
                                <a href="listar_prato.php" > Pratos Cadastrados</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-glass" ></i> Bebidas <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="cadastro_bebida.php" > Cadastrar Bebidas</a>
                            </li>
                            <li>
                                <a href="#" > Bebidas Cadastradas</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="" ></i> Cliente <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="cadastrar_cliente.php" > Cadastrar Cliente</a>
                            </li>
                            <li>
                                <a href="listar_cliente.php" > Clientes Cadastrados</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-table fa-fw"></i> Controle Pedidos/Mesa</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-edit fa-fw"></i> Relatórios de Pedidos</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Visão Geral</h1>
            </div>
        </div>
    </div>
</div>
</body>
</html>
