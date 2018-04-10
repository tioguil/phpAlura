<?php

class produtoDao {
	
	private $conexao;

	function __construct($conexao) {
       $this->conexao = $conexao;
   }

	function listaProdutos(){

		$produtos = array();
		$resultado = mysqli_query($this->conexao, "select p.*, c.nome as categoria_nome from produtos as p join categoria as c on p.categoria_id = c.id");	

		while ($produto_array = mysqli_fetch_assoc($resultado)) {

			$produto = new Produto();
			$categoria = new Categoria();

			 if ($tipoProduto == "Livro") {
	            $produto = new Livro();
	            $produto->setIsbn($isbn);
				$produto->setNome($produto_array['nome']);
				$produto->setPreco($produto_array['preco']);
				$produto->setDescricao($produto_array['descricao']);
				$produto->setUsado($produto_array['usado']);
				$produto->setTipoproduto($produto_array['tipoProduto']);
		    } else {
		        $produto = new Produto();
				$produto->setNome($produto_array['nome']);
				$produto->setPreco($produto_array['preco']);
				$produto->setDescricao($produto_array['descricao']);
				$produto->setUsado($produto_array['usado']);
				$produto->setTipoproduto($produto_array['tipoProduto']);
		    }

		    $categoria->setNome($produto_array['categoria_nome']);
			$produto->setCategoria($categoria);

			$produto->setId($produto_array['id']);

			array_push($produtos, $produto);
		}

			return $produtos;

	 }


	 function buscaProduto($idProduto){

		$resultado = mysqli_query($this->conexao, "select * from produtos where id = {$idProduto}");


			return mysqli_fetch_assoc($resultado);

	 }

	function atualizarPedido(Produto $produto){

		$isbn = "";
	    if ($produto->temIsbn()) {
	        $isbn = $produto->getIsbn();
	    }

	    $tipoProduto = get_class($produto);

		$query = "update produtos set nome='{$produto->getNome()}', preco={$produto->getPreco()}, descricao='{$produto->getdescricao()}', categoria_id={$produto->getCategoria()->getId()}, usado = {$produto->getUsado()}, isbn = '{$isbn}', tipoProduto = '{$tipoProduto}' where id = {$produto->getId()}";
		return mysqli_query($this->conexao, $query);

	}

	 function salvaPedido(Produto $produto){

	 	$isbn = "";
	    if ($produto->temIsbn()) {
	        $isbn = $produto->getIsbn();
	    }

	    $tipoProduto = get_class($produto);

		$query = "insert into produtos (nome, preco, descricao, categoria_id, usado, isbn, tipoProduto) values ('{$produto->getNome()}', {$produto->getPreco()}, '{$produto->getDescricao()}', {$produto->getCategoria()->getId()}, {$produto->getUsado()}, '{$isbn}', '{$tipoProduto}');";
		return mysqli_query($this->conexao, $query);

	}

	function removerProduto($id){

		$query = "delete from produtos where id = {$id}";
		mysqli_query($this->conexao, $query);
		$_SESSION['success'] = "Produto removido com sucesso!";
		header("Location: listaProduto.php");

		die();
	}


}
	

?>