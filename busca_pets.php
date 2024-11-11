<?php
include "function.php";
extract($_POST);

teste_login();

# Variáveis de informações do banco
$server = "localhost";
$user = "root";
$password = NULL;
$db = "only_animals";

echo "
<header class='header'>
    <div class='icon header-icon'>
        <a href='menu.php'>🏠</a>
    </div>
    <div class='search-container'>
        <form action='busca_pets.php' method='post'>
            <input type='text' placeholder='Pesquisar...' name='pesquisa'>
            <button type='submit' name='b_pesquisar'>🔍</button>
        </form>
    </div>
</header>";

if (isset($b_pesquisar)) {
    if (empty($pesquisa)) {
        header('location: busca_pets.php');
    } else {
        $consulta = "SELECT * FROM `pets` WHERE `nome` LIKE '%$pesquisa%'";
        $dados = banco($server, $user, $password, $db, $consulta);
        while ($linha = $dados->fetch_assoc()) {
            echo "
            <div class='pet-card card' style='margin-top:20px'>
                <div class='foto'>
                    <img src='" . $linha['foto'] . "' alt='foto pet'>
                </div>
                <div class='pet-info'>
                    <h2>" . $linha['nome'] . ", " . $linha['idade'] . "</h2>
                    <p>Sexo: " . $linha['sexo'] . "</p>
                    <p>Espécie: " . $linha['especie'] . "</p>
                    <p>Raça: " . $linha['raca'] . "</p>
                </div>
                <div class='pet-description'>
                    <h3>Descrição</h3>
                    <p>" . $linha['descricao'] . "</p>
                </div>
            </div>";
        }
        echo "<br/>";
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Busca Pets</title>
    <link rel="stylesheet" href="styles/style_busca_pets.css">
</head>