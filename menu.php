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
            <p>Adicione um novo perfil de pet, tenha novas experiências.</p>
            <form action="cadastro_pet.php">
                <button type="submit">Adicionar</button>
            </form>
        </div>


        <div class="card">
            <div class="icon">🔍 ⚙️</div>
            <h2>PESQUISAR MODIFICAR</h2>
            <p>Quer alterar o perfil de seus pets? pesquise, delete e atualize seus pets</p>
            <form action="modificar.php">
                <button type="submit">Pesquisa & Modificar</button>
            </form>
        </div>
    </div>
</body>

</html>