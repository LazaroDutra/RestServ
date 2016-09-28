<?php
function conectar(){
  try{
    //conexao com o banco usando PDO
    $pdo= new PDO('mysql:host=localhost;dbname=restserv_db','root','');
    $pdo->exec("set names utf8");
  }catch(PDOException $e){
    echo $e -> getMessage();
  }
  return $pdo;
}
 ?>
