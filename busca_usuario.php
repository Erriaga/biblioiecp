<?php
	$pageTitle = "Busca de Usuários | BIBLIOIECP";
	include 'temp/header.php';
	if($con){
		$sql = 'SELECT * FROM usuario';
		$rs = mysqli_query($con, $sql);
		if($rs){
?>
			<br><br><br><br>
			<h2>BUSCA DE USUÁRIO</h2>
			<p>Busque pelo nome do usuário</p><br>
			<form action = 'pesquisar_usuario' autocomplete = 'off' method = GET name = 'busUsuario'>
				<input class = 'search' name = 'var_usuario' placeholder = 'Buscar...' size = 50 type = 'text'>
				<input type = 'submit' value = 'PESQUISAR' hidden>
			</form><br><br><br><br><br>
<?php
		} else {
			echo '<h2>ERRO DE CONSULTA.</h2><br><br>';
			echo "<a class = 'btn' href = 'index'>VOLTAR PARA A PÁGINA INICIAL</a>";
		}
	} else {
		echo '<h2>ERRO DE CONEXÃO.</h2>';
		echo "<a class = 'btn' href = 'index'>VOLTAR PARA A PÁGINA INICIAL</a>";
	}
	include 'temp/footer.php';
?>