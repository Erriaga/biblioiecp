<?php
	$pageTitle = "Fila Deletada | BIBLIOIECP";
	include 'temp/header.php';
	$id_fila = $_GET['id'];
	if($con){
		$sql = "DELETE FROM fila
				WHERE id_fila = $id_fila;";
		$rs = mysqli_query($con, $sql);
		if($rs){
			echo "<br><br><br><br><img src = 'https://trello-attachments.s3.amazonaws.com/5bd4add901b2c48729f82775/5bffefae0267697242dc1c65/f9d1203a0214da51051ee55bb1f23ab9/GreenCheck.gif'>";
			echo '<br><h2>FILA DELETADA COM SUCESSO!</h2><br><br>';
			echo "<a class = 'btn' href = 'pedidos' style = 'margin-right: 0.625em;'>VER PEDIDOS</a>";
			echo "<a class = 'btn' href = 'index' style = 'margin-left: 0.625em;'>PÁGINA INICIAL</a><br><br><br><br><br>";
		} else {
			echo '<h2>ERRO DE EXCLUSÃO.</h2><br><br>';
			echo "<a class = 'btn' href = 'pedidos'>VER PEDIDOS</a>";
		}
	} else {
		echo '<h2>ERRO DE CONEXÃO.</h2>';
	}
	include 'temp/footer.php';
?>