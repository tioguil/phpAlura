<?php require_once("head.php"); ?>
<?php require_once("categoriaModel.php"); 
require_once("produtoModel.php");
verificaUsuario();
$lista = listaCategoria($conexao);

$idProduto = $_GET['id'];

$produto = buscaProduto($conexao, $idProduto);

$usado = $produto['usado'] ? "checked='checked'" : "";
 
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