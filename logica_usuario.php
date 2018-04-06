<?php

session_start();

function verificaUsuario(){

	if(!usuarioEstaLogado()){
	$_SESSION['danger'] = "Você não tem acesso a esta funcionalidade!";
	header("Location: index.php");
	die();
	}
}

function usuarioEstaLogado(){

	return isset($_SESSION["usuario_logado"]);
}

function getUsuario(){

	return $_SESSION["usuario_logado"];
}

function setUsuario($usuario){
	$_SESSION["usuario_logado"] = $usuario;
}

function logOut(){
	session_destroy();
	session_start();
	$_SESSION["success"] = "Deslogado com sucesso!";
	header("Location: index.php");
	die();
}