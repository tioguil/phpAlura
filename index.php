<?php include("head.php");?>
	
	<h1>Bem Vindo !</h1>

	<h2>Login</h2>
	 <?php 
		if(isset($_GET['login'])){
			$login =  $_GET['login'];
			if($login == false){
				echo "<div class='alert alert-danger' role='alert'> Login ou senha invalidos!</div>";
			}else{
				echo "<div class='alert alert-success' role='alert'> Logado com sucesso!</div>";
			}
		}

	?>
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

<?php include("footer.php");?>