<?php
include '../conf/conexao.php';
$conn = conectar();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" lang="pt-br">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
  <title></title>
  <!--  Configuração do Bootstrap -->
  <link rel="stylesheet" href="../bootstrap-3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" href="../bootstrap-3.3.6//css/bootstrap-theme.min.css">
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
          <h2 class="title">Cadastro de Mesa</h2>
          </br>

          <form action="m_prato.php" method="post">

            <label>Código do Mesa</label>
            <input type="text" name="nome" class="form-control" value="99" placeholder="Código do Prato" disabled/>

            <label>Nome do Prato</label>
            <input type="text" name="nome_m" class="form-control" value="" placeholder="Nome do Prato" required/>

            <label>Descrição do Prato</label>
            <textarea class="form-control" rows="3" placeholder="Descrição do Prato" required></textarea>

            <label>Valor do Prato</label>
            <div class="form-group input-group">
              <span class="input-group-addon form-group input-group">$</span>
              <input type="number" name="nome_c" class="form-control" value="" min="2" placeholder="R$ 0,0" required>
            </div>

            <div class="text-center">
            <a href="../index.php">
                <button type="button" name="btn_cancelar" class="btn btn-danger">Cancelar</button>
            </a>
              <input type="submit" name="ok" class="btn btn-success"value="Concluir">
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
