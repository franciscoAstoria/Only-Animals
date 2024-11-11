<?php

include "function.php";
extract($_POST);

teste_login();

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interface de Pets</title>
    <link rel="stylesheet" href="styles/style_menu.css">
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="icon">🐾</div>
            <h2>ADICIONAR</h2>
            <p>Adicione um novo perfil de pet, tenha novas experiências, conheça novos usuários mantendo suas contas anteriores.</p>
            <form action="cadastro_pet.php">
                <button type="submit">Adicionar</button>
            </form>
        </div>

        <div class="card">
            <div class="icon">🔍</div>
            <h2>PROCURAR</h2>
            <p>Procure por pets compatíveis utilizando filtros como espécie, raça, idade, localização e propósito (reprodução ou socialização).</p>
            <form action="busca_pets.php">
                <button type="submit">Pesquisar</button>
            </form>
        </div>

        <div class="card">
            <div class="icon">⚙️</div>
            <h2>MODIFICAR</h2>
            <p>Não gostou ou quer alterar seu perfil? delete seus pets e atualize um novo quando quiser.</p>
            <form action="modificar.php">
                <button type="submit">Modificar</button>
            </form>
        </div>
    </div>
</body>

</html>