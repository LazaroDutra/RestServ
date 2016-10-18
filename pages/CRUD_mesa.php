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

foreach($_POST as $key=>$value){
  echo "$key = $value</br>";
}

if ( $_POST['tipo'] == "add" ){ // Adicionando novo dado
   try{
        $conn = conectar();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        # INSERT Mesas Dados
        $sql = "INSERT INTO tb_mesas (numero_mesa, status_mesa) VALUES(:numero_mesa, :status_mesa)";
        $insert = $conn->prepare($sql);

        $insert->bindParam(':numero_mesa', $_POST['num_mesa'], PDO::PARAM_STR);
        $insert->bindParam(':status_mesa', $_POST['status'], PDO::PARAM_STR);
        $insert->execute();

        echo "</br>Cadastro OK</br>";
   }catch(PDOException $e){
        echo "</br>Erro No Cadastro</br>";
   }
}

if( $_POST['tipo'] == "edi" ){ // Atualizar dados
     try{
          $conn = conectar();
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          # Update funcionarios
          $sql = "UPDATE tb_mesas SET numero_mesa = :numero_mesa, status_mesa = :status_mesa WHERE id_mesa = :id";
          $update = $conn->prepare($sql);

          $update->bindParam(':numero_mesa', $_POST['num_mesa'], PDO::PARAM_STR);
          $update->bindParam(':status_mesa', $_POST['status'], PDO::PARAM_STR);
          $update->bindParam(':id', $_POST['id'], PDO::PARAM_STR);
          $update->execute();

          echo "</br>Cadastro Atualizado com sucesso</br>";
     }catch(PDOException $e){
          echo "</br>Erro ao Atualizae Cadastro</br>";
     }
}

if( $_POST['tipo'] == "del" ){ // Excluindo dado existente
     /*
     foreach ($_POST as $fielName => $FieldContent) $$fielName = $FieldContent;
     $del = $conn->prepare('DELETE * FROM tb_funcionarios WHERE cpf = :cpf');
     $del->bindvalue(':cpf',$cpf);
     $del->execute();
     */
}
#limpar variavel $_POST
unset($_POST);
?>