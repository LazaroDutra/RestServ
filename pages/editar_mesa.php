<?php
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
$id = $_POST['id'];
include '../conf/conexao.php';
$conn = conectar();
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "SELECT * FROM tb_mesas WHERE id_mesa = :id";
$select = $conn->prepare($sql);
$select->bindvalue(':id', $id);
$select->execute();
$res = $select->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" lang="pt-br">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
  <title>Editar Mesa</title>
  <!--  Configuração do Bootstrap -->
  <link rel="stylesheet" href="../bootstrap-3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" href="../bootstrap-3.3.6/css/bootstrap-theme.min.css">
  <script src="../bootstrap-3.3.6/js/jquery1.11.3.js">></script>
  <script src="../bootstrap-3.3.6/js/bootstrap.min.js"></script>
  <!-- CSS -->
  <link rel="stylesheet" href="../css/input_css.css">
</head>
<body>

<div class="row">
  <div class="container-fluid">
    <div class="jumbotron">

      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <h2 class="title">Editar de Mesa</h2>
          </br>
          <form action="CRUD_mesa.php" method="post">
            <label>Código da mesa</label>
            <input type="text" name="cod_mesa" class="form-control" readonly value="<?php echo $res['id_mesa'];?>"/>

            <label>Número da mesa</label>
            <input type="text" name="num_mesa" class="form-control" value="<?php echo $res['numero_mesa'];?>"/>

            <label>Status Da Mesa</label>
            <select class="form-control" name="status" required>
              <option value="<?php echo $res['status_mesa'];?>"><?php echo $res['status_mesa'];?></option>
              <option value="Disponível">Disponível</option>
              <option value="Ocupado">Ocupado</option>
            </select>
            </br>
            <div class="text-center">
              <a href="/www/RestServ/pages">
                <button type="button" name="btn_cancelar" class="btn btn-danger">Cancelar</button>
              </a>
              <input type="hidden" name="id" value="<?php echo $res['id_mesa'];?>">
              <button type="submit" class="btn btn-success" name="tipo" value="edi">Concluir</button>
            </div>
            </br>
          </form>
        </div>
      </div>
    </div>
  </div> <!-- row close -->
  <center><img src="../img/logo.png" alt="" height="100px" style="margin-top:-10px"/></center>
</body>
</html>