<?php require_once("head.php"); ?>
<?php 

$tipoProduto = $_POST['tipoProduto'];

$categoria = new Categoria();
$produtoDao = new ProdutoDao($conexao);


if ($tipoProduto == "Livro") {
    $produto = new Livro();
    $produto->setNome($_POST["nome"]);
	$produto->setPreco($_POST['preco']);
	$produto->setDescricao($_POST['descricao']);
	$categoria->setId($_POST['categoria_id']);
	$produto->setCategoria($categoria);
	$produto->setIsbn($_POST['isbn']);
	$produto->setTipoProduto($tipoProduto);
    $produto->setIsbn($isbn);
} else {
    $produto = new Produto();
    $produto->setNome($_POST["nome"]);
	$produto->setPreco($_POST['preco']);
	$produto->setDescricao($_POST['descricao']);
	$categoria->setId($_POST['categoria_id']);
	$produto->setCategoria($categoria);
	$produto->setIsbn($_POST['isbn']);
	$produto->setTipoProduto($tipoProduto);	
}

if(array_key_exists('usado', $_POST)){

	$produto->setUsado("true");

}else{

	$produto->setUsado("false");
}

if($produtoDao->atualizarPedido($produto)) {
?>
<div class="alert alert-success incluir">
<span class="text-success"> Produto <?= $produto->getNome(); ?>, valor: <?= $produto->getPreco(); ?> Atualizado com sucesso! </span>

</div>
<?php
} else {
	$msg = mysqli_error($conexao);
?>
<p class="text-danger">O produto <?= $produto->getNome(); ?> não foi Atualizado erro: <?= $msg?> </p>
<?php
}
?>

<?php include("footer.php"); ?>