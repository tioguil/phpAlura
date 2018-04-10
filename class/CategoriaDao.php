<?php 

class CategoriaDao{

	private $conexao;

	function __construct($conexao){
		$this->conexao = $conexao;
	}
	
	function listaCategoria(){

		$query = "select * from categoria";

		$categorias = mysqli_query($this->conexao, $query);


		return $categorias;
	}
}