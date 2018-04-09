<?php
require_once("logica_usuario.php");
require_once("conecta.php");
require_once("class/Produto.php");
require_once("class/Categoria.php");

 function listaProdutos($conexao){

	$produtos = array();
	$resultado = mysqli_query($conexao, "select p.*, c.nome as categoria_nome from produtos as p join categoria as c on p.categoria_id = c.id");

	while ($produto_array = mysqli_fetch_assoc($resultado)) {

		$produto = new Produto();
		$categoria = new Categoria();
		
		$produto->setId($produto_array['id']);
		$produto->setNome($produto_array['nome']);
		$produto->setPreco($produto_array['preco']);
		$produto->setDescricao($produto_array['descricao']);
		$categoria->setNome($produto_array['categoria_nome']);
		$produto->setCategoria($categoria);
		$produto->setUsado($produto_array['usado']);

		array_push($produtos, $produto);
	}

		return $produtos;

 }


 function buscaProduto($conexao, $idProduto){

	$resultado = mysqli_query($conexao, "select * from produtos where id = {$idProduto}");


		return mysqli_fetch_assoc($resultado);

 }

function atualizarPedido($conexao, Produto $produto){


	$query = "update produtos set nome='{$produto->getNome()}', preco={$produto->getPreco()}, descricao='{$produto->getdescricao()}', categoria_id={$produto->getCategoria()->getId()}, usado = {$produto->getUsado()} where id = {$produto->getId()}";
	return mysqli_query($conexao, $query);

}

 function salvaPedido($conexao, Produto $produto){

	$query = "insert into produtos (nome, preco, descricao, categoria_id, usado) values ('{$produto->getNome()}', {$produto->getPreco()}, '{$produto->getDescricao()}', {$produto->getCategoria()->getId()}, {$produto->getUsado()});";
	return mysqli_query($conexao, $query);

}

function removerProduto($conexao, $id){

	$query = "delete from produtos where id = {$id}";
	mysqli_query($conexao, $query);
	$_SESSION['success'] = "Produto removido com sucesso!";
	header("Location: listaProduto.php");

	die();
}