<?php
include '../conf/conexao.php';
$conn = conectar();



$status = $_POST['status'];

// Buscar o ultimo numero_mesa
$sel = $conn->prepare('SELECT max(numero_mesa) as num_mesa FROM tb_mesas;');
$sel->execute();
$num_mesa = 1;
while ($result = $sel->fetch(PDO::FETCH_ASSOC)) {
    $num_mesa += $result ['num_mesa'];
}


// Verifica qual valor de $tipo
    $ins = $conn->prepare('INSERT INTO `tb_mesas`(`numero_mesa`, `status_mesa`) VALUES(?,?)');
    $ins->execute(array($num_mesa,$status));

?>