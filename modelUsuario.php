<?php

function buscaUsuario($conexao, $usuario, $senha){

	$senhaMD5 = md5($senha);
	$query = "select * from usuarios where (usuario = '{$usuario}' or email = '{$usuario}') and senha = '{$senhaMD5}'";

	$resultado =  mysqli_query($conexao, $query);
	$usuario = mysqli_fetch_assoc($resultado);

	return $usuario;


}