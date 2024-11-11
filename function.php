<?php

session_start();

function banco($server, $user, $password, $db, $consulta)
{

	$banco =  new mysqli($server, $user, $password, $db);
	if ($banco->connect_error) {
		echo "Falha de conexão referência: (" . $banco->connect_errno . ") - " . $banco->connect_error;
		exit();
	}
	if (!$resultado = $banco->query($consulta)) {
		echo "Falha na consulta referência: (" . $banco->errno . ") - " . $banco->error;
		exit();
	}
	$banco->close();
	return $resultado;
}

function teste_login()
{
	if ((!isset($_SESSION['login'])) or ($_SESSION['login'] == false)) {
		$_SESSION['login'] = false;
		header('location: index.php');
	} 
	// else {
	// 	// $id = $_SESSION['id'];
	// 	// $consulta = "SELECT `senha`, `email` FROM `usuarios` WHERE `id` LIKE '$id'";
	// 	// $resultado =  banco("localhost", "root", NULL, "usuarios", $consulta);
		
	// 	// 	$linha = $resultado->fetch_assoc();
	// 	// 	$senha = $linha['senha'];
	// 	// 	$email = $linha['email'];
	// 	// 	if ($_SESSION['email'] == $email and $_SESSION['senha'] == $senha);
	// 	}
	}

