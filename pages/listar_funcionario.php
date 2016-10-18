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
include '../conf/conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8" lang="pt-br">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
  <title></title>
  <!--  Configuração do Bootstrap -->

  <link rel="stylesheet" href="../bootstrap-3.3.6/css/bootstrap-theme.min.css">
  <script src="../bootstrap-3.3.6/js/jquery1.11.3.js">></script>
  <script src="../bootstrap-3.3.6/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../css/input_css.css">
  <link rel="stylesheet" href="../bootstrap-3.3.6/css/bootstrap.min.css">
  <link href="../bootstrap-3.3.6/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="../css/sb2.css" rel="stylesheet">
  <title>RestServ</title>
  <link rel="shortcut icon" href="../img/logo.png"/>
  <link rel="icon" href="../img/logo.png"/>

  <!-- DataTables CSS -->
  <link href="../bootstrap-3.3.6/datatables/css/dataTables.bootstrap.css" rel="stylesheet">
  <link href="../bootstrap-3.3.6/datatables/dataTables.responsive.css" rel="stylesheet">
  <!-- DataTables JavaScript -->
  <script src="../bootstrap-3.3.6/datatables/js/jquery.dataTables.min.js"></script>
  <script src="../bootstrap-3.3.6/datatables/dataTables.bootstrap.min.js"></script>
  <script src="../bootstrap-3.3.6/datatables/dataTables.responsive.js"></script>

  <!-- Page-Level Demo Scripts - Tables - Use for reference -->
  <script>
    $(document).ready(function() {
      $('#dataTables-example').DataTable({
        responsive: true
      });
    });
  </script>


  <!-- Buttons de confirmar e Cancelar -->

</head>
<body>
  <button type="button" name="button" class="btn btn-success btn-sm">Volta</button>
  <span class="title" style="font-size:3rem;">Funcionários</span>
<div class="panel-body">
  <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
    <tr>
      <th>ID</th>
      <th class="ta">Nome Completo</th>
      <th class="ta">Nome Da Mãe(s)</th>
      <th class="ta">Nome Do Pai</th>
      <th class="ta">Sexo</th>
      <th class="ta">Estado Civel</th>
      <th class="ta">Nome do Conjuge</th>
      <th class="ta">Telefone</th>
      <th class="ta">Celular</th>
      <th class="ta">Email</th>
      <th class="ta">RG</th>
      <th class="ta">CPF</th>
      <th class="ta">Data de Nascimento</th>
      <th class="ta">Cargo</th>
      <th class="ta">Rua</th>
      <th class="ta">Número</th>
      <th class="ta">Bairro</th>
      <th class="ta">Estado</th>
      <th class="ta">CEP</th>
      <th class="ta">Cidade</th>
      <th class="ta">Editar</th>
      <th class="ta">Deletar</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $conn = conectar();
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT f.id, f.nome, f.nome_mae, f.nome_pai, f.sexo, f.est_civil, f.nome_conj, t.telefone, t.tipo_telefone as celular, f.email, f.rg, f.cpf, f.data_nasc, c.nome_cargo, e.rua, e.numero, e.bairro, e.estado, e.CEP,  e.cidade
    FROM tb_funcionarios f, tb_endereco e, tb_telefones t, tb_cargos c
    WHERE ( f.fk_cargo = c.id and
           e.fk_funcionario = f.id and
           t.fk_funcionario = f.id);";
    $select = $conn->query($sql);
    while ($res = $select->fetch(PDO::FETCH_ASSOC)){?>
      <?php $nome = $res['nome'];?>
    <tr class="odd gradeX">
      <td class="ta"><?php echo $res['id'];?></td>
      <td class="ta"><?php echo $res['nome'];?></td>
      <td class="ta"><?php echo $res['nome_mae'];?></td>
      <td class="ta"><?php echo $res['nome_pai'];?></td>
      <td class="ta"><?php echo $res['sexo'];?></td>
      <td class="ta"><?php echo $res['est_civil'];?></td>
      <td class="ta"><?php echo $res['nome_conj'];?></td>
      <td class="ta"><?php echo $res['telefone'];?></td>
      <td class="ta"><?php echo $res['celular'];?></td>
      <td class="ta"><?php echo $res['email'];?></td>
      <td class="ta"><?php echo $res['rg'];?></td>
      <td class="ta"><?php echo $res['cpf'];?></td>
      <td class="ta"><?php echo $res['data_nasc'];?></td>
      <td class="ta"><?php echo $res['nome_cargo'];?></td>
      <td class="ta"><?php echo $res['rua'];?></td>
      <td class="ta"><?php echo $res['numero'];?></td>
      <td class="ta"><?php echo $res['bairro'];?></td>
      <td class="ta"><?php echo $res['estado'];?></td>
      <td class="ta"><?php echo $res['CEP'];?></td>
      <td class="ta"><?php echo $res['cidade'];?></td>
      <td>
        <form action="editar_funcionarios.php" method="post">
          <input type="hidden" name="id" value="<?php echo $res['id'];?>">
          <button type="submit" class="btn btn-primary" name="tipo" value="edir">Editar</button>
        </form>
      </td>
      <td>
       <form action="" method="post">
          <input type="hidden" name="id" value="<?php echo $res['id'];?>">
          <button type="submit" class="btn btn-danger" name="tipo" value="del" data-toggle="modal" data-target="#confirm-delete">Deletar</button>
        </form>
      </td>
    </tr>
    <?php } ?>
    </tbody>
  </table>
</div>

<!-- Buttons de confirmar e Cancelar -->
<div class="bs-example">
  <!-- Button HTML (to Trigger Modal) -->


  <!-- Modal HTML -->
  <div id="myModal" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Confirmation</h4>
        </div>
        <div class="modal-body">
          <p>Você está prestes a excluir um funcionario, esse procedimento é irreversível..</p>
          <p class="text-warning"><small>If you don't save, your changes will be lost.</small></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
