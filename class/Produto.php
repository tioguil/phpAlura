<?php

require_once("Categoria.php");
class Produto{

	private $id;
	private $nome;
	private $preco;
	private $descricao;
	private $categoria;
	private $usado;
	private $isbn;
	private $tipoProduto;

	function __construct(){
		
	}

	public function precoComDesconto($valor = 0.1){
		if($valor > 0 && $valor <=0.50 ){
			$this->preco -= $this->preco * $valor;
		}	
			return $this->preco;
	}

	public function getIsbn(){
		return $this->isbn;
	}


	public function temIsbn() {
    	return $this instanceof Livro;
	}

	public function setTipoProduto($tipoProduto){
		$this->tipoProduto = $tipoProduto;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}
	
	public function setPreco($preco){
		$this->preco = $preco;
	}

	public function setDescricao($descricao){
		$this->descricao = $descricao;
	}

	public function setCategoria(Categoria $categoria){
		$this->categoria = $categoria;
	}

	public function setUsado($usado){
		$this->usado = $usado;
	}

	public function getId(){
		return $this->id;
	}

	public function getNome(){
		return $this->nome;
	}
	
	public function getPreco(){
		return $this->preco;
	}

	public function getDescricao(){
		return $this->descricao;
	}

	public function getCategoria(){
		return $this->categoria;
	}

	public function getUsado(){
		return $this->usado;
	}
}


	
?>