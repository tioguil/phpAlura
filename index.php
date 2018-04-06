<?php include("head.php");
include("logica_usuario.php");
?>

	<h1>Bem Vindo !</h1>

	<?php if(usuarioEstaLogado()){?>
	<p class="text-success"> Você esta logado como: <?= getUsuario(); ?> <br>

		<a href="logOut.php" class="btn btn-danger"> Deslogar</a>

	<?php	}else{ ?>

	<h2>Login</h2>
		<form action="login.php" method="POST">
			<table class="table">
				<tr>
					<td>Email ou Usuario:</td>
					<td><input class="form-control" type="text" name="usuario" placeholder="usuario ou Email"></td>
				</tr>

				<tr>
					<td>Senha:</td>
					<td><input class="form-control" type="password" name="senha" placeholder="Senha"></td>
				</tr>

				<tr>
					<td><button type="submit" class="btn btn-primary btn-right"> Logar</button></td>
				</tr>

			</table>

		</form>

		<?php } ?>

<?php include("footer.php");?>