<?php
include("logica_usuario.php");
 function listaProdutos($conexao){

	$produtos = array();
	$resultado = mysqli_query($conexao, "select p.*, c.nome as categoria_nome from produtos as p join categoria as c on p.categoria_id = c.id");

	while ($produto = mysqli_fetch_assoc($resultado)) {

		array_push($produtos, $produto);
		//echo $produto['nome']; echo "; ".$produto['preco']."<br>";
	}

		return $produtos;

 }


 function buscaProduto($conexao, $idProduto){

	$resultado = mysqli_query($conexao, "select * from produtos where id = {$idProduto}");


		return mysqli_fetch_assoc($resultado);

 }

function atualizarPedido($conexao, $id, $nome, $preco, $descricao, $categoria_id, $usado){


	$query = "update produtos set nome='{$nome}', preco={$preco}, descricao='{$descricao}', categoria_id={$categoria_id}, usado = {$usado} where id = {$id}";
	return mysqli_query($conexao, $query);

}

 function salvaPedido($conexao, $nome, $preco, $descricao, $categoria_id, $usado){

	$query = "insert into produtos (nome, preco, descricao, categoria_id, usado) values ('{$nome}', {$preco}, '{$descricao}', {$categoria_id}, {$usado});";
	return mysqli_query($conexao, $query);

}

function removerProduto($conexao, $id){
	$query = "delete from produtos where id = {$id}";
	mysqli_query($conexao, $query);
	$_SESSION['success'] = "Produto removido com sucesso!";
	header("Location: listaProduto.php");

	die();
}