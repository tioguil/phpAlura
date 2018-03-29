<?php
include("conecta.php");
include("produtoModel.php");

$id = $_POST['id'];
removerProduto($conexao, $id);
