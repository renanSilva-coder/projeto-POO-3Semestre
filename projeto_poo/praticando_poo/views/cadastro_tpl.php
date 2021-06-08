<?php 
require_once '../classes/Usuario.class.php';
$objUsuario = new Usuario();

if(isset($_POST['cadastrar'])) {
  if($objUsuario->inserir($_POST)){
    header("location: /projeto_POO_3Semestre/projeto_poo/praticando_poo/");
  }else{
    echo "<script type='text/javascript'> alert('Erro no cadastro'); </script>";
  }
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Cadastrar Usuário</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<?php include 'index_menu_tpl.php'; ?>

<body class="container p-sm-2 text-center p-5">
  
  <h1 class="container pt-sm-4">CADASTRE SUA CONTA :-)</h1>

  <form method="post" action="cadastro_tpl.php">
    <div class="text-danger">
      <?php
      // echo '<p>'; 
      //   if(count($erros) > 0){//conta quantos indices tem num vetor, ou seja se for 0, não tem mensagem, se for 1 ou mais ja tem, e como pode ter + q 1 fazemos um foreach para criar um looping que exibe todos
      //     foreach ($erros as $erro) { 
      //       echo $erro; 
      //     }
      //   } 
      // echo '</p>'; 
      ?>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="nome">Nome Completo</label>
        <input type="text" class="form-control" id="nome" placeholder="Seu Nome..." name="nome" required>
      </div>
      <div class="form-group col-md-6">
        <label for="cpf">CPF</label>
        <input type="cpf" class="form-control" id="cpf" placeholder="cpf" name="cpf" required>
      </div>
      <div class="form-group col-md-6">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
      </div>
      <div class="form-group col-md-6">
        <label for="senha">Senha</label>
        <input type="password" class="form-control" id="senha" placeholder="Senha" name="senha">
      </div>
      <div class="form-group col-md-6">
        <label for="conf_senha">Confirme a senha</label>
        <input type="password" class="form-control" id="conf_senha" placeholder="Confirme sua senha" name="conf_senha">
      </div>  
    </div>
    <input type='submit' class='btn btn-outline-dark font-weight-bold text-uppercase' name='cadastrar' value='Cadastrar'>
  </form>
  
</body>
</html>