<?php include("head.php"); ?>
<?php include("categoriaModel.php"); 
include("conecta.php");
include("logica_usuario.php");

$lista = listaCategoria($conexao);

verificaUsuario();
?>


	
<h3>Adicionar Produto</h3>

<form class="form form-signin " action="incluir.php" method="POST">
	
	<table class="table">
		
		<tr>

			<td>
				<label> Nome: </label>
			</td>

			<td>
				<input type="text" class="form-control" name="nome" placeholder="nome produto">
			</td>
		</tr>

		<tr>
			<td>
				<label> Valor: </label>
			</td>
			<td>
				<input type="text" name="preco" class="form-control" placeholder="valor">
			</td>
		</tr>

		<tr>
			<td>
				<label> Descrição: </label>
			</td>
			<td>
				<textarea name="descricao"> </textarea>
			</td>
		</tr>

		<tr>
			<td>
				<label></label>
			</td>
			<td>
				<input type="checkbox" name="usado" value="true"> Produto Usado 
			</td>
		</tr>

		<tr>
			<td>
				<label> Categoria: </label>
			</td>

			<td> 
				<select class="form-control" name="categoria_id">
					<?php foreach ($lista as $categoria): ?>
						
						<option  value="<?= $categoria['id']; ?>" > <?= $categoria['nome']; ?></option>

					<?php endforeach ?>
				</select>
			</td>
		</tr>

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