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

        # INSERT Prato Dados
        $sql = "INSERT INTO tb_pratos (nome_prato, desc_prato, valor_prato) VALUES(:nome_prato, :desc_prato, :valor_prato)";
        $insert = $conn->prepare($sql);

        $insert->bindParam(':nome_prato', $_POST['nome_prato'], PDO::PARAM_STR);
        $insert->bindParam(':desc_prato', $_POST['des_prato'], PDO::PARAM_STR);
        $insert->bindParam(':valor_prato', $_POST['valor_prato'], PDO::PARAM_STR);
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
          $sql = "UPDATE tb_pratos SET nome_prato = :nome_prato, desc_prato = :desc_prato, valor_prato = :valor_prato WHERE id_prato = :id";
          $update = $conn->prepare($sql);

         $update->bindParam(':nome_prato', $_POST['nome_prato'], PDO::PARAM_STR);
         $update->bindParam(':desc_prato', $_POST['des_prato'], PDO::PARAM_STR);
         $update->bindParam(':valor_prato', $_POST['valor_prato'], PDO::PARAM_STR);
         $update->bindParam(':id', $_POST['cod_prato'], PDO::PARAM_STR);
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