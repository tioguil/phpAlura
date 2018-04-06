<?php require_once("head.php"); ?>
<?php require_once("produtoModel.php") ?>
<?php 

require_once("class/Produto.php");
require_once("class/Categoria.php");

$produto = new Produto();
$categoria = new Categoria();



$produto->nome = $_POST["nome"];
$produto->preco = $_POST['preco'];
$produto->descricao = $_POST['descricao'];
$categoria->id = $_POST['categoria_id'];
$produto->categoria = $categoria;

if(array_key_exists('usado', $_POST)){

	$produto->usado  = "true";

}else{

	$produto->usado = "false";
}

if(salvaPedido($conexao, $produto)) {
	$_SESSION['success'] = "Produto {$produto->nome}, valor: {$produto->preco} salvo com sucesso!";
	header("Location: incluirProdudoForm.php");
	
} else {
	$msg = mysqli_error($conexao);
	$_SESSION['danger'] = "O Produto {$produto->nome} não foi adicionado erro: {$msg}";
	header("Location: incluirProdudoForm.php");
}
?>

<?php include("footer.php"); ?>