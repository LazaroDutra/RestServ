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
    <link rel="stylesheet" href="../bootstrap-3.3.6/css/bootstrap-theme.min.css">
    <script src="../bootstrap-3.3.6/js/jquery1.11.3.js">></script>
    <script src="../bootstrap-3.3.6/js/bootstrap.min.js"></script>

    <link rel="shortcut icon" href="../img/logo.png"/>
    <link rel="icon" href="../img/logo.png"/>
</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">RestServ Seja Bem-Vindo <?php print $_SESSION['user']; ?></a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="pages">Home</a></li>
            <li><a href="cadastro_funcionario.php">Cadastro de Funcionario</a></li>
            <li><a href="cadastro_prato.php">Cadastro Prato</a></li>
            <li><a href="cadastro_mesa.php">Cadastro Mesa</a></li>
            <li><a href="cadastro_bebida.php">Cadastro Bebida</a></li>
            <li><a href="cadastro_cliente.php">Cadastro Cliente</a></li>
            <li><a href="controlar_pedido.php">Controlar Pedido</a></li>

        </ul>
        <div class="pull-right nav navbar-nav">
            <li class="active"><a href="../">Sair</a></li>
        </div>
    </div>
</nav>

<div class="container">
    <h3>Titulo</h3>
    <p>Descrição</p>
</div>

</body>
</html>
