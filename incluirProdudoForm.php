<?php require_once("head.php"); ?>
<?php require_once("logica_usuario.php");

verificaUsuario();

$categoria = new Categoria();
$categoria->setId(1);

$produto = new Produto("", "", "", $categoria, "");

$categoriaDao = new CategoriaDao($conexao);

$categorias = $categoriaDao->listaCategoria();

?>

	
<h3>Adicionar Produto</h3>

<form class="form form-signin " action="incluir.php" method="POST">
	
	<table class="table">
		
		<?php include("formularioBase.php") ?>

		<tr>
			<td>
				
			</td>
			<td>
				<button colspan="2" type="submit" class="btn btn-primary form-control"> gravar</button>
			</td>
		</tr>


		
	</table>
	
	

	

	


</form>

<?php include("footer.php"); ?>