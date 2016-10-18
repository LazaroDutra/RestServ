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
          <h2 class="title">Cadastro de Prato</h2>
          </br>
          <?php
            $sel = $conn->prepare('SELECT last_insert_id(id_prato) as id_prato FROM tb_pratos');
            $sel->execute();
            $cod_prato = 1;
            while ($result = $sel->fetch(PDO::FETCH_ASSOC)) {
                $cod_prato += $result ['id_prato'];
            }
            ?>
          <form action="CRUD_prato.php" method="post">

            <label>Código do Prato</label>
            <input type="text" name="cod_prato" class="form-control" value="<?php print $cod_prato ?>" placeholder="Código do Prato" disabled/>

            <label>Nome do Prato</label>
            <input type="text" name="nome_prato" class="form-control" placeholder="Nome do Prato" required/>

            <label>Descrição do Prato</label>
            <textarea class="form-control" name="des_prato" rows="3" placeholder="Descrição do Prato" required></textarea>

            <label>Valor do Prato</label>
            <div class="form-group input-group">
              <span class="input-group-addon form-group input-group">$</span>
              <input type="number" name="valor_prato" class="form-control" value="" min="2" placeholder="R$ 0,0" required>
            </div>

            <input type="hidden" name="tipo" value="add">
            <div class="text-center">
              <a href="/www/RestServ/pages">
                <button type="button" name="btn_cancelar" class="btn btn-danger">Cancelar</button>
              </a>
              <button type="submit" class="btn btn-success" name="tipo" value="add">Concluir</button>
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
