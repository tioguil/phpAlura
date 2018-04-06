<?php
require_once("produtoModel.php");

verificaUsuario();

$id = $_POST['id'];
removerProduto($conexao, $id);
