<?php
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Only Animals</title>
    <link rel="stylesheet" href="styles/style_cadastro_pessoas.css">
</head>

<body>
    <div class="container">
        <div class="cadastro-box">
            <h1>CADASTRO</h1>
            <p>Digite seu nome, e-mail, endereço e senha abaixo.</p>
            <form action="#" method="post">
                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome" required>

                <label for="senha">Senha</label>
                <input type="password" id="senha" name="senha" required>

                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>

                <label for="confirmar-email">Confirmar email</label>
                <input type="email" id="confirmar-email" name="confirmar-email" required>

                <label for="endereco">Endereço</label>
                <input type="text" id="endereco" name="endereco" required>
                <button type="submit">seguinte ➔</button>
            </form>
        </div>
    </div>
</body>

</html>