<?php
include("conecta.php");
include("modelUsuario.php");

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

$retorno = buscaUsuario($conexao, $usuario, $senha);
var_dump($retorno);


if($retorno == null){
	header("Location: index.php?login=0");

}else{
	header("Location: index.php?login=1");
	setcookie("usuario_logado", $retorno["usuario"]);
}

die();