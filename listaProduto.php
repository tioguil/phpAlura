<?php include("head.php");
 include("produtoModel.php");
 include("conecta.php");
 include("categoriaModel.php");

$produtos = listaProdutos($conexao);


 if(array_key_exists("removido", $_GET) && $_GET['removido']=='true'){
?>
 	<p class="alert-success">Produto apagado com sucesso.</p>
<?php  	
 }


?>

	<div class="container">
		<div >
			<table class="table table-striped">
				 <tr>
				    <th>Produto</th>
				    <th>Preço</th> 
				    <th>Descrição</th> 
				    <th>Categoria</th> 
				    <th>Opções</th> 
				 </tr>

				<?php 

					foreach ($produtos as $produto) {

						echo "<tr><td>".$produto['nome']."</td>";
						echo "<td>".$produto['preco']."</td>";
						echo "<td>".substr($produto['descricao'], 0, 60)."</td>";
						echo "<td>".$produto['categoria_nome']."</td>";
						echo "<form action='remove.php' method='post'>
								<input type='text' name='id' value='".$produto["id"]."' style='display:none'>

								<td> 
								<a href='produtoAlteraFormulario.php?id=".$produto['id']."' class='btn btn-warning'> Alterar</a>
								<button type='submit' class='btn btn-danger'>Remover </button>


								</td></tr>


							</form>

						"	;
					}

				?>
	 			 
			</table>
		</div>

	</div>	

<?php include("footer.php");?>