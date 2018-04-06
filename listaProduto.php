<?php require_once("head.php");
 require_once("produtoModel.php");
 require_once("categoriaModel.php");


$produtos = listaProdutos($conexao);
?>




	<div class="container">
		<div >
			<table class="table table-striped">
				 <tr>
				    <th>Produto</th>
				    <th>Preço</th>
				    <th>Preço com Desconto</th> 
				    <th>Descrição</th> 
				    <th>Categoria</th> 
				    <th>Opções</th> 
				 </tr>

				<?php 

					foreach ($produtos as $produto) {

						echo "<tr><td>".$produto->nome."</td>";
						echo "<td>".$produto->preco."</td>";
						echo "<td>".$produto->precoComDesconto(0.3)."</td>";
						echo "<td>".substr($produto->descricao, 0, 60)."</td>";
						echo "<td>".$produto->categoria->nome."</td>";
						echo "<form action='remove.php' method='post'>
								<input type='text' name='id' value='".$produto->id."' style='display:none'>

								<td> 
								<a href='produtoAlteraFormulario.php?id=".$produto->id."' class='btn btn-warning'> Alterar</a>
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