<?php require_once("head.php"); ?>
<?php
require_once("logica_usuario.php");
verificaUsuario();

$produtoDao = new ProdutoDao($conexao);
$categoriaDao = new CategoriaDao($conexao);

$id = $_GET['id'];
$produto = $produtoDao->buscaProduto($id);
$categorias = $categoriaDao->listaCategorias();

$selecao_usado = $produto->isUsado() ? "checked='checked'" : "";
$produto->setUsado($selecao_usado);
 
?>
	
<h3>Alterar Produto</h3>

<form class="form form-signin " action="alterarProduto.php" method="POST">
	<input type="hidden" name="id" value="<?= $produto['id'] ?>">
	<table class="table">
		
		<?php include("formularioBase.php");?>

		<tr>
			<td>
				
			</td>
			<td>
				<button colspan="2" type="submit" class="btn btn-primary form-control"> Alterar</button>
			</td>
		</tr>


		
	</table>

</form>

<?php include("footer.php"); ?>