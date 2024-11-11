<?php

include "function.php";
extract($_POST);

#Variaveis de informações do banco
$server = "localhost";
$user = "root";
$password = NULL;
$db = "only_animals";

if (isset($b_login)) {
  $consulta = "SELECT `senha`, `id` FROM `usuarios` WHERE `email` LIKE '$email'";
  $resultado =  banco($server, $user, $password, $db, $consulta);
  if ($resultado->num_rows == 0) {
    echo "<script>alert('E-mail digitado ainda não foi cadastrado');</script>";
  } else {

    $linha = $resultado->fetch_assoc();
    $db_senha = $linha['senha'];
    if ($senha == $db_senha) {
    
      $_SESSION['id'] = $linha['id'];
      $_SESSION['login'] = true;
      header('location: menu.php');

    } else {
      echo "<script>alert('Senha digitada incorretamente, tente novamente');</script>";
    }
  }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Only Animals - Login</title>
  <link rel="stylesheet" href="styles/style_index.css" />
</head>

<body>
  <div class="container">
    <img src="Imagens_design/cachorro.png" class="foreground-image" alt="Imagem cachorrinho" />
    <div class="login-box">
      <h1>ONLY ANIMALS</h1>
      <form action="index.php" method="post">
        <label for="usuario">E-mail</label>
        <input type="text" name="email" required />

        <label for="senha">Senha</label>
        <input type="password" name="senha" required />

        <button type="submit" name="b_login">Login</button>
      </form>
      <p class="forgot-password">
        Ainda não tem uma conta? <br />
        <a href="cadastro_pessoas.php">Clique aqui para se cadastrar</a>
      </p>
    </div>
    <img src="Imagens_design/gato.png" class="foreground-image" alt="Imagem gatinho" />
  </div>
</body>

</html>