<?php
  include 'conf/conexao.php';
  $conn = conectar();
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" lang="pt-br">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>RestServ</title>
    <!--  Configuração do Bootstrap -->
    <link rel="stylesheet" href="bootstrap-3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-3.3.6//css/bootstrap-theme.min.css">
    <script src="bootstrap-3.3.6/js/jquery1.11.3.js">></script>
    <script src="bootstrap-3.3.6/js/bootstrap.min.js"></script>

    <link rel="shortcut icon" href="img/logo.png"/>
    <link rel="icon" href="img/logo.png"/>
    <link rel="stylesheet" href="css/input_css.css">
  </head>
  <body>

  <div class="container">
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Entre com seu Usuario e Senha</h3>
          </div>
          <div class="panel-body">
            <form role="form" action="#" method="post">
              <fieldset>
                <div class="form-group">
                  <label>Usuario</label>
                  <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus required/>
                </div>
                <div class="form-group">
                  <label>Senha</label>
                  <input class="form-control" placeholder="Senha" name="password" type="password" value="" required>
                </div>
                <!-- Change this to a button or input when using this as a form -->
                <div id="off" class="alert alert-danger alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  Usuario Ou Senha Inválidos.
                </div>

                <div class="text-center">
                  <input type="reset" class="btn btn-danger" value="Limpar">
                  <input type="submit" class="btn btn-success" value="Login">
                </div>
              </fieldset>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <center><img src="img/logo.png" alt="" height="100px" style="margin-top:-10px"/></center>
  </body>
</html>

<?php
  if(isset($_POST['email']) && isset($_POST['password']) ){
      $sel = $conn->prepare('SELECT usuario, email, senha FROM tb_user');
      $sel->execute();
      while ($result = $sel->fetch(PDO::FETCH_ASSOC)) {
        $user = $result ['usuario'];
        $email = $result ['email'];
        $senha = $result ['senha'];
      }
      if($email == $_POST['email'] || $senha == $_POST['password'] ){
        // Valido
      }else{
        echo "<script language='javascript'>
				document.getElementById('off').style.display = 'block';
				</script>
			";
      }
  }
?>