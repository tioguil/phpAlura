<?php include("head.php"); ?>
<?php include("conecta.php"); ?>
<?php include("produtoModel.php") ?>
<?php 



$nome = $_POST["nome"];
$preco = $_POST["preco"];
$descricao = $_POST["descricao"];
$categoria_id = $_POST["categoria_id"];

if(array_key_exists('usado', $_POST)){

	$usado = "true";

}else{

	$usado = "false";
}

if(salvaPedido($conexao, $nome, $preco, $descricao, $categoria_id, $usado)) {
?>
<div class="alert alert-success incluir">
<span class="text-success"> Produto <?= $nome; ?>, valor: <?= $preco; ?> salvo com sucesso! </span>

</div>
<?php
} else {
	$msg = mysqli_error($conexao);
?>
<p class="text-danger">O produto <?= $nome; ?> não foi adicionado erro: <?= $msg?> </p>
<?php
}
?>

<?php include("footer.php"); ?>