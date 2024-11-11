<?php

include "function.php";
extract($_POST);

teste_login();

#Variaveis de informações do banco
$server = "localhost";
$user = "root";
$password = NULL;
$db = "only_animals";

if (isset($b_cadastrar)) {
    $foto = $_FILES['foto'];

    $id = $_SESSION['id'];
    $consulta = "INSERT INTO pets ( `especie`, `raca`, `sexo`, `dono`, `idade`, `descricao`,`nome`) VALUES ( '$especie', '$raca', '$sexo', '$id', '$idade', '$descricao', '$nome')";
    $banco =  new mysqli($server, $user, $password, $db);
    $resultado = mysqli_query($banco, $consulta);


    if ($resultado) {

        $userId = mysqli_insert_id($banco);

        $extensao = pathinfo($foto['name'], PATHINFO_EXTENSION);
        $nomefoto = $userId . '.' . $extensao; // Ex: 123.jpg
        $caminhofoto = "pictures/" . $nomefoto;

        if (move_uploaded_file($foto['tmp_name'], $caminhofoto)) {

            $sqlUpdate = "UPDATE `pets` SET `foto` = '$caminhofoto' WHERE `id` = '$userId'";
            mysqli_query($banco, $sqlUpdate);
        } else {
            echo "Erro ao salvar a foto.";
        }
    } else {
        echo "Erro ao salvar o usuário.";
    }

    // Feche a conexão
    mysqli_close($banco);

    header('location: menu.php');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro do Pet</title>
    <link rel="stylesheet" href="styles/style_cadastro_pet.css">
</head>

<body>
    <div class='container'>
        <div class='adicionar-informacoes'>
            <div class='form-container'>
                <div class='icon header-icon'>
                    <a href='menu.php'>🏠</a>
                </div>
                <h1>Cadastro do Pet</h1>
                <Form action="cadastro_pet.php" method="post" enctype="multipart/form-data">
                    <label for="nome">Nome</label>
                    <input type="text" id="nome" name="nome" placeholder="Digite o nome do pet" required>

                    <label for="idade">Idade</label>
                    <input type="text" id="idade" name="idade" placeholder="Digite a idade do pet" required>

                    <label for="especie">Espécie</label>
                    <input type="text" id="especie" name="especie" placeholder="Digite a espécie do pet" required>

                    <label for="raca">Raça</label>
                    <input type="text" id="raca" name="raca" placeholder="Digite a raça do pet" required>

                    <label for="sexo">Sexo</label>
                    <select id="sexo" name="sexo" required>
                        <option value="masculino">Masculino</option>
                        <option value="feminino">Feminino</option>
                    </select>
            </div>

            <div class="photo-container">
                <label for="fileUpload" class="custom-file-upload">Escolher Foto do Pet</label>
                <input type="file" name="foto" id="fileUpload" accept="image/*" style="display: none;">
                <div class="photo-frame">
                    <img id="preview" src="" alt="Pré-visualização da foto" style="display: none; width: 100%; height: 100%; object-fit: cover; border-radius: 10px;">
                </div>
                <label for="descricao" id="instrucao-descricao">Descrição do seu pet</label>
                <textarea id="descricao" name="descricao" rows="4"></textarea>
            </div>
        </div>
        <button type="submit" name="b_cadastrar">Cadastrar ➔</button>
        </Form>
    </div>

    <script>
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
</body>

</html>