<?php
include '../conf/conexao.php';
$conn = conectar();
$tipo = $_POST['tipo'];

// Verifica qual valor de $tipo
if ($tipo == "add") {  // Adicionando novo dado
    $nome = $_POST['nome_prato'];
    $desc = $_POST['des_prato'];
    $valor = $_POST['valor_prato'];

    $ins = $conn->prepare('INSERT INTO `tb_pratos` (`nome_prato`, `desc_prato`, `valor_prato`) VALUES (?,?,?)');
    $ins->execute(array($nome, $desc, $valor));
}

if ($tipo == 'edit') { // Editando dado existente
    #
}

if ($tipo == 'del') { // Excluindo dado existente
    #
}
?>