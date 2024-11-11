<?php

include "function.php";
extract($_POST);

#Variaveis de informações do banco
$server = "localhost";
$user = "root";
$password = NULL;
$db = "only_animals";

if (isset($b_cadastrar)) {
    if (!($email == $confirmarEmail)) {
        # Alerta email diferentes
        echo "<script>alert('email de confirmação está diferente do email original');</script>";

        #Mandar novamente à pagina inicial
        echo "<script>location.href='cadastro_pessoas.php';</script>";
    }
    $consulta = "INSERT INTO `usuarios` (`email`, `senha`, `nome`, `cpf`, `telefone`, `endereco`) VALUES ('$email', '$senha', '$nome', '$cpf', '$telefone', '$endereco')";
    banco($server, $user, $password, $db, $consulta);

    $userId = mysqli_insert_id($banco);
    $_SESSION['id'] = $userId;
    $_SESSION['login'] = true;
    $_SESSION['email'] = $email;
    $_SESSION['senha'] = $senha;

    header('location: cadastro_pet.php');
    exit();
}

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

                <label for="cpf">Cpf</label>
                <input type="text" id="cpf" name="cpf" required>

                <label for="telefone">Telefone</label>
                <input type="text" id="senha" name="telefone" required>

                <label for="endereco">Endereço</label>
                <input type="text" id="endereco" name="endereco" required>

                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>

                <label for="confirmar-email">Confirmar email</label>
                <input type="email" id="confirmar-email" name="confirmarEmail" required>

                <label for="senha">Senha</label>
                <input type="password" id="senha" name="senha" required>
                <button type="submit" name="b_cadastrar">Cadastrar ➔</button>

            </form>
        </div>
    </div>
</body>

</html>