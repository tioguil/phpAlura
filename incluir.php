<?php require_once("head.php"); ?>
<?php require_once("produtoModel.php") ?>
<?php 

require_once("class/Produto.php");
require_once("class/Categoria.php");

$produto = new Produto();
$categoria = new Categoria();



$produto->setNome($_POST["nome"]);
$produto->setPreco($_POST['preco']);
$produto->setDescricao($_POST['descricao']);
$categoria->setId($_POST['categoria_id']);
$produto->setCategoria($categoria);

if(array_key_exists('usado', $_POST)){

	$produto->setUsado("true");

}else{

	$produto->setUsado("false");
}

if(salvaPedido($conexao, $produto)) {
	$_SESSION['success'] = "Produto {$produto->getNome()}, valor: {$produto->getPreco()} salvo com sucesso!";
	header("Location: incluirProdudoForm.php");
	
} else {
	$msg = mysqli_error($conexao);
	$_SESSION['danger'] = "O Produto {$produto->getNome()} não foi adicionado erro: {$msg}";
	header("Location: incluirProdudoForm.php");
}
?>

<?php include("footer.php"); ?>