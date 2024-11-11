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
<header class='navbar'>
    <div class='navbar-container'>
        <a href='menu.php' class='navbar-icon' title='Home'>🏠</a>
        <div class='search-container'>
            <form action='modificar.php' method='post'>
                <input type='text' placeholder='Pesquisar...' name='pesquisa'>
                <button type='submit' name='b_pesquisar' title='Pesquisar'>🔍</button>
            </form>
        </div>
    </div>
</header>";

if (isset($b_pesquisar)) {
    if (empty($pesquisa)) {
        header('location: modificar.php');
    } else {
        $id_usuario = $_SESSION['id'];
        $consulta = "SELECT * FROM `pets` WHERE `nome` LIKE '%$pesquisa%' AND `dono` = '$id_usuario'";
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
                <div class='action-buttons'>
                    <form action='modificar.php' method='post' onsubmit='return confirmDelete()'>
                        <input type='hidden' name='id_pet' value='" . $linha['id'] . "'>
                        <button type='submit' name='b_deletar'>Deletar</button>
                    </form>
                    <form action='modificar.php' method='post'>
                        <input type='hidden' name='id_pet' value='" . $linha['id'] . "'>
                        <button class='update-button' name='b_atualizar'>Atualizar</button>
                    </form>
                </div>
            </div>";
        }
        echo "<br/>";
    }
}

if (isset($b_deletar)) {
    $consulta = "DELETE FROM `pets` WHERE `id` = $id_pet";
    banco($server, $user, $password, $db, $consulta);
    $nome_inicial = "pictures/" . $id_pet;
    $caminho_foto = glob($nome_inicial . ".*");
    $caminho_foto = implode($caminho_foto);
    unlink($caminho_foto);
}

if (isset($b_atualizar)) {
    $consulta = "SELECT * FROM `pets` WHERE `id` = '$id_pet'";
    $dados = banco($server, $user, $password, $db, $consulta);
    while ($linha = $dados->fetch_assoc()) {
        echo "
<div class='container'>
    <div class='adicionar-informacoes'>
        <div class='form-container'>
            <h1>Cadastro do Pet</h1>
            <Form action='cadastro_pet.php' method='post' enctype='multipart/form-data'>
                <label for='nome'>Nome</label>
                <input type='text' id='nome' name='nome' value=" . $linha['nome'] . " placeholder='Digite o nome do pet' required>

                <label for='idade'>Idade</label>
                <input type='text' id='idade' name='idade' value=" . $linha['idade'] . " placeholder='Digite a idade do pet' required>

                <label for='especie'>Espécie</label>
                <input type='text' id='especie' name='especie' value=" . $linha['especie'] . " placeholder='Digite a espécie do pet' required>

                <label for='raca'>Raça</label>
                <input type='text' id='raca' name='raca' value=" . $linha['raca'] . " placeholder='Digite a raça do pet' required>

                <label for='sexo'>Sexo</label>
                <select id='sexo' name='sexo' value=" . $linha['sexo'] . " required>
                    <option value='masculino'>Masculino</option>
                    <option value='feminino'>Feminino</option>
                </select>
        </div>

        <div class='photo-container'>
            <label for='fileUpload' class='custom-file-upload'>Escolher Foto do Pet</label>
            <input type='file' name='foto' id='fileUpload' accept='image/*' style='display: none;'>
            <div class='photo-frame'>
                <img id='preview' src='" . $linha[' foto'] . "' alt='Pré-visualização da foto' style='display: none; width: 100%; height: 100%; object-fit: cover; border-radius: 10px;'>
    </div>
    <label for='descricao' id='instrucao-descricao'>Descrição do seu pet</label>
    <textarea id='descricao' name='descricao' value=" . $linha['descricao'] . " rows='4'></textarea>
</div>
<button type='submit' id='finalizar' name='b_finalizar'>Finalizar ➔</button>
</Form>
</div>";
    }
}

?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar</title>
    <link rel="stylesheet" href="styles/style_modificar.css">
</head>

<script>
    function confirmDelete() {
        return confirm('Tem certeza de que deseja excluir esta informação? Esta ação é irreversível.');
    }

    document.getElementById("fileUpload").addEventListener("change", function(event) {
        const file = event.target.files[0];
        const preview = document.getElementById("preview");

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = "block";
            };

            reader.readAsDataURL(file);
        }
    });
</script>