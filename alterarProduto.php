<?php require_once("head.php"); ?>
<?php require_once("produtoModel.php") ?>
<?php 
require_once("class/Produto.php");
require_once("class/Categoria.php");

$produto = new Produto();
$categoria = new Categoria();

$categoria->id = $_POST["categoria_id"];

$produto->nome = $_POST["nome"];
$produto->preco = $_POST["preco"];
$produto->descricao = $_POST["descricao"];
$produto->categoria = $categoria;
$produto->id = $_POST['id'];

if(array_key_exists('usado', $_POST)){

	$produto->usado = "true";

}else{

	$produto->usado = "false";
}

if(atualizarPedido($conexao, $produto)) {
?>
<div class="alert alert-success incluir">
<span class="text-success"> Produto <?= $produto->nome; ?>, valor: <?= $produto->preco; ?> Atualizado com sucesso! </span>

</div>
<?php
} else {
	$msg = mysqli_error($conexao);
?>
<p class="text-danger">O produto <?= $produto->nome; ?> não foi Atualizado erro: <?= $msg?> </p>
<?php
}
?>

<?php include("footer.php"); ?>