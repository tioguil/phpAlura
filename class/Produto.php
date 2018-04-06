<?php

class Produto{

	private $id;
	private $nome;
	private $preco;
	private $descricao;
	private $categoria;
	private $usado;

	public function precoComDesconto($valor = 0.1){
		if($valor > 0 && $valor <=0.50 ){
			$this->preco -= $this->preco * $valor;
		}	
			return $this->preco;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function setNome($nome){
		$this->nome = $nome
	}
	
}


	
?>