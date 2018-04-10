<?php require_once("head.php"); ?>
<?php 

require_once("conecta.php");

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

if($produtoDao->salvaPedido($produto)) {
	$_SESSION['success'] = "Produto {$produto->getNome()}, valor: {$produto->getPreco()} salvo com sucesso!";
	header("Location: incluirProdudoForm.php");
	
} else {
	$msg = mysqli_error($conexao);
	$_SESSION['danger'] = "O Produto {$produto->getNome()} não foi adicionado erro: {$msg}";
	header("Location: incluirProdudoForm.php");
}
?>

<?php include("footer.php"); ?>