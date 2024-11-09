<?php
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
    <div class="container">
        <div class="form-container">
            <h1>Cadastro do Pet</h1>
            <label for="nome">Nome</label>
            <input type="text" id="nome" placeholder="Digite o nome do pet">
            
            <label for="idade">Idade</label>
            <input type="text" id="idade" placeholder="Digite a idade do pet">
            
            <label for="especie">Espécie</label>
            <input type="text" id="especie" placeholder="Digite a espécie do pet">
            
            <label for="raca">Raça</label>
            <input type="text" id="raca" placeholder="Digite a raça do pet">
            
            <label for="sexo">Sexo</label>
            <input type="text" id="sexo" placeholder="Digite o sexo do pet">
            
            <button type="submit">Cadastrar</button>
        </div>
        
        <div class="photo-container">
            <label for="fileUpload" class="custom-file-upload">Escolher Foto do Pet</label>
            <input type="file" id="fileUpload" accept="image/*" style="display: none;">
            <div class="photo-frame">
                <img id="preview" src="" alt="Pré-visualização da foto" style="display: none; width: 100%; height: 100%; object-fit: cover; border-radius: 10px;">
            </div>
            
            <label for="descricao">Descrição do seu pet</label>
            <textarea id="descricao" name="descricao" rows="4"></textarea>
        </div>
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
