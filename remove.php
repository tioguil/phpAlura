<?php
require_once("conecta.php");
require_once("class/produtoDao.php");
require_once("logica_usuario.php");
verificaUsuario();

$produtoDao = new ProdutoDao($conexao);
$id = $_POST['id'];
$produtoDao->removerProduto($id);
