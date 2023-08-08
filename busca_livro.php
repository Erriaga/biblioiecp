<?php
	$pageTitle = "Busca de Livros | BIBLIOIECP";
	include 'temp/header.php';
	if($con){
		$sql = 'SELECT * FROM livro';
		$rs = mysqli_query($con, $sql);
		if($rs){
?>
			<br><br><br><br>
			<h2>BUSCA DE LIVROS</h2>
			<p>Busque por um título de obra ou nome do autor</p><br>
			<form action = 'pesquisar_livro' autocomplete = 'off' method = GET name = 'busLivro'>
				<input class = 'search' name = 'var_livro' placeholder = 'Buscar...' size = 50 type = 'text'>
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