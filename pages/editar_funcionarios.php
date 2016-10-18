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
$sql = "SELECT f.id, f.nome, f.nome_mae, f.nome_pai, f.sexo, f.est_civil, f.nome_conj, t.telefone, t.tipo_telefone as celular, f.email, f.rg, f.cpf, f.data_nasc, c.nome_cargo, e.rua, e.numero, e.bairro, e.estado, e.CEP,  e.cidade, c.id as id_cargo  
    FROM tb_funcionarios f, tb_endereco e, tb_telefones t, tb_cargos c 
    WHERE ( f.fk_cargo = c.id and
           e.fk_funcionario = f.id and 
           t.fk_funcionario = f.id) AND 
           f.id = :id";
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
  <title>RestServ</title>
  <!--  Configuração do Bootstrap -->
  <link rel="stylesheet" href="../bootstrap-3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" href="../bootstrap-3.3.6//css/bootstrap-theme.min.css">
  <script src="../bootstrap-3.3.6/js/jquery1.11.3.js">></script>
  <script src="../bootstrap-3.3.6/js/bootstrap.min.js"></script>

  <script src="../js/cidades-estados-v0.2.js"></script>
  <script src="../js/mascara.js"></script>
  <!-- CSS -->
  <link rel="stylesheet" href="../css/input_css.css">
</head>
<body>
<div class="row">
  <div class="container-fluid">
    <div class="jumbotron">
      <h2 class="title">Editar de Funcionários</h2>
      <div class="row">
        <div class="form-group col-md-4">
          <form class="" action="CRUD_funcionario.php" method="post">
            <label for="nome">Nome Completo</label>
            <input type="text" name="nome" class="form-control" value="<?php echo $res['nome'];?>" placeholder="Nome do Funcionário" required="">
            <label for="nome_m">Nome da Mãe</label>
            <input type="text" name="nome_m" class="form-control" value="<?php echo $res['nome_mae'];?>" placeholder="Nome da Mãe" required="">
            <label for="nome_p">Nome do Pai</label>
            <input type="text" name="nome_p" class="form-control" value="<?php echo $res['nome_pai'];?>" placeholder="Nome do Pai" required="">
            <label for="sexo">Sexo</label>
            <select class="form-control" name="sexo">
              <option value="<?php echo $res['sexo'];?>"><?php echo $res['sexo'];?></option>
              <option value="Masculino">Masculino</option>
              <option value="Feminino">Feminino</option>
              <option value="Outros">Outros</option>
            </select>
            <label for="estado_civil">Estado Civil</label>
            <select class="form-control" name="estado_civil">
              <option value="<?php echo $res['est_civil'];?>"><?php echo $res['est_civil'];?></option>
              <option value="Casado">Casado</option>
              <option value="Em um Relacionamento Sério">Em um Relacionamento Sério</option>
              <option value="Solteiro">Solteiro</option>
            </select>
            <label for="nome_c">Nome do Conjuge</label>
            <input type="text" name="nome_c" class="form-control" value="<?php echo $res['nome_conj'];?>" placeholder="Nome do Conjuge (Caso haja)">
        </div>
        <div class="form-group col-md-4">
          <label for="telefone">Telefone</label>
          <input type="tel" name="telefone" class="form-control" value="<?php echo $res['telefone'];?>" placeholder="Ex: (00) 0000-0000" onkeyup="criaMascara(this, '(##) ####-####');" required="">
          <label for="tel">Celular</label>
          <input type="text" name="celular" class="form-control" value="<?php echo $res['celular'];?>" placeholder="Ex: (00) 00000-0000" onkeyup="criaMascara(this, '(##) #####-####');">
          <label for="email">Email</label>
          <input type="email" name="email" class="form-control" value=" <?php echo $res['email'];?>" placeholder="Ex: exemplo@exemplo.com">
          <label for="rg">RG</label>
          <input type="text" name="rg" class="form-control" value="<?php echo $res['rg'];?>" placeholder="Ex: AA00000000">
          <label for="cpf">CPF</label>
          <input type="text" name="cpf" class="form-control" value=" <?php echo $res['cpf'];?>" placeholder="Ex: 000.000.000-00" required="" onkeyup="criaMascara(this, '###.###.###-##');">
          <label for="data_nasc">Data de Nascimento</label>
          <input type="date" name="data_nasc" class="form-control" value="<?php echo $res['data_nasc'];?>">
        </div>
        <div class="form-group col-md-4">
          <label for="cargo">Cargo</label>
          <select class="form-control" name="cargo" required="">
            <option value="<?php echo $res['id_cargo'];?>"><?php echo $res['nome_cargo'];?></option>
            <?php
            $sel = $conn->prepare('SELECT * FROM tb_cargos');
            $sel->execute();
            while ($result = $sel->fetch(PDO::FETCH_ASSOC)) {?>
              <option value="<?php echo $result ['id']?>"><?php echo $result ['nome_cargo']?></option>
            <?php }?>
            ?>
          </select>
          <h2 style="color:#e02c04">Endereço</h2>
          <div class="duo">
            <div class="col-md-8">
              <label for="rua">Rua</label>
              <input type="text" name="rua" class="form-control" value=" <?php echo $res['rua'];?>" placeholder="Nome da Rua" required="">
            </div>
            <div class="col-md-4">
              <label for="numero">Número</label>
              <input type="text" name="numero" class="form-control" value="<?php echo $res['numero'];?>" required="">
            </div>
          </div>
          <div class="duo">
            <div class="col-md-6">
              <label for="bairro">Bairro</label>
              <input type="text" name="bairro" class="form-control" placeholder="Nome do Bairro" value="<?php echo $res['bairro'];?>" required="">
            </div>
            <div class="col-md-6">
              <label for="cidade">Estado</label>
              <input type="text" name="estado" class="form-control" placeholder="Estado" value="<?php echo $res['estado'];?>" required="">
            </div>
          </div>
          <br>
          <div class="duo">
            <div class="col-md-6">
              <label for="cep">CEP</label>
              <input type="text" name="cep" class="form-control" placeholder="Ex: 00000-000" value="<?php echo $res['CEP'];?>" required="" onkeyup="criaMascara(this, '#####-###');">
            </div>
            <div class="col-md-6">
              <label for="estado">Cidade</label>
              <input type="text" name="cidade" class="form-control" placeholder="Cidade" value="<?php echo $res['cidade'];?>" required="">
            </div>
          </div>
          <br>
          <br>
          <a href="/www/RestServ/pages"><button type="button" name="btn_cancelar" class="btn btn-danger">Cancelar</button></a>
          <input type="hidden" name="id" value="<?php echo $res['id'];?>">
          <button type="submit" class="btn btn-success" name="tipo" value="edi">Concluir</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div> <!-- row close -->
<center><img src="../img/logo.png" alt="" height="100px" style="margin-top:-10px"/></center>
</body>
</html>