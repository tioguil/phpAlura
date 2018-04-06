<?php
require_once("modelUsuario.php");
require_once("logica_usuario.php");

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

$retorno = buscaUsuario($conexao, $usuario, $senha);
var_dump($retorno);


if($retorno == null){
	$_SESSION['danger'] = "Login ou senha invalido! ";
	header("Location: index.php");

}else{
	$_SESSION['success'] = "Logado com sucesso!";
	setUsuario($retorno['usuario']);
	header("Location: index.php");
	
	
}

die();