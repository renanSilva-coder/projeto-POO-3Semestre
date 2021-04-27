<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link href="./T-style.css" rel="stylesheet">

</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Login</h5>
            <div class="text-danger">
            <?php 
              echo "<p>"; 
                if (isset($msg)) echo $msg; 
              echo "</p>"; 
            ?>
            </div>
          
            <!--Formulário de login-->
            <form class="form-signin" method="post">
              
              <!--Campo de login-->
              <div class="form-label-group">
                <label for="login">Login:</label>
                <input  type="text" 
                        id="login" 
                        name="login" 
                        class="form-control" 
                        placeholder="example@gmail.com" 
                        required autofocus>
              </div>

              <!--Campo de senha-->
              <div class="form-label-group">
                <label for="senha">Senha:</label>
                <input  type="password" 
                        id="senha" 
                        name="senha" 
                        class="form-control" 
                        placeholder="password" required>
              </div>
              <hr class="my-4">

              <!--Botão de Entrar-->
              <input  type="submit" 
                      class="btn btn-lg btn-outline-primary btn-block text-uppercase" 
                      name="entrar" 
                      value="Entrar">

              <!--Botão de cadastro-->
              <p>
                <a href="usuario/cadastro.php">
                  <input  type="button" 
                          class="btn btn-lg btn-outline-primary btn-block text-uppercase" 
                          name="cadastrar-se" 
                          value="Cadastrar-se">
                </a>
              </p>      
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>