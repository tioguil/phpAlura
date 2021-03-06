 <?php 

function carregaClass($nomeDaClasse){
    require_once("class/".$nomeDaClasse.".php");
}

spl_autoload_register("carregaClass");

require_once("conecta.php");
 include("mostraAlerta.php");
 error_reporting(E_ALL ^ E_NOTICE);
  ?>
<!doctype html>
<html>
<head>
	<title>Loja</title>

	<meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Tema opcional -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<link rel="stylesheet" type="text/css" href="css/style.css">
<!-- Última versão JavaScript compilada e minificada -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script type="js/bootstrap.min.js"></script>

</head>
<body>

	<nav class="navbar navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <a href="index.php" class="navbar-brand">Loja</a>
            </div>

               <div>
                <ul class="nav navbar-nav">
                     <li><a href="incluirProdudoForm.php">Adiciona Produto</a></li>
                     <li><a href="listaProduto.php">Lista de Produtos</a></li>
                    <li><a href="contato.php">Contato</a></li>
                </ul>
            </div>
        </div><!-- container acaba aqui -->
    </nav>
	<div class="container" style="text-align: center">

        <?php mostrarAlerta("success"); ?>
        <?php mostrarAlerta("danger"); ?>