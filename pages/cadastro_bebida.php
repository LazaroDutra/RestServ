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
                <h2 class="title">Cadastro de Bebidas</h2>
                </br>
                <?php
                    $sel = $conn->prepare('SELECT max(id_bebida) as id_bebida FROM tb_bebidas');
                    $sel->execute();
                    $cod_bebida = 1;
                    while ($result = $sel->fetch(PDO::FETCH_ASSOC)) {
                        $cod_bebida += $result ['id_bebida'];
                    }
                ?>
                <form action="m_bebida.php" method="post">
                    <div class="form-group col-md-6">
                        <label>Código da Bebida</label>
                        <input type="text" class="form-control" value="<?php print $cod_bebida ?>" title="Código do Babida" disabled/>

                        <label>Nome da Bebida</label>
                        <input type="text" name="nome_babida" class="form-control" value="" placeholder="Nome do Bebida" required/>

                        <label>Nome do Fornecedor</label>
                        <input type="text" name="nome_fornecedor" class="form-control" value="" placeholder="Nome do Fornecedor" required/>

                        <label>Data de Entrada</label>
                        <input type="date" name="data_entrada" class="form-control" value="" placeholder="Data de Entrada" required/>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Data de Validade</label>
                        <input type="date" name="data_validade" class="form-control" value="" placeholder="Data de Validade" required/>

                        <label>Quantidade</label>
                        <input type="number" name="quantidade" min="1" class="form-control" value="" placeholder="Quantidade" required/>

                        <label>Valor Unitário</label>
                        <div class="form-group input-group">
                            <span class="input-group-addon form-group input-group">$</span>
                            <input type="number" name="valor_unitario" class="form-control" value="" min="2" placeholder="R$ 0,0" required>
                        </div>
                        <br>
                        <input type="hidden" name="tipo" value="add">
                        <a href="index.php">
                            <button type="button" name="btn_cancelar" class="btn btn-danger">Cancelar</button>
                        </a>
                        <input type="submit" name="ok" class="btn btn-success"value="Concluir"/>

                     </div>
                </form>

            </div>
        </div>
    </div> <!-- row close -->
    <center><img src="../img/logo.png" alt="" height="100px" style="margin-top:-10px"/></center>
</body>
</html>
