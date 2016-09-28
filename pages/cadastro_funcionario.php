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
          <h2 class="title">Cadastro de Funcionários</h2>
          <div class="row">
            <div class="form-group col-md-4">
              <form class="" action="m_funcionario.php" method="post">
                <label for="nome">Nome Completo</label>
                <input type="text" name="nome" class="form-control" value="" placeholder="Nome do Funcionário" required="">
                <label for="nome_m">Nome da Mãe</label>
                <input type="text" name="nome_m" class="form-control" value="" placeholder="Nome da Mãe" required="">
                <label for="nome_p">Nome do Pai</label>
                <input type="text" name="nome_p" class="form-control" value="" placeholder="Nome do Pai" required="">
                <label for="sexo">Sexo</label>
                <select class="form-control" name="sexo">
                  <option value="não imformado">Selecione uma opção</option>
                  <option value="Masculino">Masculino</option>
                  <option value="Feminino">Feminino</option>
                  <option value="Outros">Outros</option>
                </select>
                <label for="estado_civil">Estado Civil</label>
                <select class="form-control" name="estado_civil">
                  <option value="não imformado">Selecione uma opção</option>
                  <option value="Masculino">Casado</option>
                  <option value="Feminino">Em um Relacionamento Sério</option>
                  <option value="Outros">Solteiro</option>
                </select>
                <label for="nome_c">Nome do Conjuge</label>
                <input type="text" name="nome_c" class="form-control" value="" placeholder="Nome do Conjuge (Caso haja)">
            </div>
            <div class="form-group col-md-4">
              <label for="telefone">Telefone</label>
              <input type="text" name="telefone" class="form-control" value="" placeholder="Ex: (00) 0000-0000" required="">
              <label for="celular">Celular</label>
              <input type="text" name="celular" class="form-control" value="" placeholder="Ex: (00) 00000-0000">
              <label for="rg">RG</label>
              <input type="text" name="rg" class="form-control" value="" placeholder="Ex: AA00000000">
              <label for="email">Email</label>
              <input type="text" name="email" class="form-control" value="" placeholder="Ex: exemplo@exemplo.com">
              <label for="cpf">CPF</label>
              <input type="text" name="cpf" class="form-control" value="" placeholder="Ex: 000.000.000-00" required="">
              <label for="data_nasc">Data de Nascimento</label>
              <input type="text" name="data_nasc" class="form-control" value="" placeholder="Ex: DD/MM/AAAA">
            </div>
            <div class="form-group col-md-4">
                <label for="cargo">Cargo</label>
                <select class="form-control" name="cargo" required="">
                  <option value="">Selecione uma opção</option>
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
                    <input type="text" name="rua" class="form-control" value="" placeholder="Nome da Rua" required="">
                  </div>
                  <div class="col-md-4">
                    <label for="numero">Número</label>
                    <input type="number" name="numero" class="form-control" value=""required="">
                  </div>
                </div>
                <div class="duo">
                  <div class="col-md-6">
                    <label for="bairro">Bairro</label>
                    <input type="text" name="bairro" class="form-control" value="" placeholder="Nome do Bairro" required="">
                  </div>
                  <div class="col-md-6">
                    <label for="cidade">Cidade</label>
                    <input type="text" name="numero" class="form-control" value="" placeholder="Nome da Cidade" required="">
                  </div>
                </div>
                <br>
                <div class="duo">
                  <div class="col-md-6">
                    <label for="cep">CEP</label>
                    <input type="text" name="cep" class="form-control" value="" placeholder="Ex: 00000-000" required="">
                  </div>
                  <div class="col-md-6">
                    <label for="estado">Estado</label>
                    <select class="form-control" name="estados">
                      <option value="">Selecione uma opção</option>
                      <?php
                        $sel = $conn->prepare('SELECT * FROM tb_estados');
                        $sel->execute();
                        while ($result = $sel->fetch(PDO::FETCH_ASSOC)) {?>
                          <option value="<?php echo $result ['id']?>"><?php echo $result ['nome_estado']?></option>
                        <?php }?>
                      ?>
                    </select>
                  </div>
                </div>
                <br>
                <input type="hidden" name="tipo" value="add">
                <br>
                <a href="../index.php"><button type="button" name="btn_cancelar" class="btn btn-danger">Cancelar</button></a>
                <input type="submit" name="ok" class="btn btn-success"value="Concluir">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- row close -->
    <center><img src="../img/logo.png" alt="" height="100px" style="margin-top:-10px"/></center>
  </body>
</html>