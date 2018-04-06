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
		
		$produto->id =	$produto_array['id'];
		$produto->nome = $produto_array['nome'];
		$produto->preco = $produto_array['preco'];
		$produto->descricao = $produto_array['descricao'];
		$categoria->nome = $produto_array['categoria_nome'];
		$produto->categoria = $categoria;
		$produto->usado = $produto_array['usado'];

		array_push($produtos, $produto);
	}

		return $produtos;

 }


 function buscaProduto($conexao, $idProduto){

	$resultado = mysqli_query($conexao, "select * from produtos where id = {$idProduto}");


		return mysqli_fetch_assoc($resultado);

 }

function atualizarPedido($conexao, Produto $produto){


	$query = "update produtos set nome='{$produto->nome}', preco={$produto->preco}, descricao='{$produto->descricao}', categoria_id={$produto->categoria->id}, usado = {$produto->usado} where id = {$produto->id}";
	return mysqli_query($conexao, $query);

}

 function salvaPedido($conexao, Produto $produto){

	$query = "insert into produtos (nome, preco, descricao, categoria_id, usado) values ('{$produto->nome}', {$produto->preco}, '{$produto->descricao}', {$produto->categoria->id}, {$produto->usado});";
	return mysqli_query($conexao, $query);

}

function removerProduto($conexao, $id){

	$query = "delete from produtos where id = {$id}";
	mysqli_query($conexao, $query);
	$_SESSION['success'] = "Produto removido com sucesso!";
	header("Location: listaProduto.php");

	die();
}