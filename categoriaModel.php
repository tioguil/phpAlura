<?php
require_once("conecta.php");

function listaCategoria($conexao){

	$query = "select * from categoria";

	$categorias = mysqli_query($conexao, $query);


	return $categorias;
}
