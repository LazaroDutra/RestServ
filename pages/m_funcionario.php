<?php
include '../conf/conexao.php';
$conn = conectar();
$tipo = $_POST['tipo'];

// Verifica qual valor de $tipo
if ($tipo == "add") {  // Adicionando novo dado
  $nome = $_POST['nome'];
  $nome_m = $_POST['nome_m'];
  $nome_p = $_POST['nome_p'];
  $sexo = $_POST['sexo'];
  $est_civil = $_POST['estado_civil'];
  if (isset($est_civil)) {
    $nome_c = $_POST['nome_c'];
  }
  $telefone = $_POST['telefone'];
  if (isset($_POST['celular'])) {
    $celular = $_POST['celular'];
  }
  $email = $_POST['email'];
  $rg = $_POST['rg'];
  $cpf = $_POST['cpf'];
  $data_nasc = $_POST['data_nasc'];
  $cargo = $_POST['cargo'];
  $rua = $_POST['rua'];
  $numero = $_POST['numero'];
  $bairro = $_POST['bairro'];
  $cidade = $_POST['cidade'];
  $cep = $_POST['cep'];
  $estado = $_POST['estado'];

  $ins = $conn->prepare('INSERT INTO `tb_funcionarios`(`nome`, `data_nasc`, `rg`, `cpf`, `sexo`, `est_civil`, `nome_conj`, `nome_pai`, `nome_mae`, `fk_cargo`, `email`) VALUES(?,?,?,?,?,?,?,?,?,?,?)');
  $ins->execute(array($nome,$data_nasc,$rg,$cpf,$sexo,$est_civil,$nome_c,$nome_p,$nome_m,$cargo,$email));
  $sel = $conn->prepare('SELECT id FROM tb_funcionarios WHERE cpf = :cpf');
  $sel->bindvalue(":cpf",$cpf);
  $sel->execute();
  $resultc = $sel->fetch(PDO::FETCH_ASSOC);
  $ins_end = $conn->prepare('INSERT INTO `tb_enderecos`(`rua`, `numero`, `bairro`, `cidade`, `CEP`, `estado`, `fk_funcionario`) VALUES (?,?,?,?,?,?,?)');
  $ins_end->execute(array($rua,$numero,$bairro,$cidade,$cep,$estado,$resultc['id']));

}
if ($tipo == 'edit') { // Editando dado existente

}
if ($tipo == 'del') { // Excluindo dado existente
  #
}

?>
