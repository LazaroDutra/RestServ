<?php
include '../conf/conexao.php';
$conn = conectar();
$tipo = $_POST['tipo'];

// Verifica qual valor de $tipo
if ($tipo == "add") {  // Adicionando novo dado
    $bebida = $_POST['nome_babida'];
    $fornecedor = $_POST['nome_fornecedor'];
    $entrada = $_POST['data_entrada'];
    $validade = $_POST['data_validade'];
    $quantidade = $_POST['quantidade'];
    $valor = $_POST['valor_unitario'];

    $ins = $conn->prepare('INSERT INTO `tb_bebidas` (`nome_bebida`, `fornecedor_bebida`, `data_entrada`, `data_validade`, `qtde_bebida`, `valor_bebida`) VALUES (?,?,?,?,?,?)');
    $ins->execute(array($bebida, $fornecedor, $entrada, $validade, $quantidade, $valor));
}

if ($tipo == 'edit') { // Editando dado existente
    #
}

if ($tipo == 'del') { // Excluindo dado existente
    #
}
?>