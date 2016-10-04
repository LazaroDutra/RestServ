<?php
include '../conf/conexao.php';
$conn = conectar();
$tipo = $_POST['tipo'];

// Verifica qual valor de $tipo
if ($tipo == "add") {  // Adicionando novo dado
    $nome = $_POST['nome'];
    $sexo = $_POST['sexo'];
    $telefone_re = $_POST['telefone_re'];
    $telefone_ce = $_POST['telefone_ce'];
    $email = $_POST['email'];
    $rg = $_POST['rg'];
    $cpf = $_POST['cpf'];
    $data_nasc = $_POST['data_nasc'];
    $rua = $_POST['rua'];
    $numero = $_POST['numero'];
    $bairro = $_POST['bairro'];
    $estado = $_POST['estado'];
    $cep = $_POST['cep'];
    $cidade = $_POST['cidade'];

    $ins = $conn->prepare('INSERT INTO `tb_clientes` (`nome_cliente`, `sexo_cliente`, `rg_cliente`, `cpf_cliente`, `data_nasc`, `emai_cliente`) VALUES (?,?,?,?,?,?)');
    $ins->execute(array($nome, $sexo, $rg, $cpf, $data_nasc, $email));

}

if ($tipo == 'edit') { // Editando dado existente
    #
}

if ($tipo == 'del') { // Excluindo dado existente
    #
}
?>