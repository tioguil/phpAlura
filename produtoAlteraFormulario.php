<?php include("head.php"); ?>
<?php include("categoriaModel.php"); 
include("conecta.php");
include("produtoModel.php");

$lista = listaCategoria($conexao);

$idProduto = $_GET['id'];

$produto = buscaProduto($conexao, $idProduto);

$usado = $produto['usado'] ? "checked='checked'" : "";

echo $usado;
 
?>
	
<h3>Alterar Produto</h3>

<form class="form form-signin " action="alterarProduto.php" method="POST">
	
	<table class="table">
		<input type="hidden" name="id" value="<?= $produto['id'] ?>">
		<tr>

			<td>
				<label> Nome: </label>
			</td>

			<td>
				<input type="text" class="form-control" name="nome" placeholder="nome produto" value="<?= $produto['nome'] ?>">
			</td>
		</tr>

		<tr>
			<td>
				<label> Valor: </label>
			</td>
			<td>
				<input type="text" name="preco" class="form-control" placeholder="valor" value="<?= $produto['preco'] ?>">
			</td>
		</tr>

		<tr>
			<td>
				<label> Descrição: </label>
			</td>
			<td>
				<textarea name="descricao"><?= $produto['descricao'] ?></textarea>
			</td>
		</tr>

		<tr>
			<td>
				<label></label>
			</td>
			<td>
				<input type="checkbox" name="usado" value="true" <?=$usado?> > Produto Usado 
			</td>
		</tr>

		<tr>
			<td>
				<label> Categoria: </label>
			</td>

			<td> 
				<select class="form-control" name="categoria_id">
					<?php foreach ($lista as $categoria): ?>
						
						<?php $select = $categoria['id'] == $produto['categoria_id'] ? "selected='selected'" : "" ; ?>

						<option  value="<?= $categoria['id']; ?>" <?= $select ?> > <?= $categoria['nome']; ?></option>

					<?php endforeach ?>
				</select>
			</td>
		</tr>

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