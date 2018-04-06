<?php
require_once("conecta.php");

function buscaUsuario($conexao, $usuario, $senha){

	$senhaMD5 = md5($senha);
	$email = mysqli_real_escape_string($conexao,$email);
	$query = "select * from usuarios where (usuario = '{$usuario}' or email = '{$usuario}') and senha = '{$senhaMD5}'";

	$resultado =  mysqli_query($conexao, $query);
	$usuario = mysqli_fetch_assoc($resultado);

	return $usuario;


}