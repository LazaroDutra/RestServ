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

        # INSERT funcionarios Dados
        $sql = "INSERT INTO `tb_clientes`(`nome_cliente`, `sexo_cliente`, `rg_cliente`, `cpf_cliente`, `data_nasc`, `emai_cliente`) VALUES(:nome, :sexo, :rg, :cpf, :data_nasc, :email)";
        $insert = $conn->prepare($sql);

        $insert->bindParam(':nome', $_POST['nome'], PDO::PARAM_STR);
        $insert->bindParam(':data_nasc', $_POST['data_nasc'], PDO::PARAM_STR);
        $insert->bindParam(':rg', $_POST['rg'], PDO::PARAM_STR);
        $insert->bindParam(':cpf', $_POST['cpf'], PDO::PARAM_STR);
        $insert->bindParam(':sexo', $_POST['sexo'], PDO::PARAM_STR);
        $insert->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
        $insert->execute();

        # Buscar o ID do ultimo funcionario cadastrado
        $sql = "select max(id_cliente) as id from tb_clientes";
        foreach ($conn->query($sql) as $row){
            $id = $row['id'];
        }

        # INSERT funcionarios Endereco
        $sql = "INSERT INTO  tb_endereco (rua, numero, bairro, cidade, CEP, estado, fk_cliente) VALUES(:rua, :numero, :bairro, :cidade, :CEP, :estado, :fk_cliente)";
        $insert = $conn->prepare($sql);

        $insert->bindParam(':rua', $_POST['rua'], PDO::PARAM_STR);
        $insert->bindParam(':numero', $_POST['numero'], PDO::PARAM_STR);
        $insert->bindParam(':bairro', $_POST['bairro'], PDO::PARAM_STR);
        $insert->bindParam(':cidade', $_POST['cidade'], PDO::PARAM_STR);
        $insert->bindParam(':CEP', $_POST['cep'], PDO::PARAM_STR);
        $insert->bindParam(':estado', $_POST['estado'], PDO::PARAM_STR);
        $insert->bindParam(':fk_cliente', $id, PDO::PARAM_STR);
        $insert->execute();

        # INSERT funcionarios Telefones
        $sql = "INSERT INTO  tb_telefones (fk_cliente, telefone, tipo_telefone) VALUES(:fk_cliente, :telefone, :tipo_telefone)";
        $insert = $conn->prepare($sql);

        $insert->bindParam(':fk_cliente', $id, PDO::PARAM_STR);
        $insert->bindParam(':telefone', $_POST['telefone'], PDO::PARAM_STR);
        $insert->bindParam(':tipo_telefone', $_POST['celular'], PDO::PARAM_STR);
        $insert->execute();

        echo "</br>Cadastro OK</br>";
   }catch(PDOException $e){
        echo "</br>Erro No Cadastro</br> $e";

   }
}

if( $_POST['tipo'] == "edi" ){ // Atualizar dados
     try{
          $conn = conectar();
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          # Update funcionarios
          $sql = "UPDATE tb_clientes SET nome = :nome, data_nasc = :data_nasc, rg = :rg, cpf = :cpf, sexo = :sexo, email = :email WHERE id = :id";
          $update = $conn->prepare($sql);

          $update->bindParam(':nome', $_POST['nome'], PDO::PARAM_STR);
          $update->bindParam(':data_nasc', $_POST['data_nasc'], PDO::PARAM_STR);
          $update->bindParam(':rg', $_POST['rg'], PDO::PARAM_STR);
          $update->bindParam(':cpf', $_POST['cpf'], PDO::PARAM_STR);
          $update->bindParam(':sexo', $_POST['sexo'], PDO::PARAM_STR);
          $update->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
          $update->bindParam(':id', $_POST['id'], PDO::PARAM_STR);
          $update->execute();

          # Update funcionarios Endereco
          $sql = "UPDATE tb_endereco SET rua = :rua, numero = :numero, bairro = :bairro, cidade = :cidade, CEP = :cep, estado = :estado WHERE fk_cliente = :id";
          $update = $conn->prepare($sql);

          $update->bindParam(':rua', $_POST['rua'], PDO::PARAM_STR);
          $update->bindParam(':numero', $_POST['numero'], PDO::PARAM_STR);
          $update->bindParam(':bairro', $_POST['bairro'], PDO::PARAM_STR);
          $update->bindParam(':cidade', $_POST['cidade'], PDO::PARAM_STR);
          $update->bindParam(':cep', $_POST['cep'], PDO::PARAM_STR);
          $update->bindParam(':estado', $_POST['estado'], PDO::PARAM_STR);
          $update->bindParam(':id',  $_POST['id'], PDO::PARAM_STR);
          $update->execute();

          # Update funcionarios Telefones
          $sql = "UPDATE tb_telefones SET telefone = :telefone, tipo_telefone = :tipo_telefone WHERE fk_cliente = :id";
          $update = $conn->prepare($sql);

          $update->bindParam(':telefone', $_POST['telefone'], PDO::PARAM_STR);
          $update->bindParam(':tipo_telefone', $_POST['celular'], PDO::PARAM_STR);
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
