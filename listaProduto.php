<?php require_once("head.php");



$produtoDao = new ProdutoDao($conexao);
$produtos = $produtoDao->listaProdutos();
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
				    <th>Isbn</th>
				    <th>Tipo Produto</th> 
				    <th>Opções</th> 
				 </tr>

				<?php 

					foreach ($produtos as $produto) {

						echo "<tr><td>".$produto->getNome()."</td>";
						echo "<td>".$produto->getPreco()."</td>";
						echo "<td>".$produto->precoComDesconto(0.3)."</td>";
						echo "<td>".substr($produto->getDescricao(), 0, 60)."</td>";
						echo "<td>".$produto->getCategoria()->getNome()."</td>";
						echo "<td>".$produto->getIsbn()."</td>";
						echo "<td>";

								if ($produto->temIsbn()) {
						            echo "ISBN: ".$produto->getIsbn();
						        }

						echo "</td>";
						echo "<form action='remove.php' method='post'>
								<input type='text' name='id' value='".$produto->getId()."' style='display:none'>

								<td> 
								<a href='produtoAlteraFormulario.php?id=".$produto->getId()."' class='btn btn-warning'> Alterar</a>
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