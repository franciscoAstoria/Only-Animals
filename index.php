<?php
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
      <form action="login.php" method="post">
        <label for="usuario">E-mail</label>
        <input type="text" id="usuario" name="user" required />

        <label for="senha">Senha</label>
        <input type="password" id="senha" name="senha" required />

        <button type="submit">Login</button>
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