<?php require_once("head.php"); ?>
<?php require_once("produtoModel.php") ?>
<?php 
require_once("class/Produto.php");
require_once("class/Categoria.php");

$produto = new Produto();
$categoria = new Categoria();

$categoria->setId($_POST["categoria_id"]);

$produto->setNome($_POST["nome"]);
$produto->setPreco($_POST["preco"]);
$produto->setDescricao($_POST["descricao"]);
$produto->setCategoria($categoria);
$produto->setId($_POST['id']);

if(array_key_exists('usado', $_POST)){

	$produto->setUsado("true");

}else{

	$produto->setUsado("false");
}

if(atualizarPedido($conexao, $produto)) {
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