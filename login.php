<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['user'];
    $senha = $_POST['senha'];
    
    if ($user == "eu" && $senha == "senha1") {
        header("Location: cadastro_pet.php");
    } else {
        echo "Acesso negado";
    }
}
?>
