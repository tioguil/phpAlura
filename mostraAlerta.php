<?php 
session_start();
	 function mostrarAlerta($tipo){
	 	if(isset($_SESSION[$tipo])){
?>
<p class="text-<?=$tipo ?>"> <?=$_SESSION[$tipo] ?></p>
<?php	 
	unset($_SESSION[$tipo]);
		}	
	}
	
?>